<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DomainProducts;
use App\Models\AboutUs;

use App\Models\BlogPosts;

class BlogController extends Controller
{
    public function index(){
    	$domain_id = 12;
    	$data = BlogPosts::where('domain_id',$domain_id)->get();
    	return view('blog/list',compact('data'));
    }

    public function show($slug){
    	$data = BlogPosts::where('slug','LIKE',$slug)->first();
    	return view('blog/view',compact('data'));
    }


}
