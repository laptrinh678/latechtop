<?php
namespace App\Repository;
use App\Models\Doidiemsangtien;
class DoitienRepository extends BaseRepository
{
    public function getModel(): String
    {
        return Doidiemsangtien::class;
    }

}
