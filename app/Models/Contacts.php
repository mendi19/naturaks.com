<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Contacts extends Model
{
    protected $fillable = [
        'id'
    ];

    protected $table = 'contacts';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

    public function getleader(){
    	return $this->hasOne('App\User','id','team_leader');
    }
}