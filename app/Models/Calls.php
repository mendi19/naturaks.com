<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Calls extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'calls';

     public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getclient(){
    	return $this->hasOne('App\User','id','client_id');
    }

    public function getordertype(){
    	return $this->hasOne('App\Models\OrderTypes','id','order_type_id');
    }

    public function getoperator(){
        return $this->hasOne('App\User','id','operator_id');
    }

    public function getorder(){
        return $this->hasOne('App\Models\Orders','id','order_id');
    }

    public function getorders(){
        return $this->hasMany('App\Models\Orders','client_id','client_id');
    }
}
