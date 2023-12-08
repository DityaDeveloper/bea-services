<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MNegara extends Model
{
    //
    protected $table = 'm_negara';

    protected $fillable = ['id', 'id_benua', 'negara', 'is_active', 'UPDATED_DATE', 'iso_code', 'id_tujuan_beasiswa'];

    public function infoProfileMNegaraMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }
}
