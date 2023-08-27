<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserOrders;
class CartRepository extends BaseRepository
{
    public function getModel(): String
    {
        return UserOrders::class;
    }
   

}


