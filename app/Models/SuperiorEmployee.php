<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SuperiorEmployee extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'superior_employee';

     public function getuser_superior(){
        return $this->hasOne('App\User','id','superior_employe');
    }
}
