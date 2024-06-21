<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use App\Models\Reply;
class ReplyRepository extends BaseRepository
{
    public function getModel(): String
    {
        return Reply::class;
    }
   

}


