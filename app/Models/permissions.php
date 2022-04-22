<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $guarded = [];
    public function permissionChildrent()
    {
        return $this->hasMany(permissions::class,'parent_id');
    }
}
