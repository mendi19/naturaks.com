<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Religions extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'religions';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
