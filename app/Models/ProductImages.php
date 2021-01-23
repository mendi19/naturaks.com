<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $casts = [
        'image'            => 'json'
    ];
    protected $table = 'product_images';
}
