<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestDoc extends Model
{
    //
    protected $table = 'sps.Request';

    protected $fillable = ['Id', 'KodeRegistrasi', 'ReqType', 'Status', 'UserId', 'TglPengajuan', 'IsSipendob'];

    public function requestLoslog() {
        $lib = 'App\Models\Loslog';
        return $this->belongsTo($lib, 'IdPengajuan', 'Id');
    }
	
    public function requestRequestType() {
        $lib = 'App\Models\RequestType';
        return $this->belongsTo($lib, 'Id', 'ReqType');
    }

   public function requestAwardee() {
        $lib = 'App\Models\User';
        return $this->belongsTo($lib, 'kode_registrasi', 'KodeRegistrasi');
    }

	public function requestMBeasiswa() {
        $lib = 'App\Models\RequestType';
        return $this->belongsTo($lib, 'kode_registrasi', 'KodeRegistrasi');
    }




	
}
