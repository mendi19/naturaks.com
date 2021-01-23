<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Packages extends Model
{
    protected $fillable = [
        'id'
    ];

      protected $casts = [
        'featured_image'    => 'json'
    ];

    protected $table = 'packages';

    public function getimages(){
    	return $this->hasMany('App\Models\PackageImages','package_id','id');
    }

    public function getproductsrelations(){
        return $this->hasMany('App\Models\PackageProducts','package_id','id');
    }
    

    public function getrelatedproducts(){
        return $this->hasMany('App\Models\PackagesRelated','package_id','id')->where('related_product_id','>',0);
    }

    public function getrelatedpackages(){
        return $this->hasMany('App\Models\PackagesRelated','package_id','id')->where('related_product_id',0);
    }

}

