<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPoints extends Model
{
    use HasFactory;
    protected $table ="history_point";
    protected $fillable = [
        'user_id',
        'diemcu',
        'diemconlai',
        'status'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
