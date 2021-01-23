<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'orders';

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
        return $this->hasOne('App\User','id','employee_id');
    }

    public function getorderdetails(){
        return $this->hasMany('App\Models\OrdersDetails','order_id','id');
    }

    public function getCourse(){
        return $this->hasOne('App\Models\Course','id_domain','domain_id');
    }

    public function getDeliveryPartner(){
        return $this->hasOne('App\Models\DeliveryPartners','id','delivery_id');
    }

    public function getassociatePartner(){
        return $this->hasOne('App\Models\Associates','id','associate_id');
    }


    public function getstatushistory(){
        return $this->hasMany('App\Models\StatusHistory','order_id','id');
    }

     public function getcity(){
        return $this->hasOne('App\Models\Cities','id','city_id');
    }

    public function getorder_user_info(){
        return $this->hasOne('App\Models\OrdersEmployeeInfos','order_id','id');
    }

    public function payment_details(){
        return $this->hasOne('App\Models\PaymentsInfos','order_id','id');
    }
}
