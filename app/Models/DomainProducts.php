<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DomainProducts extends Model
{
    protected $fillable = [
        'id'
    ];

    protected $casts = [
        'featured_image'    => 'json',
        'images'            => 'json'
    ];
    
    protected $table = 'domain_products';

    public function getMainProduct(){
    	return $this->hasOne('App\Models\Main_products','id','main_product_id');
    }

     public function getdomain(){
        return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getimages(){
        return $this->hasMany('App\Models\ProductImages','product_id','id');
    }

    public function getrelated(){
         return $this->hasMany('App\Models\ProductsRelated','product_id','id');
    }
    public function getrelatedproducts(){
        return $this->hasMany('App\Models\ProductsRelated','product_id','id')->where('related_product_id','>',0);
    }

    public function getrelatedpackages(){
        return $this->hasMany('App\Models\ProductsRelated','product_id','id')->where('related_product_id',0);
    }

    public function getddv(){
        return $this->hasOne('App\Models\Ddv','id','id_ddv');
    }

     public function getPackageProducts(){
        return $this->hasMany('App\Models\PackageProducts','product_id','id');
    }

}
