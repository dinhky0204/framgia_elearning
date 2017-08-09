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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
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
        $user = Auth::user();
        return view('auth.editProfile', ['user' => $user]);
    }
    public function saveProfile(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->get('old-password'), $user['password'])) {
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('avatar/' . $filename));
                $user->avatar = $filename;
                $user->save();
            }
            if($request->has('new-password')) {
                if($request->get('new-password') == $request->get('confirm-new-password')) {
                    $user->password = Hash::make($request->get('new-password'));
                    $user->save();
                    return view('home');
                }
                else {
                    return redirect()->back()->withInput();
                }
            }
            if(!$request->hasFile('avatar') && !$request->has('new-password') && $user['name'] == $request->get('full-name')) {
                return redirect()->back()->withInput();
            }
            $user->name = $request->get('full-name');
            $user->save();
            return view('home');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
