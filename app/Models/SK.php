<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    //

    protected $table = 'sps.SK';

    protected $fillable = ['Id', 'Tipe', 'Nama', 'NoInduk', 'Universitas', 'Prodi', 'Negara', 'MulaiStudi', 'AkhirStudi', 'NamaBaru', 'AlasanGantiNama', 'LampiranGantiNama', 'MulaiStudiBaru', 'AlasanGantiMulaiStudi', 'LampiranGantiMulaiStudi', 'AkhirStudiBaru', 'AlasanGantiAkhirStudi', 'LampiranGantiAkhirStudi', 'TglSubmit', 'Status', 'RekomendedPIC', 'PICVerif', 'TglVerifPIC', 'CatatanPIC', 'PesanCPB', 'KasubdivVerif', 'TglVerifKasubdiv', 'CatatanKasubdiv', 'KadivVerif', 'TglVerifKadiv', 'CatatanKadiv', 'DirekturVerif', 'TglVerifDirektur', 'CatatanDirektur', 'DocSK', 'NoSK', 'IsSigning', 'LogSigning', 'IPSigning', 'BrowserSigning', 'JenisPengajuan', 'UniversitasBaru', 'AlasanGantiUniversitas', 'ProdiBaru', 'AlasanGantiProdi', 'CatatanKontrak', 'IsSipendob', 'SignedDate', 'SignedID', 'CountNoSK', 'TglPenerbitanSP', 'JenisRevisiID', 'KomponenProgramJenjangID', 'LastSP', 'IdUniversitas', 'AlamatUniversitas', 'IsDeleted'];
}
