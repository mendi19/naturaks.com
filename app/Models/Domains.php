<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Domains extends Model
{
    protected $fillable = [
        'id'
    ];

    protected $table = 'domains';

    public function getproducts(){
    	return $this->hasMany('App\Models\DomainProducts','domain_id','id');
    }
    public function getpackages(){
    	return $this->hasMany('App\Models\Packages','domain_id','id');
    }

}
