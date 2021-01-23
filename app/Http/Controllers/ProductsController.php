<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DomainProducts;

class ProductsController extends Controller
{
    public function products(){
        $category_id = 0;
    	$rows_per_page = 50;
    	$data = DomainProducts::where('domain_id',12)
    	->where('status_webpage',1)
    	->where('slug','!=',NULL)
    	->orderby('nrorder','asc')
    	->paginate($rows_per_page);

        $meta_title = trans('global.products');
    	return view('products/list',compact('data','category_id','meta_title'));
    }

    public function show($slug){
    	$data = DomainProducts::where('domain_id',12)
        ->where('slug','LIKE',$slug)
        ->where('status_webpage',1)
        ->with('getimages')->first();
        
        if(!is_null($data)){
    	   return view('products/view',compact('data'));
        }else{
            return redirect(route('shop.products'));
        }
    }

    public function byslug($slug){
        $rows_per_page = 50;
        $myArray = trans('arrays.products_categories_slugs');
        $category_id = array_search($slug, $myArray);
        if ($category_id === false) {
        
        } else {
           $data = DomainProducts::where('domain_id',12)
           ->where('status_webpage',1)
           ->where('category_id',$category_id)
           ->orderby('nrorder','asc')
           ->paginate($rows_per_page);

           $meta_title = trans('arrays.products_categories')[$category_id];

           return view('products/list',compact('data','category_id','meta_title'));
        }

        //echo $index;
    }
    /*public function show($slug){
        $data = DomainProducts::where('domain_id',3)->where('slug','LIKE',$slug)->with('getimages')->first();

        return view('products/view',compact('data'));
    }*/
}
