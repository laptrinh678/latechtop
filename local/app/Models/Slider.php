<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
     protected $fillable = [
        'img',
        'des1',
        'des2',
        'des3',
        'deleted_at',
        'slider_type'
    ];
}
