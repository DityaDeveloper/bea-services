<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    //
    protected $table = 'sps.FundRequest';

    protected $fillable = ['id', 'KodeRegistrasi', 'costitem', 'Currency', 'RequestAmount', 'RequestAmountIDR', 'BankAccount', 'JenisPendanaanBank', 'PaymentDesc', 'Remarks', 'Lampiran', 'TglPengajuan', 'IsCard', 'TglUpdate', 'ApprovedAmount', 'ApprovedAmountIDR', 'Catatan', 'UraianPembayaran', 'RemarksVerify', 'AwalPeriode', 'AkhirPeriode', 'status', 'UserVerify', 'DateVerify', 'NoSPP', 'NominativeId', 'DKUVerify', 'TglDKUVerify', 'StatusDKUVerify', 'CatatanDKU', 'TL', 'TglTL', 'CatatanSPB', 'KasubdivVerify', 'TglKasubdivVerify', 'StatusKasubdivVerify', 'CatatanKasubdiv', 'CatatanSPBKasubdiv', 'TanggalLaporDiriKJRI', 'NomorKKKel1', 'NomorKKKel2', 'NIKKel1', 'NIKKel2', 'NamaKel1', 'NamaKel2', 'TglLahirKel1', 'TglLahirKel2', 'TglKedatangan', 'BulanPengajuan', 'TglKeberangkatan', 'BandaraAsal', 'BandaraTujuan', 'PathTiket', 'KirimTagihan', 'NomorVisa', 'NomorPaspor', 'DurasiTinggalStart', 'DurasiTinggalEnd', 'CreatedByRole', 'Kurs', 'IsNP', 'NamaBank', 'AlamatBank', 'AtasNama', 'NomorRekening', 'SwiftCode', 'IBAN', 'BillingIdSPP', 'JudulTesisDisertasi', 'LabNonLab', 'NamaDosenPembimbing', 'EmailDosenPembimbing', 'TanggalLulusSemPro', 'TempatPengambilanData', 'fullcoursework', 'SkemaPencairanDana', 'SPTJM', 'Beritaacarasidangseminar', 'LembarPengesahanProposalTesisDisertasi', 'PenetapanPenelitian', 'SuratKeteranganBukanFullCoursework', 'ProposalTesisDisertasi', 'PernyataanDospemRABDisetujui', 'SuratKeteranganTidakDiDanaiUniv', 'PernyataanTanggungJawabBelanja', 'RABaccDospem', 'DPCatatanSPBA', 'DPCatatanSPBB', 'DPCatatanSPBC', 'DPCatatanKasubdivA', 'DPCatatanKasubdivB', 'KompHabisPakai', 'KompPengadaan', 'KompHonor', 'KompLainLain', 'WaktuPengambilanData', 'SPKVerify', 'TglSPKVerify', 'TipePendanaan', 'id_fundrequest', 'PerkuliahanBukanFullcoursework', 'BukuTabungan', 'TglDiProsesBank', 'UpdatedBy', 'DPCatatanTolakAwardee', 'MataUangBank', 'statusPayment'];

    public function fundRequestCostItem() {
        $lib = 'App\Models\CostItem';
        return $this->belongsTo($lib, 'costitem', 'Id');
    }
    public function fundRequestStatus() {
        $lib = 'App\Models\Status';
        return $this->belongsTo($lib, 'status', 'Id');
    }


}
