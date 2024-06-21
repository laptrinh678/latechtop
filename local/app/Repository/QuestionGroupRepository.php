<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Model;
class QuestionGroupRepository extends BaseRepository
{
    public function getModel(): String
    {
        return QuestionGroup::class;
    }
   

}


