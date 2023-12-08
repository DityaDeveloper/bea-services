<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherPersonalData extends Model
{
    //
    protected $table = 'sps.OtherPersonalData';

    protected $fillable = ['KodeRegistrasi', 'NamaPanggilan', 'NoPaspor', 'NamaPaspor', 'Telp', 'EmailAlternatif', 'Website', 'Facebook', 'Twitter', 'Skype', 'NegaraDomisili', 'KotaDomisili', 'AlamatDomisili', 'NamaOCDomisili', 'AlamatOCDomisili', 'TelpOCDomisili', 'EmailOCDomisili', 'Photo', 'UID', 'TglUpdate', 'AlamatTinggalStudi', 'NegaraStudi', 'NamaOCStudi', 'TelpOCStudi', 'EmailOCStudi', 'IsFirstPopup', 'id_user_pb'];

    public function infoProfileOtherDataMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }
}
