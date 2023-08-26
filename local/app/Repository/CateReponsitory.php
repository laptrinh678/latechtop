<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cate;
use DB;
class CateReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Cate::class;
    }
    
}