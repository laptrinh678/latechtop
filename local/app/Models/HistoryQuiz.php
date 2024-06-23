<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryQuiz extends Model
{
    use HasFactory;
    protected $table ="history_quiz";
    protected $fillable = [
        'user_id',
        'question_group_id',
    ];
    public function questionGroup(){
        return $this->hasOne(QuestionGroup::class, 'id', 'question_group_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
