<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
class Cate extends Model
{
    use SoftDeletes;
    protected $table = "cates";
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'des',
        'parent_id',
        'icon',
        'user_id',
        'deleted_at',
        'menu_type',
        'type_menu',
        'page',
        'img_default',
        'documents_round_one_status'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'cate_id', 'id');
    }

    public function product(){
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
    public function questionGroup() {
        return $this->hasMany(QuestionGroup::class, 'cate_id', 'id');
    }
     public function childrenMenu() {
        return $this->hasMany(Cate::class, 'parent_id', 'id')->with('questionGroup');
     }
}
