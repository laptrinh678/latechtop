<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserOrders;
class OrderRepository extends BaseRepository
{
    public function getModel(): String
    {
        return UserOrders::class;
    }

    public function getListOrder(){
    $data = $this->model
    ->select('users_orders.*','users.name')
    ->leftjoin('users', 'users_orders.user_id', '=', 'users.id')
    ->orderBy('users_orders.id','desc')
    ->get();
    return $data;

    }

}


