<?php
namespace App\Repository;
use App\Models\ProductSold;
class ProductSoldRepository extends BaseRepository
{
    public function getModel(): String
    {
        return ProductSold::class;
    }

}


