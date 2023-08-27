<?php 
namespace App\Repository;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slider;
use DB;
class SliderReponsitory extends BaseRepository
{
    public function getModel(): String
    {
        return Slider::class;
    }

}