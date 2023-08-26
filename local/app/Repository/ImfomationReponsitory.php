<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imfomations;
class ImfomationReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Imfomations::class;
    }

}