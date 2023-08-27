<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use DB;
class ProductReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Product::class;
    }
    public function all2()
    {
        //dd('aaawwwww');
        $user  = DB::table('users')->get()->toArray();
        // //dd('aaa');
        // //$quote =[1,2,3,4,5,6];
        return $user;
    }
    public function getDetail()
    {

    }

}