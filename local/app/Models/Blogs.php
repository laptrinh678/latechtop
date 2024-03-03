<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = [
        'name',
        'cate_id',
        'product_id',
        'post_id',
        'deleted_at',
    ];
}
