<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrders extends Model
{
    use HasFactory;
    protected $table ='users_orders';
    protected $fillable = [
        'user_id',
        'data',
        'product_id',
        'infor',
        'total',
        'pay',
        'total_point'
    ];
    public function productSold(){
        return $this->belongsTo(ProductSold::class,'id_order','id');
    }
}
