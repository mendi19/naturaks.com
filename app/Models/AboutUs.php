<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AboutUs extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'about_us';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
