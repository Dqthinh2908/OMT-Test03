<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'comment';
    protected $fillable = [
        'users_id',
        'posts_id',
        'content_comment',
    ];
    protected $date = ['deleted_at'];
    public function posts()
    {
        return $this->belongsTo(posts::class,'posts_id','id');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'users_id','id');
    }
}
