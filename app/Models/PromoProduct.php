<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PromoProduct extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'promo_product';
     public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getproduct(){
    	return $this->hasOne('App\Models\DomainProducts','id','product_id');
    }
}
