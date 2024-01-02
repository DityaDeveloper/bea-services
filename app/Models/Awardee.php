<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Awardee extends Model
implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    //

    // protected $table = '';

    // protected $fillable = [];


    protected $table = 'dbo.profile_awardee';

    protected $fillable = ['kode_registrasi', 'NIK', 'batch_seleksi', 'tahun_lolos_seleksi', 'No_SK_Seleksi', 'tanggal_SK_seleksi', 'kategori_pembayaran', 'jenis_beasiswa', 'program_beasiswa', 'jenis_cofunding', 'jenjang_studi', 'tujuan_beasiswa', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'email', 'kabkota', 'provinsi', 'jenis_pekerjaan', 'Instansi_Kementerian_Lembaga', 'bidang_karir', 'sektor_karir', 'bidang_keilmuan', 'prodi_asal', 'universitas_asal', 'prodi_tujuan_pendaftaran', 'universitas_tujuan_pendaftaran', 'negara_tujuan_pendaftaran', 'status_kontrak', 'tahun_kontrak', 'no_induk_lpdp', 'batch_pk', 'jenjang_studi_kontrak', 'tujuan_beasiswa_kontrak', 'universitas_tujuan_kontrak', 'prodi_tujuan_kontrak', 'benua_tujuan_kontrak', 'negara_tujuan_kontrak', 'kota_tujuan_kontrak', 'bidang_keilmuan_kontrak', 'awal_studi', 'akhir_studi', 'status_akademik', 'Id', 'No_SK_penerima_beasiswa', 'tanggal_penerbitan_SP', 'jenis_pengajuan', 'awal_studi_disetujui', 'akhir_studi_disetujui', 'no_surat_CRM', 'UPDATED_DATE', 'modified_by_id', 'alamat', 'nama_bapak', 'nama_ibu', 'nama_pasangan', 'status_menikah', 'is_sp_dikembalikan', 'kabkota_saat_ini', 'alamat_saat_ini', 'komponen_biaya_cofunding', 'is_dibuatkan_akun_simonev', 'negara_tujuan_kontrak_ISO_code', 'provinsi_asal_ISO_code', 'id_universitas_tujuan_kontrak', 'id_status_akademik', 'id_status_kontrak', 'id_program_beasiswa', 'id_jenjang_studi', 'id_tujuan_beasiswa', 'id_kabkota_asal', 'no_induk_mahasiswa', 'durasi_studi', 'frekuensi_dana_hidup', 'bahasa_skor_pendaftaran', 'bahasa_jenis_tes_pendaftaran', 'email_saat_ini', 'no_hp_saat_ini', 'awal_studi_2', 'akhir_studi_2', 'awal_studi_3', 'akhir_studi_3', 'awal_studi_4', 'akhir_studi_4', 'sumber_info_durasi_studi', 'catatan_kontrak', 'link_foto', 'tanggal_SK_penerima_beasiswa', 'nama_lengkap_lama', 'id_universitas_tujuan_kontrak_lama', 'prodi_tujuan_kontrak_lama', 'id_tujuan_beasiswa_lama', 'tanggal_SK_penerima_beasiswa_revisi', 'No_SK_penerima_beasiswa_revisi', 'No_SK_penerima_beasiswa_sebelumnya', 'catatan_seleksi', 'nidn', 'nuptk', 'id_sekolah', 'tanggal_SK_berlaku_sejak', 'id_provinsi_saat_ini', 'id_status_beasiswa', 'id_status_akademik_universitas', 'id_status_pembiayaan', 'tanggal_deadline_pencarian_loa', 'id_kelas', 'awardee_fakultas', 'awardee_nama_pa', 'awardee_telephone_pa', 'awardee_email_pa', 'awardee_nama_promotor', 'awardee_telephone_promotor', 'awardee_email_promotor', 'awardee_tanggal_masuk', 'awardee_batas_studi', 'awardee_tanggal_lulus', 'awardee_tanggal_yudisium', 'awardee_nomor_ijazah', 'perkembangan_ipk', 'awardee_jurusan_universitas', 'pns_unit_eselon_1', 'pns_unit_eselon_2', 'id_fakultas', 'id_program_studi', 'hak_spp', 'isHaveLoAFromSeleksi'];

    protected $hidden = ['password_hash'];

    public function getDateFormat()
    {
        return 'U';
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $except = ['token'];
	

    public function requestDocMerged() {
        $lib = 'App\Models\RequestDoc';
        return $this->hasMany($lib);
    }


}
