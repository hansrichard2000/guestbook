<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user =$this->newUser($request->all());

        if (empty($user)){
            return response([
                'message' => 'Failed to create account'
            ]);
        }else{
            //send
            return response([
                'message' => 'Account created, please verifiy your email'
            ]);
        }
    }

    public function newUser(array $data){
        return User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
            'role_id' => 3,
            'activation_token' => \illuminate\Support\Str::random(20)
        ]);
    }
}
