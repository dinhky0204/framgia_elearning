<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function resetPasswordConfirm($token)
    {
        $value = ResetPassword::where('token', $token)->first();
        if ($value != null) {
            return redirect(route('resetpassword'));
        } else {
            return redirect(route('login'))->with('reset_pass_error', 'Reset password fails');
        }
    }
    public function index() {
        return  view('auth.passwords.email');
    }

    public function sendmailToReset(Request $request)
    {
        $input['email'] = $request['email'];
        $input['token'] = str_random(30);
        $input['created_at'] = Carbon::now();
        DB::table('password_resets')->insert([
            'email' => $input['email'], 'token' => $input['token'], 'created_at' => $input['created_at']
        ]);
        Mail::send('mails.resetPassword', $input, function ($message) use ($input) {
            $message->to($input['email'])
                ->subject('Reset password confirmation');
        });
        return redirect()->back();
    }
    public function resetPass(Request $request) {
        $user = User::where('email', $request->get('email'))->first();
        if($user) {
            $user['password'] = Hash::make($request->get('password'));
            $user->save();
            return view('welcome');
        }
        else
            redirect()->back()->with('status', 'Reset password fails');
    }
}
