<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class BeaInfoController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', [
            'except' => [
                'info',
            ],

        ]);
    }

    public function show()
    {
        //$localtime = Carbon::now()->timestamp;
        $user = auth()->user();
        $kodeRegistrasi = $user['kode_registrasi'];
        $data = User::with(['infoBeaMStatus', 'infoBeaMJenjang', 'infoBeaPengayaanBahasa'])->where('kode_registrasi', $user['kode_registrasi'])->first();
        return $this->core->setResponse('success', 'info beasiswa',  $data);
    }
}
