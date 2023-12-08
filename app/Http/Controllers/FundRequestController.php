<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FundRequest;

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
        $kodeRegistrasi = $user['kode_registrasi'];
        $data = FundRequest::with(['fundRequestCostItem', 'fundRequestStatus'])->whereIn('KodeRegistrasi', [$kodeRegistrasi])->paginate($limit);
        if(count($data) == 0){
            return $this->core->setResponse('error', 'Request fund Not Found', NULL, false , 202  );
        } else {
            $data->setPath("proposal/$limit/all");
            return $this->core->setResponse('success', 'info request fund',  $data, true);
        }

    }

    public function showDum($limit)
    {
        $user = auth()->user();
        $kodeRegistrasi = '0005784/ENG/M/19/lpdp2021';
        $data = FundRequest::with(['fundRequestCostItem', 'fundRequestStatus'])->whereIn('KodeRegistrasi', [$kodeRegistrasi])->paginate($limit);
        if(count($data) == 0){
            return $this->core->setResponse('error', 'Request fund Not Found', NULL, false , 202  );
        } else {
            $data->setPath("proposal/$limit/all");
            return $this->core->setResponse('success', 'info request fund',  $data, true);
        }

    }
}
