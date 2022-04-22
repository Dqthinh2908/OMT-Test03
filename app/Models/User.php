<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
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
    public function post()
    {
        return $this->hasMany(posts::class,'user_id','id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function checkPermissionAccess($permissionCheck)
    {
        //B1 Lấy được tất cả các quyền user login vào hệ thống
         //B2 So Sánh giá trị đưa vào của router hiện tại xem có tồn tại trong các quyền mà mình lấy được hay không
        $roles = auth()->user()->roles;
        foreach($roles as $role)
        {
            $permissions = $role->permissions;
            // dd($permissions);
            if($permissions->contains('key_code',$permissionCheck))
            {
                return true;
            }
            
        }
        return false;
       
    }
}
