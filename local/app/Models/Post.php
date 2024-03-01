<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Post extends Model
{
    use HasFactory;
   // use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'des',
        'des2',
        'icon',
        'img',
        'cate_id',
        'deleted_at',
        'post_type',
        'link_dowload',
        'view',
        'price',
        'id_province',
        'product_id'
    ];

    public function cate(){
        return $this->hasOne(Cate::class, 'id', 'cate_id')->with('posts');
    }

    public function productPost()
    {
        return $this->belongsToMany(Product::class, 'product_post', 'post_id', 'product_id');

    }

}
