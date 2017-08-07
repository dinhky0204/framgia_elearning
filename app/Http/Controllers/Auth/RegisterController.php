<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'active' => false,
            'point' => 0,
            'avatar' => 'default',
        ]);
    }

    protected function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('register_error', $validator->messages());
        } else {
            User::where('email', $request->input('email'))->where('active', 0)->delete();
            $data = $this->create($request->all())->toArray();
            $minutes = 1;
            $random_token = str_random(30);
            $data['token'] = $random_token;
            Cache::add($random_token, $data['email'], $minutes);
            Mail::send('mails.confirmation', $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            return redirect(route('login'));
        }
    }

    public function confirmation($token)
    {
        $value = Cache::get($token);
        if (!is_null($value)) {
            $user = User::where('email', $value)->first();
            $user->active = 1;
            $user->save();
            return redirect(route('home'));
        }
        return redirect(route('login'));
    }
}
