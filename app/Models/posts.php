<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class posts extends Model
{

    //Bảng chính chứa khóa chính, bảng phụ chứa khóa ngoại
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    public $timestamp = false;
    protected $date = ['deleted_at'];
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsTo(categories::class,'posts_category_id','id');
    }
    public function comment()
    {
        return $this->hasMany(comment::class)->orderBy('created_at','desc');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }



    // admin
    public function updatePosts($data,$id)
    {
        $updateData = DB::table('posts')->where('id',$id)
            ->update($data)
        ;
        return $updateData;
    }
    
}
