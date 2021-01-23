<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs;
use App\Models\Cities,App\Models\Orders,App\Models\OrdersDetails,App\User,App\Models\CalendarDatesOff,
    App\Models\OrdersEmployeeInfos,App\Models\EmployeeMoreInfos;
use App\Models\PaymentsInfos;

use App\Models\Packages;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DDVController;
use Mail,Session;
use App\Mail\OrderCreated;

class PaymentController extends Controller
{

    public function payment_pre_page($id,$token){
      $data = Orders::where('id',$id)->where('token',$token)->first();
      if(!is_null($data)){

        return view('order/checkout',compact('data'));
      }else{

      }
    }


    public function ok_url(Request $request){
      $storekey="SKEY0401";
      $mdStatus=$request->mdStatus;//Result of the 3D Secure authentication. 1,2,3,4 are successful; 5,6,7,8,9,0 are unsuccessful.
      $id_order = $request->ReturnOid;
      $transId = $request->TransId;
      $HostRefNum = $request->HostRefNum;
      $data = Orders::where('code',$id_order)->first();

      if(!is_null($data)){

        $hashparams    = $request->HASHPARAMS;
        $hashparamsval = $request->HASHPARAMSVAL;
        $hashparam     = $request->HASH;          
        $paramsval="";
        $index1=0;
        $index2=0;
        $msg_alert = "";
        $array_update_order = array();

        $finalsuccess = 0;
        if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
        {          
           $Response = $_POST["Response"];  
           
           if ( $Response == "Approved")
          {
            $finalsuccess = 1;
            $msg_head = trans('alerts.success_payment_title');
            $msg_alert = trans('alerts.success_made_order');// trans('alerts.payment_aproved');
            $array_update_order['status']   = 1;
            $array_update_order['TransId']  = $transId;
            $array_update_order['HostRefNum'] = $HostRefNum;

          }
          else      
          {

             $msg_head = trans('alerts.somethingwentwrong');
             $msg_alert = trans('alerts.payment_not_aproved');
          }
        } 
        else
        {
           $msg_head = trans('alerts.somethingwentwrong');
           $msg_alert = trans('alerts.payment_3d_failed');
        }

        if(!empty($array_update_order)){
            Orders::where('id',$data->id)->limit(1)->update($array_update_order);
            $newPaymentsInfos = new PaymentsInfos();
            $newPaymentsInfos->user_id     = $data->client_id;
            $newPaymentsInfos->order_id    = $data->id;
            $newPaymentsInfos->domain_id   = $data->domain_id;
            $newPaymentsInfos->HostRefNum  = $HostRefNum;
            $newPaymentsInfos->TransId     = $transId;
            $newPaymentsInfos->allresponse = $request->all();
            $newPaymentsInfos->status      = $mdStatus;
            $newPaymentsInfos->save();
          
        }
     
        if($finalsuccess == 1){
          Session::flash('msg','success');
          Session::flash('title',$msg_head);
          Session::flash('message',$msg_alert);
          return redirect(route('shop.payment.success',array('id' => $data->id,'token' => $data->token)));
        }else{
          Session::flash('msg','danger');
          Session::flash('title',$msg_head);
          Session::flash('message',$msg_alert);
          return redirect(route('shop.checkout',array('id' => $data->id,'token' => $data->token)));

        }
    }
     
    }

    public function nok_url(Request $request){
    //  dd($request->all());
     // return view('order/nok');
      $storekey="SKEY0401";
      $mdStatus=0;//Result of the 3D Secure authentication. 1,2,3,4 are successful; 5,6,7,8,9,0 are unsuccessful.
      $id_order = $request->oid;
      $TransId = $request->TransId;

      $data = Orders::where('code',$id_order)->first();
      if(!is_null($data)){
          $newPaymentsInfos = new PaymentsInfos();
          $newPaymentsInfos->user_id     = $data->client_id;
          $newPaymentsInfos->order_id    = $data->id;
          $newPaymentsInfos->domain_id   = $data->domain_id;
          $newPaymentsInfos->allresponse = $request->all();
          $newPaymentsInfos->message     = $request->ErrMsg;
          $newPaymentsInfos->TransId     = $TransId;
          $newPaymentsInfos->status      = $mdStatus;
          $newPaymentsInfos->save();
          Session::flash('msg','error');
          Session::flash('title',trans('alerts.somethingwentwrong'));
          Session::flash('message',$request->ErrMsg);
          return redirect(route('shop.checkout',array('id' => $data->id,'token' => $data->token)));
     }
    }

    public function ok_redirect_final($id,$token){
      $data = Orders::where('id',$id)->where('token',$token)->with('payment_details')->first();
      if(!is_null($data)){
        return view('order/ok',compact('data'));
      }
    }

    public function sendEmailOrder($id,$token){
      $data = Orders::where('id',$id)->where('token',$token)->with('payment_details')->first();
      if(!is_null($data)){
        if($data->email_send_success == 0){
         $email_admin = 'orders@naturatherapy.mk';
         $email_client = $data->getclient->email;
         $sendemail = Mail::to([$email_admin,$email_client])->send(new OrderCreated($data));
         Orders::where('id',$id)->limit(1)->update(array('email_send_success' => 1));
        }
     }
    }
}