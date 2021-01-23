<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User,App\Models\Domains,App\Models\Cities,App\Models\Orders,App\Models\Religions;
use Str,Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   

    public function storeclient($name,$lastname,$email,$domain,$status,$phone,$phone2,$city,$dob,$isEmployee,$operator,$address,$area,$religion,$origin){
        $data = new User();
        $data->name      = $name;
        $data->last_name = $lastname;
        $data->email     = $email;
        $data->domain_id = $domain;
        $data->password  = bcrypt(Str::random(20));
        $data->status    = $status;
        $data->origin    = $origin;
        $data->phone     = $phone;
        $data->phone2    = $phone2;
        $data->city_id   = $city;
        if($area != ''){
          $data->area      = $area;
        }
        if($dob != null){
            $data->dob  = $dob;
        }        
        $data->isEmployee = $isEmployee;
        if(isset($operator)){
            $data->operator_id = $operator;
        }
        $data->religion = $religion;
        $data->address = $address;
        $data->api_token = Str::random(20).Str::random(20).Str::random(20);
        if($data->save()){
            return $data->id;
        }
        return 0;
    }
}