<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PackageProducts extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'package_products';

     public function getproduct(){
        return $this->hasOne('App\Models\DomainProducts','id','product_id');
    }


    public function getproduct_mini_ddv(){
        return $this->hasOne('App\Models\DomainProducts','id','product_id')->select('id','id_ddv');
    }

    public function getOrderDetails(){
        return $this->hasMany('App\Models\OrdersDetails','product_id','product_id');
    }
}
