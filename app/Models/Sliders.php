<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'sliders';
     public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
