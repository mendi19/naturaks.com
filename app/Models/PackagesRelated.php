<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PackagesRelated extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'packages_related';

    public function product(){
    	return $this->hasOne('App\Models\DomainProducts','id','related_product_id');
    }

    public function package(){
    	return $this->hasOne('App\Models\Packages','id','related_package_id');
    }
}
