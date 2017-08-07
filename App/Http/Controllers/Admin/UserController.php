<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function getUsers()
    {
        $data = \App\Models\User::get();

        return view('admin.contents.users', ['data' => $data]);
    }

    public function deleteUser($user_id)
    {
        $deleteUser = \App\Models\User::where('id', '=', $user_id)->delete();

        return redirect()->route('admin_users');
    }
}