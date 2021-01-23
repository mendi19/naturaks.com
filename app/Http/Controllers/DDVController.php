<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs;
use App\Models\Cities,App\Models\Orders,App\Models\OrdersDetails,App\User;
use App\Models\Packages;
use App\Http\Controllers\ClientController;

class DDVController extends Controller
{

  public function correctDDV($IDORDER){
   
        $data = Orders::where('id',$IDORDER)->with('getorderdetails')->first();


        $ddv5_f = 0;$ddv18_f=0;
        
        if(isset($data->getorderdetails)){
            $ddv18 = 0; $ddv5=0;$baseddv18=0;$baseddv5=0;$total_price=0;

            if($data->deliveryprice > 0){
                $ddv18 = (100/118) * 18;
                $baseddv18 = (100/118) * 100;
            }
            foreach ($data->getorderdetails as $kkk => $vvv) {
                     // echo "Discount:".$vvv->discount."<br>";
                 $total_price += $vvv->price_with_discount * $vvv->qty;

                 if($vvv->product_id > 0){
                    $makeddvvrednost = ($vvv->price_with_discount / (100 + intval($vvv->getproduct->getddv->ddv))) * $vvv->getproduct->getddv->ddv;
                    $makeBaseDDV  = $vvv->price_with_discount / (100 + intval($vvv->getproduct->getddv->ddv));

                 

                     if($vvv->getproduct->getddv->ddv == 18){
                        $ddv18 += $makeddvvrednost * $vvv->qty;
                        $baseddv18 += $makeBaseDDV * 100 * $vvv->qty;
                      }
                      if($vvv->getproduct->getddv->ddv == 8){
                        $ddv5   += $makeddvvrednost * $vvv->qty;
                        $baseddv5 += $makeBaseDDV * 100 * $vvv->qty;
                      }

                        $ddv5_f += $ddv5;
                        $ddv18_f += $ddv18;

                 }else{
                   // echo "<br>PACKS:<br>";
                     $packs = Packages::with('getproductsrelations.getproduct_mini_ddv')->find($vvv->package_id);


                       /* echo "Price: ".$vvv->price_with_discount."<br>";
                        echo "QTY:".$vvv->qty."<br>";*/

                    if(!is_null($packs) && isset($packs->getproductsrelations)){
                        $package_price = getfinalprice($packs->minimal_price,$packs->discounted_price,$packs->discount_status,$packs->discount_from_date,$packs->discount_to_date,$packs->discount_permanent_yesno,$packs->discount_kolicina,$packs->discount_kolicina_nolimit,null);
                        $devided_price = $package_price / $packs->getproductsrelations->count();
                        $nrproducts = $packs->getproductsrelations->count();
                        
                        $anr_ddv18 =0;
                        $anr_ddv5=0;

                        foreach ($packs->getproductsrelations as $kpp => $vpp) {
                        
                            if(isset($vpp->getproduct_mini_ddv->getddv)){
                                if($vpp->getproduct_mini_ddv->getddv->ddv == 18){                                 
                                    $anr_ddv18+=1; 
                                }else if($vpp->getproduct_mini_ddv->getddv->ddv == 8){
                                    
                                    $anr_ddv5+=1;// ($devided_price / 105) * 5;
                                }
                            }
                        }

                    $ddvtotal = $anr_ddv18 + $anr_ddv5;
                    $splitprice = $vvv->price_with_discount / $ddvtotal;

         
                    $ddv18 +=  ((($splitprice / 118) * 18) * $anr_ddv18) * $vvv->qty;
                    $ddv5  +=  ((($splitprice / 108) * 8) * $anr_ddv5) * $vvv->qty;

                    $baseddv18 +=  ((($splitprice / 118) * 100) * $anr_ddv18) * $vvv->qty;
                    $baseddv5  +=  ((($splitprice / 108) * 100) * $anr_ddv5) * $vvv->qty;
                    $ddv5_f += $ddv5;$ddv18_f += $ddv18;
                    }
                 }


                   
                // echo "<br>";
                
            }//end foreach
             // echo "<br>---------------<br>";
                $base_ddv = $baseddv5 + $baseddv18;
                $total_order_ddv = $ddv5 + $ddv18;
           
                 $total_order_promet = $data->total_order - $total_order_ddv;

                 $arr_update = array();

                 $arr_update['base_ddv18'] = $baseddv18;
                 $arr_update['base_ddv5'] = $baseddv5;
                 $arr_update['base_ddv'] = $base_ddv;
                 $arr_update['ddv18'] = $ddv18;
                 $arr_update['ddv5'] = $ddv5;
                 $arr_update['total_order_ddv'] = $total_order_ddv;

                 if($data->total_order_promet == 0 || $total_order_promet >= 0){
                    $arr_update['total_order_promet'] = $total_order_promet;
                 }
                 if($data->total_order_nodiscount == 0 && $total_price >= 0){
                     $arr_update['total_order_nodiscount'] = $total_price;
                }


                Orders::where('id',$data->id)->limit(1)->update($arr_update);

          //  echo "<br>---------------<br>";

          }

        //  echo "DDV5=".$ddv5_f."<br>DDV18=".$ddv18_f;

    }
}