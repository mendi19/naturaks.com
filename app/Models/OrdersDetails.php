<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrdersDetails extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'orders_details';

    public function getproduct(){
    	return $this->hasOne('App\Models\DomainProducts','id','product_id');
    }

    public function getpackage(){
    	return $this->hasOne('App\Models\Packages','id','package_id');
    }

    public function getorder(){
        return $this->hasOne('App\Models\Orders','id','order_id');
    }


    public function getpackageproducts(){
        return $this->hasMany('App\Models\PackageProducts','package_id','package_id');
    }
    
}
