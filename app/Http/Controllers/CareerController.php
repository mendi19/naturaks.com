<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Careers;

use Illuminate\Support\Str;
use File;
class CareerController extends Controller
{
	public function store(Request $request){
		$request->validate([
			'fullname'  => 'required|string|min:5|max:200',
			'position'  => 'required|string|min:3|max:200',
			'city' 		=> 'required|string|min:3|max:100',
			'email' 	=> 'required|string|min:7|max:200',
			'cv'		=> 'required'
		]);

   
        try{
        	$data = new Careers();
            $data->fullname = $request->fullname;
            $data->position = $request->position;
            $data->region = $request->city;
            $data->email = $request->email;
            $data->phone = $request->phone;
            if(isset($request->message)){
            	$data->desc = $request->message;
        	}

            $absolutedir  = public_path();
            $path_to_upload  = '/careers-cv/'.Str::random(20)."/";
            $final_path_to_upload   = $absolutedir.$path_to_upload;
                
            if (!File::exists($absolutedir.$path_to_upload)){
                File::makeDirectory($absolutedir.$path_to_upload, 0777, true, true); 
            }

            if(isset($_FILES['cv']['tmp_name']) && $_FILES['cv']['tmp_name'] != ''){       
                    $ext = pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
                    $new_filename = $request->fullname.".".$ext;
                    $tmp_name = $_FILES["cv"]["tmp_name"];
                    move_uploaded_file($tmp_name,$final_path_to_upload.''.$new_filename);
                    $fulliconpath = $path_to_upload.$new_filename;
                    $data->cv = $path_to_upload.$new_filename;
            }



            	if($data->save()){
                     return response()->json([
                        'msg'     => 'success',
                        'message' => trans('alerts.actionhandledsuccesfuly'), 
                        'title'   => trans('alerts.success')],200);
                }else{
                      return response()->json([
                        'msg' => 'error',
                        'title' => trans('alerts.error'),
                        'message' => trans('alerts.somethingwentwrong')],500);
                }
            }catch(\Exception $e){
                  return response()->json([
                    'msg' => 'error',
                    'title' => trans('alerts.error'),
                    'message' => $e->getMessage()],500);
            }
	}  
}
