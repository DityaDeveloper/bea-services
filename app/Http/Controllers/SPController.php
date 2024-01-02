<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequestDoc;

use App\Http\Resources\LosLogCollection as Collect;

class SPController extends Controller
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
        #$kodeRegistrasiExits = $input['kodereg'];
	
	$kodeRegistrasiExits = $user['kode_registrasi'];
        #$kodeRegistrasiExits = '0000032/LAW/M/19/lpdp2020';
        return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        $checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        if(!$checkAwardeeRequest){
           return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        }

        #$kodeRegistrasi = array('0000037/LAW/M/19/lpdp2020');

        $data = RequestDoc::leftJoin('sps.RequestType as requestType', 'ReqType', 'requestType.Id')
	->leftJoin('profile_awardee as awardee', 'KodeRegistrasi', 'awardee.kode_registrasi') 
	->leftJoin('sps.ApprovalFlow as approval', 'sps.Request.Status', 'approval.Status')
	->leftJoin('sps.SP as sp', 'sps.Request.Id', 'sp.IdPengajuan')
	->whereIn('KodeRegistrasi', $kodeRegistrasi )
	->where('sps.Request.ReqType', '2')
         ->paginate($limit);
	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }
	public function showDummy($limit)
    {
        #$user = auth()->user();
	#$input = $request->all();
        #$kodeRegistrasiExits = $input['kodereg'];
	
	#$kodeRegistrasiExits = $user['kode_registrasi'];
        #$kodeRegistrasiExits = '0000032/LAW/M/19/lpdp2020';
        #return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        //$checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        //if(!$checkAwardeeRequest){
        //    return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        //}

        $kodeRegistrasi = array('0000037/LAW/M/19/lpdp2020');

        $data = RequestDoc::leftJoin('sps.RequestType as requestType', 'ReqType', 'requestType.Id')
	->leftJoin('profile_awardee as awardee', 'KodeRegistrasi', 'awardee.kode_registrasi') 
	->leftJoin('sps.ApprovalFlow as approval', 'sps.Request.Status', 'approval.Status')
	->leftJoin('sps.SP as sp', 'sps.Request.Id', 'sp.IdPengajuan')
	#->whereIn('KodeRegistrasi', $kodeRegistrasi )
	->where('sps.Request.ReqType', '2')
         ->paginate($limit);
	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }

}
