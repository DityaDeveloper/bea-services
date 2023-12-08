<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    //
    protected $table = 'sps.BankAccount';

    protected $fillable = ['KodeRegistrasi', 'Tipe', 'NamaBank', 'AlamatBank', 'AtasNama', 'NoRekening', 'MataUang', 'Swift_BIC', 'IBAN_BSB_ABA', 'BukuTabungan', 'TglUpdate', 'id_bank_account', 'IdBank', 'isIbanBsbAba_LN', 'isIbanBsbAba_Univ', 'isIbanBsbAba_Other', 'isValid', 'CatatanSPB', 'UpdatedBy'];

}
