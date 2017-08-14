<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 12/08/2017
 * Time: 15:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function index() {
        return view('admin.login');
    }
    public function login(Request $request) {
        $input = $request->all();
        $email = $input['username'];
        $password = $input['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1, 'is_admin' => 1])) {
            return redirect('admin/homepage');
        }
        else
            return redirect()->back()->with('login_status', 'Email or Password missing.');
    }
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/admin/login');
    }
}
