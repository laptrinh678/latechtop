<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QuestionGroup extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "question_groups";
    protected $fillable = [
        'name',
        'cate_id',
        'deleted_at',
        'slug'
    ];
    public function cate(){
        return $this->hasOne(Cate::class, 'id', 'cate_id');
    }
    public function question(){
        return $this->hasMany(Question::class, 'question_groups_id', 'id')->with('replys');
    }
}
