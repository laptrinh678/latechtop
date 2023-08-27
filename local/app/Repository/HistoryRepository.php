<?php
namespace App\Repository;
use App\Models\HistoryPoints;
class HistoryRepository extends BaseRepository
{
    public function getModel(): String
    {
        return HistoryPoints::class;
    }


}


