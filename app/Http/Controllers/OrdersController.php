<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs;
use App\Models\Cities,App\Models\Orders,App\Models\OrdersDetails,App\User,App\Models\CalendarDatesOff,
    App\Models\OrdersEmployeeInfos,App\Models\EmployeeMoreInfos;

use App\Models\Packages;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DDVController;
use Mail;
use App\Mail\OrderCreated;
use Illuminate\Support\Str;
class OrdersController extends Controller
{
	public function cart(){
		$CURRENT_DOMAIN =12;
        $cities = Cities::query();
        $cities->where('domain_id',$CURRENT_DOMAIN);
        $cities = $cities->where('status',1)
           ->orderby('domain_id','asc')
           ->orderby('name','asc')
           ->get();
         $holidays_off = CalendarDatesOff::where('domain_id',$CURRENT_DOMAIN)->where('status',1)->get();
         $current_latituude  = 0;$current_longitude=0;
        return view('order/cart',compact('cities','holidays_off','current_latituude','current_longitude'));
	}
    public function store(Request $request){
    	$request->validate([
    		'name' 		=> 'required|string|min:3|max:150',
    		'opstina'   => 'required|exists:cities,id',
    	//	'area' 		=> 'required|string|min:3|max:150',
    		'address' 	=> 'required|string|min:3|max:150',
    	//	'email' 	=> 'required|string|min:3|max:150',
    		'phone'		=> 'required|min:6|max:15'
    	]);
    	$domain_id = 3;$client_id=0;
    	$operator_id = 26;$user_id = 0;
    	// echo "1<br>";
    	try{
        $payment_method = 0;
                if(isset($request->payment_method)){
                  $payment_method = intval($request->payment_method);
                }


        //$email_client = $request->email;
    		$phone_1 = addprefixbasedDomain($domain_id,$request->phone);//substr($request->phone, 1);
        $phone_2 = "";

            $checkClient = User::query();
           // $checkClient->where('email',$request->email);
            $checkClient->where(function($qq) use ($phone_1){
               $qq->where('phone','like',$phone_1);
               $qq->orWhere('phone2','like',$phone_1);
            });
  
            $checkClient = $checkClient->first();

          //  echo "a-".$operator_id;
            if(is_null($checkClient)){
                   if(!isset($request->email)){
                        $emailclient = $request->phone."-".Str::random(4)."@no-email.com";
                   }else{
                        if($request->email != ''){
                           $emailclient = $request->email;
                        }else{
                           $emailclient = $request->phone."-".Str::random(4)."@no-email.com";
                        }
                   }

                  
                   $dob = null;
                   if(isset($request->dob) && validateDate(convertDateFormat($request->dob),'Y-m-d')){$dob = convertDateFormat($request->dob);}
                   $NEWCLIENT = new ClientController();
                   $area= "";$religion=0;

                   if(isset($request->area) && $request->area != ''){
                    $area = $request->area;
                   }

                   if(isset($request->religion) && $request->religion > 0){
                    $religion = intval($request->religion);
                   }
                  
                   $client_id =  $NEWCLIENT->storeclient($request->name,$request->lastname,$emailclient,$domain_id,1,$phone_1,$phone_2,$request->opstina,$dob,0,$operator_id,$request->address,$area,$religion,7);
                   // echo "b-".$operator_id;
               }else{
                    $client_id = $checkClient->id;
                    $operator_id = $checkClient->operator_id;
                   //  echo "c-".$operator_id;
               }

                //echo "d-".$operator_id;

               if($operator_id == 0){
                $operator_id = 26;
               }
    		 $lastpackage = Orders::where('domain_id',$domain_id)->orderby('code','desc')->first();
    		// echo "1<br>";
            if(is_null($lastpackage)){
                $new_order_cod = \Carbon::now()->format('Y').'NT000001';
            }else{
                $new_order_code = substr($lastpackage->code, -6);
                $new_order_code = intval($new_order_code) + 1;
                $new_order_cod = createCodeProductv22(\Carbon::now()->format('Y').'NT',6,$new_order_code);
            }
            
            // echo "2<br>";
            $direct_delivery= 0;
            if(isset($request->direct_delivery)){
              $direct_delivery = intval($request->direct_delivery);
            }
            $status_order = 1;
            if($payment_method == 1){
              $status_order = -1;
            }
            $neworder = new Orders();
            $neworder->code 		 = $new_order_cod;
            $neworder->order_type_id = 7;
            
            $neworder->address_order = $request->address;
            $neworder->area          = $request->area;
            $neworder->city_id       = $request->opstina;
            $neworder->status        = $status_order;
            $neworder->client_id   	 = $client_id;
            $neworder->domain_id     = $domain_id;
            $neworder->payment_method = $payment_method;
            $neworder->user_id       = $client_id;
            $neworder->employee_id   = $operator_id;
            $neworder->description   = $request->message;
            $neworder->status_date   = \Carbon::now()->format('Y-m-d');
            $neworder->direct_delivery = 0;
            $token = Str::random(10);
            $neworder->token    = $token; 
            $neworder->shipping_longitude = $request->longitude;
            $neworder->shipping_latitude  = $request->latitude;

            $neworder->date_ordered  = \Carbon::now()->format('Y-m-d');
            
            if(isset($request->delivery_date) &&  validateDate(convertDateFormat($request->delivery_date),'Y-m-d')){
            	$neworder->delivery_date = convertDateFormat($request->delivery_date);
            }

          //  echo "before<br>";
            if($neworder->save()){
            	//	echo "order saved<br>";
            	$orderID = $neworder->id;
            	$decodejson = json_decode($request->idscart);
            	$total_price = 0;$total_for_pay=0;$total_order_ddv=0;
            	$total_order_ddv18=0;$total_order_ddv5=0;
            	$baseddv18=0;$baseddv5=0;
            	
            	foreach ($decodejson as $key => $value) {
	                 $discount = 0;
                  if($value->Qty > 0){
	                    $neworderdetail = new OrdersDetails();
	                    $NEWPRICEPERPRODUCT = $value->Price;
                      if($payment_method == 1){
                        $discount = 2;
                        $NEWPRICEPERPRODUCT = $value->Price - ($value->Price * 0.02);

                      }
	                    if($value->Type == 0){
	                        $neworderdetail->product_id      = $value->ID;
	                    }else if($value->Type == 1){
	                        $neworderdetail->package_id      = $value->ID;
	                    }
	                    $neworderdetail->client_id       = $client_id;
	                    $neworderdetail->discount        = $discount;
	                    $neworderdetail->order_id        = $orderID;
	                    $neworderdetail->original_price  = $value->Price;
	                    $neworderdetail->price_with_discount  = $NEWPRICEPERPRODUCT;
	                    $neworderdetail->qty              = $value->Qty;
	                    $neworderdetail->save();
                      $total_price   += $value->Price * $value->Qty;
	                    $total_for_pay += $NEWPRICEPERPRODUCT * $value->Qty;
	                }
	            }//end foreach
                	
	            $array_update_order = array();
	            $deliveryprice = 300;

              $getcity = Cities::find($request->opstina);
              if(isset($getcity)){
                $deliveryprice = $getcity->price;
              }

              $total_for_pay += $deliveryprice;

	      
	            $array_update_order['total_order']              = $total_for_pay;
                $array_update_order['deliveryprice']          = $deliveryprice;
                $array_update_order['total_order_nodiscount'] = $total_price;
                Orders::where('id',$orderID)->limit(1)->update($array_update_order);

                $fixDDV = new DDVController();
                $fixDDV->correctDDV($orderID);

              
               
                $dataorder = Orders::where('id',$neworder->id)->with('getorderdetails')->first();
                /*if(!is_null($dataorder) && $payment_method == 0){
                  $email_admin = 'orders@naturatherapy.mk';
                  Mail::to([$email_admin,$email_client])->send(new OrderCreated($dataorder));
                }*/
                
             
                if($payment_method == 1){
                    return response()->json([
                        'msg'     => 'success',
                        'message' => trans('alerts.success_made_order'), 
                        'redlinklogin'  => route('shop.checkout',array('id'=>$neworder->id,'token' => $token)),
                        'title'   => trans('alerts.success')],200);
                }else{
                    return response()->json([
                        'msg'     => 'success',
                        'message' => trans('alerts.success_made_order'), 
                        'redlinklogin'  => route('shop.payment.success',array('id'=>$neworder->id,'token' => $token)),
                        'title'   => trans('alerts.success')],200);
                }
              

			}
    	}catch(\Exception $e){
    		return response()->json([
                    'msg' => 'error',
                    'title' => trans('alerts.error'),
                    'message' => $e->getMessage()],500);
    	}
    }


}
