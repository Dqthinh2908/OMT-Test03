<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'posts_category';
    public function posts()
    {
        return $this->hasMany(posts::class,'posts_category_id','id');
    }
    public function showCategories()
    {
        $data = DB::table('posts_category')->paginate(6);
        return $data;
    }
    public function getDataType()
    {
        $categoryData = DB::table('posts_category')->get();
        return $categoryData;
    }
    
}
