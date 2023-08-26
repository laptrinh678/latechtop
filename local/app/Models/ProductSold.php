<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    protected $table = "products_sold";
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_order',
        'number',
    ];
}
