<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Nutrigenetika extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'nutrigenetika';
     public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
