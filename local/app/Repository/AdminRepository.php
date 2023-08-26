<?php
namespace App\Repository;

use App\Models\Admin;
class AdminRepository extends BaseRepository
{
    public function getModel(): String
    {
        return Admin::class;
    }
}


