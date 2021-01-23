<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContactInfos extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'contact_infos';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
