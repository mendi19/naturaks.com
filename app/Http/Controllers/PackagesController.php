<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Packages;

class PackagesController extends Controller
{
     public function packages(){
     	$rows_per_page = 50;$category_id=0;

    	$data = Packages::where('domain_id',3)
    	->where('slug','!=',NULL)
    	->where('status_webpage',1)
    	->orderby('nrorder','asc')
    	->paginate($rows_per_page);
    	return view('packages/list',compact('data','rows_per_page','category_id'));
    }

    public function show($slug){
    	$data = Packages::where('slug','LIKE',$slug)
      ->with('getimages')
      ->where('status_webpage',1)
      ->first();
     
      if(!is_null($data)){
    	  return view('packages/view',compact('data'));
      }else{
        return redirect(route('shop.packages'));
      }
    }

      public function byslug($slug){
        $rows_per_page = 50;
        $myArray = trans('arrays.products_categories_slugs');
        $category_id = array_search($slug, $myArray);
        if ($category_id === false) {
        
        } else {
           $data =  Packages::where('domain_id',3)
        ->where('slug','!=',NULL)
        ->where('status_webpage',1)
        ->where('category_id',$category_id)
        ->orderby('nrorder','asc')
        ->paginate($rows_per_page);

           $meta_title = trans('arrays.products_categories')[$category_id];

           return view('packages/list',compact('data','category_id','meta_title','rows_per_page'));
        }

      
    }

}
