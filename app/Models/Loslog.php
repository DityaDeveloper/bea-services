<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loslog extends Model
{
    //

    protected $table = 'sps.LOSLOG';

    protected $fillable = ['IdPengajuan', 'TipePengajuan', 'DNLN', 'Keperluan', 'ReferensiLOS', 'NamaKedutaan', 'AlamatKedutaan', 'Negara', 'Universitas', 'UnivLainnya', 'AlamatUniv', 'Prodi', 'LamaStudi', 'MulaiStudi', 'TuitionFee', 'IsPerpindahan', 'IsFamily', 'Allowance', 'AllowanceOther', 'FamilyAllowance', 'IsFamilyAllowance', 'Catatan', 'TglUpdate', 'CurrencyId', 'RekomendasiPIC', 'CatatanCPB_PB', 'AlasanRevisi', 'ProgramLOG', 'LOGRevisi', 'Id_DocumentRequest', 'AkhirStudi', 'CounterDok', 'NoDokumen', 'TglPenerbitanDok', 'Document', 'IsSigning', 'LogSigning', 'IPSigning', 'BrowserSigning', 'SignedDate', 'SignedID', 'KomponenProgramJenjangID', 'IdBookAllowance', 'IdSK', 'isActive', 'NamaPerubahan', 'IsLOSNew', 'IsLOSSeleksi'];

    public function requestDocMerged() {
        $lib = 'App\Models\RequestDoc';
        return $this->hasMany($lib, 'IdPengajuan', 'Id');
    }

}
