<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    protected $fillable = [
        'id'
    ];

    protected $table = 'course';

    public function getDomain(){
    	return $this->hasOne('App\Models\Domains','id','id_domain');
    }
}
