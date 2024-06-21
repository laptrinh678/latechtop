<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "question";
    protected $fillable = [
        'name',
        'question_groups_id',
        'explain',
        'deleted_at',
        'sort_index'
    ];
    public function replys()
    {
        return $this->hasMany(Reply::class, 'question_id', 'id');
    }
    public function questionGroup(){
        return $this->hasOne(QuestionGroup::class, 'id', 'question_groups_id');
    }
}
