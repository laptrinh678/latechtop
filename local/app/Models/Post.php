<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
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
        'view'
    ];
}
