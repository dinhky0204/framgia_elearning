<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/08/2017
 * Time: 16:18
 */

namespace App\Http\Controllers\Auth;


use App\Events\MessageSent;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\StudentAnswerQuestionExact;
use App\Models\StudentCourseEnrollment;
use App\Models\Subject;
use App\Repositories\Course\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class CourseController
{
    protected $courseRepository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function testCourse(Request $request, $course_id) {
        $user = Auth::user();
        $list_question = Question::where('course_id', $course_id)->get();
        foreach ($list_question as $question) {
            $list_answer = Answer::where('question_id', $question->id)->get();
            $question->answers = $list_answer;
        }
        JavaScript::put([
            'list_question' => $list_question,
            'course_id' => $course_id,
        ]);
        if($request->ajax()) {
            foreach ($request->correct_questions as $correct_question) {
                $user_question = StudentAnswerQuestionExact::where('user_id', $user['id'])
                    ->where('question_id', $correct_question)->count();
                if($user_question == 0) {
                    StudentAnswerQuestionExact::create(['user_id' => $user['id'], 'question_id' => $correct_question]);
                }
            }
            return response(['msg' => $correct_question]);
        }
        return view('auth.course', ['list_question' => $list_question]);
    }
    public function showCourse($course_id) {
        $correct = 0;
        $user = Auth::user();
        $list_correct_answer = StudentAnswerQuestionExact::where('user_id', $user['id'])->get();
        foreach ($list_correct_answer as $correct_answer) {
            $list_question = Question::where('id', $correct_answer->question_id)->get();
            foreach ($list_question as $question) {
                if($question->course_id == $course_id)
                    $correct++;
            }
        }
        $tmp = StudentCourseEnrollment::where('course_id', $course_id)
            ->where('user_id', $user['id'])->count();
        if($tmp)
            $active = 1;
        else
            $active = 0;
        $course = Course::where('id', $course_id)->first();
        if($course->total_question == 0)
            $progress = 0;
        else
            $progress = $correct*100/$course->total_question;
        return view('auth.showCourse', ['correct' => $correct, 'course' => $course, 'progress' => $progress, 'active' => $active]);
    }
    public function listfollowCourses() {
        $user = Auth::user();
        $list_course = StudentCourseEnrollment::where('user_id', $user['id'])->get();
        foreach ($list_course as $course) {
            $course->course = Course::where('id', $course->course_id)->first();
        }
        return view('auth.listCourseFollow', ['list_course'=> $list_course]);
    }
    public function listCourse($subject_id) {
        $user = Auth::user();
        $subjects = Subject::all();
        $this_subject = Subject::where('id', $subject_id)->first();
        $this_subject->courses = Course::where('subject_id', $subject_id)->get();
        foreach ($this_subject->courses as $course) {
            $tmp = StudentCourseEnrollment::where('course_id', $course['id'])
                ->where('user_id', $user['id'])->count();
            if(!$tmp) {
                $course->follow = 0;
            }
            else
                $course->follow = 1;
        }
        return view('auth.listCourse',['subjects' => $subjects, 'this_subject' => $this_subject, 'subject_id' => $subject_id]);
    }
    public function followCourse(Request $request) {
        $user = Auth::user();
        if($request->ajax()) {
            $course_id = intval($request->course_id);
            $tmp = StudentCourseEnrollment::where('course_id', $course_id)
                ->where('user_id', $user['id'])->count();
            if(!$tmp) {
                StudentCourseEnrollment::create([
                    'progress' => 0,
                    'course_id' => $course_id,
                    'user_id' => $user['id']
                ]);
            }
            return response('Request follow ok');
        }
    }
    public function unfollowCourse(Request $request) {
        $user = Auth::user();
        if($request->ajax()) {
            $course_id = intval($request->course_id);
            $tmp = StudentCourseEnrollment::where('course_id', $course_id)
                ->where('user_id', $user['id'])->delete();
            return response('Request unfollow ok');
        }
    }
    public function learnCourse($course_id) {
        $data = $this->courseRepository->getContentToLearn($course_id);
        return view('auth.learn_course', ['content' => $data]);
    }
}
