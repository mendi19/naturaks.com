<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs,App\Models\Cities;

class AboutController extends Controller
{
    public function index(){
    	$domain_id = 3;
    	$data = AboutUs::where('domain_id',$domain_id)->first();

    	 $cities = Cities::query();
        $cities->where('domain_id',$domain_id);
        $cities = $cities->where('status',1)
           ->orderby('domain_id','asc')
           ->orderby('name','asc')
           ->get();

    	return view('pages/about',compact('data','cities'));
    }


}
