<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrdersEmployeeInfos extends Model
{

    protected $table = 'orders_employee_infos';

     protected $casts = [
        'current_inban_operators' => 'json'
    ];

    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getorder(){
        return $this->hasOne('App\Models\Orders','id','order_id');
    }


     public function getuser(){
        return $this->hasOne('App\User','id','leader_id')->select('id','name','last_name');
    }
}
