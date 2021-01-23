<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PaymentsInfos extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $casts = [
       'allresponse' => 'json'
    ];

    protected $table = 'payments_infos';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }
}
