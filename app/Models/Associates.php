<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Associates extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'associates';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
    public function getcity(){
    	return $this->hasOne('App\Models\Cities','id','city_id');
    }

    public function getcontactpersons(){
        return $this->hasMany('App\Models\AssociateContactpersons','associate_id','id');
    }

     public function getorders(){
        return $this->hasMany('App\Models\Orders','associate_id','id');
    }
}
