<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Percent extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'percent';
    
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
