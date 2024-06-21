<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = "replys";
    protected $fillable = [
        'name',
        'question_id',
        'reply_value',
    ];

}
