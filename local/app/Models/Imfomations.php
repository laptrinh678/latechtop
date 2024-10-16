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
        'des3',
        'title_home',
        'des4',
        'headProduct',
        'endProduct',
        'money_member',
        'documents_round_one',
        'documents_round_one_list'
    ];
}
