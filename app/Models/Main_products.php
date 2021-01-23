<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Main_products extends Model
{
    protected $fillable = [
        'id'
    ];

     protected $casts = [
        'featured_image'    => 'json'
    ];


    protected $table = 'main_products';

    public function getDDV(){
    	return $this->hasOne('App\Models\Ddv','id','id_ddv');
    }
}
