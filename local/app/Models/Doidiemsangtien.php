<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doidiemsangtien extends Model
{
    protected $table = "doidiemsangtien";
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'comment',
        'status'
    ];
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
