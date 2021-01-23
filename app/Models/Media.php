<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Media extends Model
{
    protected $fillable = [
        'id'

    ];

    protected $table = 'media';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getcity(){
    	return $this->hasOne('App\Models\Cities','id','city_id');
    }
}
