<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SP extends Model
{
    //

    protected $table = 'sps.SP';

    protected $fillable = ['KodeRegistrasi', 'Lampiran', 'Intake', 'TglSubmit', 'Status', 'PICVerif', 'TglVerif', 'CatatanPenolakan', 'BatchPK', 'IsSubmitPK', 'AlasanUbahJadwal', 'BuktiDukung', 'StatusUbahJadwal', 'PICVerifUbahJadwal', 'TglVerifUbahJadwal', 'UnivTujuan', 'Keterangan', 'TglUsulan', 'StatusKelulusan', 'TglLulus', 'IsShow', 'AlasanPenolakanId'];

}
