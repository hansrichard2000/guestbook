<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    private $client;

    public function __construct(){
        $this->client = Client::find(2);
    }

    public function login(Request $request){
        $http = new \GuzzleHttp\Client();

        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => '3',
            'is_verified' => '1',
            'is_login' => '0',
            'is_active' => '1',
        ];

        $check = DB::table('users')->where('email', $request->email)->first();

        if ($check->is_verified == '1'){
            if ($check->is_active == '1'){
                if ($check->is_login == '0'){
                    if (Auth::attempt($user)){
                        $this->isLogin(Auth::id());
                        $response = $http->post('http://127.0.0.1:8000/oauth/token', [
                           'form_params' => [
                               'grant_type' => 'password',
                               'client_id' => $this->client->id,
                               'client_secret' => $this->client->secret,
                               'username' => $request->email,
                               'password' => $request->password,
                               'scope' => '*',
                           ]
                        ]);
                        return json_decode((string) $response->getBody(), true);
                    }
                }
            }
        }
    }
    private function isLogin(int $id){
        $user = User::findOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }
}
