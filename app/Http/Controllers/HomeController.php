<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DomainProducts,
	App\Models\Packages,
	App\Models\PromoProduct;
class HomeController extends Controller
{
    public function index(){
    	$domain_id = \Config::get('app.domain_id');
    	$products_home = DomainProducts::where('domain_id',$domain_id)->where('status_webpage',1)->where('status_homepage',1)->orderby('nrorder','asc')->get();

    	$recomended_packages = Packages::where('domain_id',$domain_id)
        ->where('status_webpage',1)
        ->where('recommended',1)
        ->orderby('nrorder','asc')->get();

    	$promo_prod = PromoProduct::where('domain_id',$domain_id)->with('getproduct')->first();

    	$packages = Packages::where('domain_id',$domain_id)->where('status_webpage',1)->where('status_homepage',1)->orderby('nrorder','asc')->get();

    	return view('index',compact('products_home','recomended_packages','promo_prod','packages'));
    }
}
