<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Members;
class MembersRepository extends BaseRepository
{
    public function getModel(): String
    {
        return Members::class;
    }
   

}


