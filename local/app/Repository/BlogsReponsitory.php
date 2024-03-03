<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use App\Models\Blogs;
class BlogsReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Blogs::class;
    }

}