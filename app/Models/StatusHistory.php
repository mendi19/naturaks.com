<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StatusHistory extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'status_history';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getuser(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
