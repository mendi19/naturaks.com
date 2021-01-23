<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs;

use App\Models\BlogPosts;

class NutrigenetikaController extends Controller
{
    public function index(){
    	$domain_id = 3;
    	$data = BlogPosts::where('domain_id',$domain_id)->first();
    	return view('nutrigenetika/index',compact('data'));
    }


}
