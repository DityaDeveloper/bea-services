<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FundRequest;
use App\Http\Resources\UserFundCollection as Collect;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class FundRequestController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', [
            'except' => [
                'show',
            ],

        ]);
    }

    public function show($limit)
    {
        $user = auth()->user();
        $kodeRegistrasi = array($user['kode_registrasi']);
	//$kodeRegistrasi = array('0007713/TRP/M/19/lpdp2023');
        $data = FundRequest::with(['fundRequestCostItem', 'fundRequestStatus'])->whereIn('KodeRegistrasi', $kodeRegistrasi)->paginate($limit);
       	if(count($data) == 0){
            return $this->core->setResponse('error', 'Request fund Not Found', NULL, false , 202  );
        } else {
            $data->setPath("proposal/$limit/all");
            return $this->core->setResponse('success', 'info request fund',  $data, true);
        }

    }

    public function showDum($limit)
    {	
        //$user = auth()->user();
        //$kodeRegistrasi = array($user['kode_registrasi']);
	$kodeRegistrasi = array('0007713/TRP/M/19/lpdp2023');
        $data = FundRequest::with(['fundRequestCostItem', 'fundRequestStatus'])
	->whereIn('KodeRegistrasi', $kodeRegistrasi)
 	->paginate($limit);
       	if(count($data) == 0){
            return $this->core->setResponse('error', 'Request fund Not Found', NULL, false , 202  );
        } else {
            $data->setPath("proposal/$limit/all");
            return $this->core->setResponse('success', 'info request fund',  $data, true);
        }
     }


}
