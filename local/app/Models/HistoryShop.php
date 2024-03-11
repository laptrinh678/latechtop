<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryShop extends Model
{
    use HasFactory;
    protected $table ="history_shop";
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
