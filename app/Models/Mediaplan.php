<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mediaplan extends Model
{
    protected $fillable = [
        'id'
    ];

     protected $casts = [
        'times'    => 'json'
    ];
    protected $table = 'media_plan';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getcity(){
    	return $this->hasOne('App\Models\Cities','id','city_id');
    }

    public function getmedia(){
        return $this->hasOne('App\Models\Media','id','medium_id');
    }
}
