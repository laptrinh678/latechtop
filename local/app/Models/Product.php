<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const OUT_STANDING = 1;
    const PROMOTIONS = 1;
    protected $fillable = [
        'name',
        'product_code',
        'slug',
        'des',
        'des2',
        'icon',
        'img',
        'cate_id',
        'cat_id_parent',
        'deleted_at',
        'outstanding', // sp noi bat
        'promotions', //sp khuyen mai
        'price',
        'point', //điểm tích khi mua sp
        'number',
        'product_old',
        'product_new',
        'product_factory',
        'unit',
        'sold', // so luong da ban
        'status_price', // an hien gia,
        'link',
        'view'

    ];
    public function cate()
    {
        return $this->hasOne(Cate::class, 'id', 'cate_id')->with('product');
    }
    public function productRelate()
    {
        return $this->belongsToMany(Product::class, 'product_relate', 'product_id', 'product_relate_id');
    }
}
