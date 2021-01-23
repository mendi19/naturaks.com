<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ddv extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'ddv';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
