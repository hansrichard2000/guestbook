<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->update([
            'activation_token' => null,
            'email_verified_at' => Carbon::now(),
        ]);
        return redirect()->route('login');
    }
}
