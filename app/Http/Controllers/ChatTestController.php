<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 30/08/2017
 * Time: 13:36
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ChatTestController extends Controller
{
    public function chatTest() {
        return view('chat');
    }
    public function chat(Request $request) {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
