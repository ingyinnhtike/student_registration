<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ResponseTokenController extends Controller
{
    //
    public function token()
    {
        $user = User::find(1);
        Auth::login($user);
        $token = Crypt::encryptString($user->id);
        return response()->json($token);
    }


    public function login($token)
    {
        
        $user_id = Crypt::decryptString($token);
        Auth::login(User::find($user_id));
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
            
        }
    }
}
