<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SK;


class SKController extends Controller
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
	$noinduk = $user['no_induk_lpdp'];
        $checkAwardeeRequest = SK::where('NoInduk', $noinduk )->first();
        if(!$checkAwardeeRequest){
            return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        }

        $email = array($user['email']);
       
	$data = SK::leftJoin('dbo.profile_awardee as awardee', 'NoInduk', 'awardee.no_induk_lpdp')
	->whereIn('email', $email )
        ->paginate($limit);

	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }
	public function showDummy($limit)
    {
        #$user = auth()->user();
	#$kodeRegistrasiExits = $user['kode_registrasi'];
        #$checkAwardeeRequest = SK::where('KodeRegistrasi', $kodeRegistrasiExits)->first();
        #if(!$checkAwardeeRequest){
        #    return $this->core->setResponse('error', 'Request Not Found', NULL, false , 202  );
        #}

        $email = array('colley.windya@gmail.com');
       
	 $data = SK::leftJoin('dbo.profile_awardee as awardee', 'NoInduk', 'awardee.no_induk_lpdp')
	->whereIn('email', $email )
        ->paginate($limit);

	$data = json_encode($data, JSON_INVALID_UTF8_IGNORE);
	return $data;
    }

}
