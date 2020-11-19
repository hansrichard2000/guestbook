<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(Request $request)
    {
        $admin = ([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'is_login' => '0',
        ]);

        $creator = ([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
            'is_login' => '0',
        ]);

        $user =([
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 3,
            'is_login' => '0',
        ]);

        if(Auth::attempt($admin)){
            $this->isLogin(Auth::id());
            return redirect()->route('event.index');
        }
        elseif(Auth::attempt($creator)){
            $this->isLogin(Auth::id());
            return redirect()->route('event.index');
        }
        elseif(Auth::attempt($user)){
            $this->isLogin(Auth::id());
            return redirect()->route('event.index');
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'is_login' => '0',
        ]);

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('login');

    }

    private function isLogin(int $id)
    {
        $user = User::FindOrFail($id);
        return $user->update([
            'is_login' => '1',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('event.index');
    }
}
