<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BlogPosts extends Model
{
    protected $fillable = [
        'id'
    ];
    protected $table = 'blog_posts';
    public function getdomain(){
    	return $this->hasOne('App\Models\Domains','id','domain_id');
    }

      public function getrelatedproducts(){
        return $this->hasMany('App\Models\BlogRelatedProducts','blog_id','id')->where('related_product_id','>',0);
    }

    public function getrelatedpackages(){
        return $this->hasMany('App\Models\BlogRelatedProducts','blog_id','id')->where('related_product_id',0);
    }

}
