<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PackageImages extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $casts = [
        'image'            => 'json'
    ];

    protected $table = 'package_images';
}
