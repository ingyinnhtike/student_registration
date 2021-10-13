<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Banning;
use App\Helpers\OtpHelper;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\WrongOtp;
use App\Repositories\Contracts\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    public function request_otp(Request $request, OtpHelper $otpHelper)
    {
        $validator = $request->validate([
            'phone' => "bail|string|required|min:7|max:13"
        ]);

        $ph_number = $request->phone;
        $caller_id = parse_phone_number($ph_number);
        $otp_data = Otp::where('phone', $caller_id)->orderBy('updated_at','desc')->first();
        if ($otp_data == null || $otp_data->status === 1 || $otp_data->expired_at < Carbon::now()->subMinute()) {
            $code = mt_rand(1000, 9999);
            $message = urlencode("OTP Code for Student Registration: " . $code);
            $response = $otpHelper->send_sms($caller_id, $message);
            $response = json_decode($response, true);
            
            $otp_data = Otp::create([
                'otp' => $code,
                'phone' => $caller_id,
                'response' => $response,
                'expired_at' => Carbon::now()->addMinutes(2),
            ]);

            return response()->json($response);
        } else {
            //todo: return something for otp will not generate
        }
    }

    public function check_otp(Request $request, UserRepository $userRepository)
    {
        $validator = $request->validate([
            'otp_code' => "bail|string|required|size:4",
            'phone' => "bail|string|required|min:7|max:13"
        ]);

        $ph_number = $request->phone;
        $phone = parse_phone_number($ph_number);
        $otpData = Otp::where('phone', $phone)->orderBy('updated_at','desc')->first();

        if ($otpData == null) {
            return response()->json(['msg'=>'otp was not generated']);
        }

        if ($otpData->status !== 0) {
            return response()->json(['msg'=>'otp was used.']);
        }


        $otp_code = $request->otp_code;
        if ($otpData->otp == $otp_code) {
            $otpData->status = 1;
            $otpData->save();
            $user = $userRepository->findOrCreate(
                ['phone' => $phone],
                [
                    'name' => 'user' . $phone,
                    'password' => Hash::make('12345')
                ]
            );

            if ($user) {
                $user->assignRole('Student');
                auth()->attempt([
                    'phone' => $phone,
                    'password' => '12345'
                ]);
            }
            return response()->json(true);
        } else {
            $wrongOtp = WrongOtp::create([
                'ip_address' => $request->ip(),
                'wrong_code' => $otp_code,
                'phone' => $phone,
            ]);

            $banning = app()->make(Banning::class);
            $banning->wrong_type = 'otp';
            $banning->shouldBan($phone);
            return response()->json(false);
        }
    }

    public function directLogin(Request $request, UserRepository $userRepository)
    {
        $validator = $request->validate([
            'phone' => "bail|string|required|min:7|max:13"
        ]);
        if (!get_config('site-setting.require_otp', true)) {
            $phone = parse_phone_number($request->phone);
            $user = $userRepository->findOrCreate(
                ['phone' => $phone],
                [
                    'name' => 'user' . $phone,
                    'password' => Hash::make('12345')
                ]
            );
            if ($user) {
                $user->assignRole('Student');
                auth()->attempt([
                    'phone' => $phone,
                    'password' => '12345'
                ]);
            }
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }


}
