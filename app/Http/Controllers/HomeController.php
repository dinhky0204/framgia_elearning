<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Course;
use App\Models\StudentAnswerQuestionExact;
use App\Models\StudentCourseEnrollment;
use App\Repositories\Notification\NotificationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $notificationRepository;
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_question = 0;
        $total_exact = 0;
        $user = Auth::user();
        $list_course = StudentCourseEnrollment::where('user_id', $user->id)->get();
        foreach ($list_course as $course) {
            $course_question = Course::where('id', $course->course_id)->first();
            $total_question = $total_question + $course_question->total_question;
        }
        $total_exact = StudentAnswerQuestionExact::where('user_id', $user->id)->count();
        if($total_question == 0)
            $progress = 0;
        else
            $progress = $total_exact/$total_question*100;
        return view('home', ['progress' => $progress]);
    }
    public function notification(Request $request) {
        if ($request->ajax()) {
            $list_noti = $this->notificationRepository->getListNoti($request->get('user_id'));
            NotificationRepository::clearNotificationOfUser($request->get('user_id'));
            return response($list_noti);
        }
    }
}
