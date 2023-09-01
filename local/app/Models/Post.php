<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
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
