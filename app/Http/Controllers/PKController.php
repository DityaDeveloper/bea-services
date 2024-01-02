<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PK;


class PKController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', [
            'except' => [
                'show',
		'showDummy'
            ],

        ]);
    }

    public function show($limit)
    {
        $user = auth()->user();
	#$input = $request->all();
        #$kodeRegistrasiExits = $input['kode_registrasi'];
	
	$kodeRegistrasiExits = $user['kode_registrasi'];
        #$kodeRegistrasiExits = '0000032/LAW/M/19/lpdp2020';
        #return $this->core->setResponse('success', 'found', $user , 202  );
        $checkAwardeeRequest = PK::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        if(!$checkAwardeeRequest){
            return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        }

        $kodeRegistrasi = array($kodeRegistrasiExits);
       
	 $data = PK::leftJoin('sps.M_AlasanTolak as mAlasanTolak', 'AlasanPenolakan', 'mAlasanTolak.Id')
	->leftJoin('sps.BatchPK as batch', 'sps.PK.BatchPK', 'batch.BatchPK') 
	->whereIn('KodeRegistrasi', $kodeRegistrasi )
	->orderBy('batch.TglSubmit', 'DESC')
         ->paginate($limit);

	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }
	public function showDummy($limit)
    {
        $user = \Auth::user();
	#$input = $request->all();
        #$kodeRegistrasiExits = $input['kodereg'];
	
	#$kodeRegistrasiExits = $user['kode_registrasi'];
        $kodeRegistrasiExits = $user;
        return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        //$checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        //if(!$checkAwardeeRequest){
        //    return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        //}

        $kodeRegistrasi = array('0000028/SOS/M/TM-AF-2023');
       
	 $data = PK::leftJoin('sps.M_AlasanTolak as mAlasanTolak', 'AlasanPenolakan', 'mAlasanTolak.Id')
	->leftJoin('sps.BatchPK as batch', 'sps.PK.BatchPK', 'batch.BatchPK') 
	//->whereIn('KodeRegistrasi', $kodeRegistrasi )
	->orderBy('batch.TglSubmit', 'DESC')
         ->paginate($limit);

	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }

}
