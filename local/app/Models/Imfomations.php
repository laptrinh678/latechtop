<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imfomations extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'img1',
        'img2',
        'slogan',
        'adress',
        'hotline',
        'phone',
        'mail',
        'facebook',
        'zalo',
        'text_seo',
        'des1',
        'des2',
        'title_home'
    ];
}
