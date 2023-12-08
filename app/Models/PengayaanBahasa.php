<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengayaanBahasa extends Model
{
    //

    protected $table = 't_pengayaan_bahasa';

    protected $fillable = ['id', 'id_profile', 'id_lokasi_pb', 'status_pb', 'jenis_kelas', 'durasi', 'batch', 'jenis_tes_pendaftaran', 'skor_pendaftaran', 'jenis_tes_setelah_pb', 'skor_setelah_pb', 'tanggal_mulai_pb', 'tanggal_selesai_pb', 'status_perpanjangan', 'id_lokasi_perpanjangan', 'jenis_kelas_perpanjangan', 'skor_setelah_perpanjangan', 'tanggal_mulai_perpanjangan', 'tanggal_selesai_perpanjangan', 'jenis_tes_syarat_kampus', 'skor_syarat_kampus', 'jenis_tes_syarat_kampus_2', 'skor_syarat_kampus_2', 'jenis_tes_syarat_kampus_3', 'skor_syarat_kampus_3', 'keterangan', 'UPDATED_DATE'];

    public function infoBeaPengayaanBahasaMerged() {
        $lib = 'App\Models\User';
        return $this->hasMany($lib);
    }

}
