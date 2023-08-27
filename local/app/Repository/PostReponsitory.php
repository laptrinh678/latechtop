<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use DB;
class PostReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Post::class;
    }
   

}