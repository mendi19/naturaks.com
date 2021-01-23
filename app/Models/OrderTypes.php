<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderTypes extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'order_types';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
