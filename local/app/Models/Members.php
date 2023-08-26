<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $guarded = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'showpassword',
        'adress',
        'phone',
        'code',
    ];
}
