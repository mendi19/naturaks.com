<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UsersPermissions extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'users_permissions';
     public $timestamps = false;
}
