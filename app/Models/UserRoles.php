<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $fillable = [
        'id'
    ];

    protected $table = 'users_roles';
    public $timestamps = false;
}
