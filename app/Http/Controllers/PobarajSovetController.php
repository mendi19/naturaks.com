<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\PobarajSover;

class PobarajSovetController extends Controller
{
    public function pobarajsovet(Request $request){

    	$request->validate([
			'fullname'  	=> 'required|string|min:5|max:200',
			'phone'  		=> 'required|string|min:3|max:200',
			'opstina' 		=> 'required|min:1',
			'email' 		=> 'required|string|min:7|max:200',
			'region'		=> 'required',
			'message'		=> 'required|min:3|max:500'
		]);

   
        try{

    		$email = 'soveti@naturatherapy.mk';
    		$data_ = array();
    		$data_['fullname'] = $request->fullname;
    		$data_['phone'] = $request->phone;
    		$data_['opstina'] = $request->opstina;
    		$data_['email'] = $request->email;
    		$data_['region'] = $request->region;
    		$data_['message'] = $request->message;
    		Mail::to($email)->send(new PobarajSover($data_));
             
             return response()->json([
                        'msg'     => 'success',
                        'message' => trans('alerts.pobarajsover_success'), 
                        'title'   => trans('alerts.success')],200);

            }catch(\Exception $e){
                  return response()->json([
                    'msg' => 'error',
                    'title' => trans('alerts.error'),
                    'message' => $e->getMessage()],500);
            }
    }
}
