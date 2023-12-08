<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MJenjang extends Model
{


    protected $table = 'm_jenjang';

    protected $fillable = ['id', 'jenjang', 'kode_no_induk', 'is_active', 'UPDATED_DATE'];

    public function infoBeaJenjangMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }

}
