<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserLogin;

use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth:api', [
            'except' => [
                'login',
            ],

        ]);
    }

    public function dbcon() {
	//return "controller";

	$serverName = "103.171.85.156\\sqlexpress, 1433"; //serverName\instanceName, portNumber (default is 1433)
	$connectionInfo = array( "Database"=>"db_lpdp_pandawa_20230824", "UID"=>"sa", "PWD"=>"P@ssw0rd12345");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn ) {
     		echo "Connection established.<br />";
	}else{
     		echo "Connection could not be established.<br />";
     		die( print_r( sqlsrv_errors(), true));
	}
    }

    public function login(Request $request)
    {
        $validator = $this->validation('login', $request);

        if ($validator->fails()) {
            return $this->core->setResponse('error', $validator->messages()->first(), NULL, false , 400  );
        }

        $input = $request->all();
        $email = $input['email'];
        $pass = $input['password'];

        $authenticate = UserLogin::where('username', $email)->first();

        if( !$authenticate)
        {
            return $this->core->setResponse('error', 'user not found', NULL, false , 203  );
        }

        $authPw = $authenticate['password'];

        if($authPw != $pass){
            return $this->core->setResponse('error', "email & password incorrect", NULL, false , 203  );
        }

        $user = UserLogin::with(['userRole', 'userProfile'])->where('username', $email)->first();

        if( !$user){
            return $this->core->setResponse('error', 'user not found', NULL, false , 203  );
        }

        $token = \Auth::login($user['userProfile']);
        return $this->respondWithToken($token, 'login');

    }

    public function profile()
    {
        $localtime = Carbon::now()->timestamp;
        $user = auth()->user();
        $data = User::with(['infoProfileOtherData', 'infoProfileMKota', 'infoProfileMNegara'])->where('id', $user['id'])->first();

        return $this->core->setResponse('success', 'User Profile',  $data);
    }

    private function validation($type = null, $request) {

        switch ($type) {

            case 'registration':
                $validator = [
                    'email' => 'required|email|unique:t_person',
                    'password_hash' => 'required|min:6|max:100',
                    'nik' => 'required|min:16|max:18',
                ];
                break;

            case 'login':
                $validator = [
                    'email' => 'required|string',
                    'password' => 'required|string',
                ];
                break;

            case 'updatepassword':
                $validator = [
                    'password' => 'required|string',
                ];
                break;

            default:

                $validator = [];
        }

        return Validator::make($request->all(), $validator);
    }

    protected function respondWithToken($token, $action = null)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * config('auth.jwt.expires_in', 2880),
        ];

        return $this->core->setResponse('success', "Successfully $action", $data );
    }

}
