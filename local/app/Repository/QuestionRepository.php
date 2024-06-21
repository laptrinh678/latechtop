<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use App\Models\Question;
class QuestionRepository extends BaseRepository
{
    public function getModel(): String
    {
        return Question::class;
    }
   

}


