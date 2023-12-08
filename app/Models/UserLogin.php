<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    //
    protected $table = 'userLogin';

    protected $fillable = ['id', 'username', 'password', 'roleid', 'name'];


    public function userRole() {
        $lib = 'App\Models\UserRole';
        return $this->belongsTo($lib, 'roleid', 'roleid');
    }

    public function userProfile() {
        $lib = 'App\Models\User';
        return $this->belongsTo($lib, 'username', 'email');
    }
}
