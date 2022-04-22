<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class user extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = [];
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    public function getDataUser()
    {
        return DB::table('users')->get();
    }
    public function roles()
    {
        return $this->belongsToMany(roles::class,'user_role','user_id','role_id');
    }
   

}
