<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DeliveryPartners extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'delivery_partners';

     public function getdomain(){
        return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getcity(){
        return $this->hasOne('App\Models\Cities','id','city_id');
    }

    public function getsorabotnik(){
        return $this->hasOne('App\Models\Associates','id','associate_id');
    }

    public function getcurrency(){
        return $this->hasOne('App\Models\Course','id_domain','domain_id');
    }

    public function getorders(){
         return $this->hasMany('App\Models\Orders','delivery_id','id');
    }
}
