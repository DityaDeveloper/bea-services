<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'Role';

    protected $fillable = ['roleid', 'roleName', 'desc'];

    public function mergedUserLoginMerged() {
        $lib = 'App\Models\UserLogin';
        return $this->hasMany($lib);
    }

}
