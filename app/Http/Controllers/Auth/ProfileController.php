<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 19/07/2017
 * Time: 15:55
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\FollowStudent;
use App\Models\StudentCourseEnrollment;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $following = FollowStudent::where('following', $user['id'])->count();
        $follower = FollowStudent::where('follower', $user['id'])->count();
        $course = StudentCourseEnrollment::where('user_id', $user['id'])->count();
        return view('auth.profile',
            [
                'user' => $user,
                'following' => $following,
                'follower' => $follower,
                'course' => $course
            ]);
    }

    public function editProfile()
    {
        return view('auth.editProfile');
    }
}
