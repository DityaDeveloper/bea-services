<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MKota extends Model
{
    //
    protected $table = 'm_kota';

    protected $fillable = ['id', 'id_negara', 'id_provinsi', 'kota', 'is_active', 'UPDATED_DATE', 'nominal_biaya_hidup', 'kurs_biaya_hidup', 'is_sipendob', 'id_md_city'];

    public function infoProfileMKotaMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }
}
