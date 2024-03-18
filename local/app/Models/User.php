<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'showpassword',
        'adress',
        'phone',
        'code',
        'code_product',
        'nhanh',//0 nhanh trai 1 nhanh phai
        'parent_user_id',
        'bank',
        'avata',
        'cccd_mattruoc',
        'cccd_matsau',
        'point',
        'sub_user',// so luong user con
        'diem_nhanhtrai',
        'diem_nhanhphai',
        'status_doitien',
        'sex'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
