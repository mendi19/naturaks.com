<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CalendarDatesOff extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'calendar_dates_off';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

     public function getreligion(){
    	return $this->hasOne('App\Models\Religions','id','religion_id');
    }
}
