<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequestDoc;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

use App\Http\Resources\LosLogCollection as Collect;

class LoslogController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', [
            'except' => [
                'show',
		'showDummy',
		'showlosDummy',
            ],

        ]);
    }

    public function show($limit)
    {
        $user = auth()->user();
	//$input = $request->all();
        //$kodeRegistrasiExits = $input['kodereg'];
	
	$kodeRegistrasiExits = $user['kode_registrasi'];
        //$kodeRegistrasiExits = '0002356/BB/D/2/lpdp2016';
        //return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        $checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        if(!$checkAwardeeRequest){
            return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        }

        //$kodeRegistrasi = array('0002356/BB/D/2/lpdp2016');
	#$kodeRegistrasi = array($kodeRegistrasiExits);
	#$kodeRegistrasi = $kodeRegistrasiExits;

        $data = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)
	->leftJoin('profile_awardee as awardee', 'KodeRegistrasi', 'awardee.kode_registrasi')
	->leftJoin('sps.LOSLOG as loslog', 'sps.Request.Id', 'loslog.IdPengajuan')
        ->leftJoin('sps.RequestType as requestType', 'sps.Request.ReqType', 'requestType.Id')
	#->leftJoin('sps.ApprovalFlow as approve', 'Status', 'approve.Status', '==', 'sps.Request.ReqTypet', 'approve.ReqType' )        
	->leftJoin('sps.ApprovalFlow as approve', function($join){
    		$join->on('approve.Status', '=', 'sps.Request.Status')
         	     ->on('approve.ReqType', '=', 'sps.Request.ReqType');
	})
	->leftJoin('m_program_beasiswa as programBea', 'id_program_beasiswa', 'programBea.id')
	->orderBy('TglPengajuan', 'DESC')
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
        #$kodeRegistrasiExits = '0002356/BB/D/2/lpdp2016';
        #return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        //$checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        //if(!$checkAwardeeRequest){
        //    return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        //}

        $kodeRegistrasi = array('0002356/BB/D/2/lpdp2016');

        $data = RequestDoc::leftJoin('sps.LOSLOG as loslog', 'Id', 'loslog.IdPengajuan')
        ->leftJoin('sps.RequestType as requestType', 'ReqType', 'requestType.Id')
        ->leftJoin('profile_awardee as awardee', 'KodeRegistrasi', 'awardee.kode_registrasi')
        ->leftJoin('dbo.m_program_beasiswa as programBea', 'id_program_beasiswa', 'programBea.id')
        ->leftJoin('sps.ApprovalFlow as approve', 'sps.Request.Status', 'approve.Status')
	 ->whereIn('KodeRegistrasi', ['0002356/BB/D/2/lpdp2016'])
	 ->orderBy('TglPengajuan', 'DESC')
         ->paginate($limit);
	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }

	public function showlosDummy($limit)
    {
        #$user = auth()->user();
	#$input = $request->all();
        #$kodeRegistrasiExits = $input['kodereg'];
	
	#$kodeRegistrasiExits = $user['kode_registrasi'];
        #$kodeRegistrasiExits = '0002356/BB/D/2/lpdp2016';
        #return $this->core->setResponse('success', 'found', $kodeRegistrasiExits , 202  );
        //$checkAwardeeRequest = RequestDoc::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        //if(!$checkAwardeeRequest){
        //    return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        //}

        $kodeRegistrasi = array('0002356/BB/D/2/lpdp2016');

        $data = RequestDoc::leftJoin('sps.LOSLOG as loslog', 'Id', 'loslog.IdPengajuan')
        ->leftJoin('sps.RequestType as requestType', 'ReqType', 'requestType.Id')
        ->leftJoin('profile_awardee as awardee', 'KodeRegistrasi', 'awardee.kode_registrasi')
        ->leftJoin('dbo.m_program_beasiswa as programBea', 'id_program_beasiswa', 'programBea.id')
        ->leftJoin('sps.ApprovalFlow as approve', 'sps.Request.Status', 'approve.Status')
	->where('code', 'LOS')
	->whereIn('KodeRegistrasi', ['0002356/BB/D/2/lpdp2016'])
	->orderBy('TglPengajuan', 'DESC')
        ->paginate($limit);
	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }


}
