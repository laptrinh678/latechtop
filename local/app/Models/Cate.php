<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'page'
    ];
    public function posts(){
        return $this->hasMany(Post::class, 'cate_id', 'id');
    }
}
