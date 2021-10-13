<?php

namespace App\Http\Controllers\admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    public function showResetForm()
    {
        $user = Auth::user();
        $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);

        return view('admin.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $user->email]
        );
    }

    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())->with('success','Reset password process successfully completed!');
    }


}
