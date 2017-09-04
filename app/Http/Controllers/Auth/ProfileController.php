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
use App\Models\Question;
use App\Models\StudentAnswerQuestionExact;
use App\Models\StudentCourseEnrollment;
use App\Models\User;
use App\Repositories\Notification\NotificationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use App\Events\MessageSent;
class ProfileController extends Controller
{
    protected $notificationUser;
    public function __construct(NotificationRepository $notificationUser)
    {
        $this->notificationUser = $notificationUser;
    }
    public function showProfile()
    {
        $point = 0;
        $user = Auth::user();
        $following = FollowStudent::where('following', $user['id'])->count();
        $follower = FollowStudent::where('follower', $user['id'])->count();
        $course = StudentCourseEnrollment::where('user_id', $user['id'])->count();
        $list_question = StudentAnswerQuestionExact::where('user_id', $user['id'])->get();
        foreach ($list_question as $question) {
            $tmp = Question::where('id', $question->question_id)->first();
            if($tmp) {
                $point = $point + $tmp->point;
            }
        }
        $list_following = FollowStudent::where('following', $user['id'])->get();
        foreach ($list_following as $value) {
            $value->follow = User::where('id', $value['follower'])->first();
        }
        $list_follower = FollowStudent::where('follower', $user['id'])->get();
        foreach ($list_follower as $value) {
            $value->follow = User::where('id', $value['following'])->first();
        }
        $other_user = [];
        foreach (User::all() as $key => $value) {
            if(!FollowStudent::where('following', $user['id'])->where('follower', $value['id'])->count() && $value['id'] != $user['id']) {
                array_push($other_user, $value);
            }
        }
        $new_user = User::all()->count() - $following - $follower - 1;
        return view('auth.profile',
            [
                'user' => $user,
                'following' => $following,
                'follower' => $follower,
                'course' => $course,
                'point' => $point,
                'new_user' => $new_user,
                'list_following' => $list_following,
                'list_follower' => $list_follower,
                'other_user' => $other_user
            ]);
    }
    public function showUser($user_id) {
        $point = 0;
        $current_user = Auth::user();
        $user = User::where('id', $user_id)->first();
        $flag = FollowStudent::where('following', $current_user['id'])
            ->where('follower', $user['id'])->count();
        if($flag) {
            $status = 1;
        }
        else {
            $status = 0;
        }
        $following = FollowStudent::where('following', $user_id)->count();
        $follower = FollowStudent::where('follower', $user_id)->count();
        $course = StudentCourseEnrollment::where('user_id', $user_id)->count();
        $list_question = StudentAnswerQuestionExact::where('user_id', $user_id)->get();
        foreach ($list_question as $question) {
            $tmp = Question::where('id', $question->question_id)->first();
            if($tmp) {
                $point = $point + $tmp->point;
            }
        }
        $list_following = FollowStudent::where('following', $user_id)->get();
        foreach ($list_following as $value) {
            $value->follow = User::where('id', $value['follower'])->first();
        }
        $list_follower = FollowStudent::where('follower', $user_id)->get();
        foreach ($list_follower as $value) {
            $value->follow = User::where('id', $value['following'])->first();
        }
        $new_user = User::all()->count() - $following - $follower - 1;
        return view('auth.show_user',
            [
                'user' => $user,
                'following' => $following,
                'follower' => $follower,
                'course' => $course,
                'point' => $point,
                'new_user' => $new_user,
                'list_following' => $list_following,
                'list_follower' => $list_follower,
                'status' => $status,
            ]);
    }
    public function followUser(Request $request, $user_id) {
        $user = Auth::user();
        $this->notificationUser->createNotification($user_id, $user['id'], 'Follow');
        event(new MessageSent('Test message sent', $user_id));
        FollowStudent::create([
            'following' => $user['id'],
            'follower' => $user_id
        ]);
        return redirect()->back();
    }
    public function unfollowUser($user_id) {
        $user = Auth::user();
        FollowStudent::where('following', $user['id'])
            ->where('follower', $user_id)->delete();
        return redirect()->back();
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.editProfile', [
            'user' => $user,
        ]);
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
                    return view('welcome');
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
            return view('welcome');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
