<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Question\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $courseRepository;
    protected  $questionRepository;
    public function __construct(CourseRepository $courseRepository, QuestionRepository $questionRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->questionRepository = $questionRepository;
    }

    public function getCourses()
    {
        $data = Course::where('hidden', 0)->get();
        $subjects = Subject::where('hidden', 0)->get();

        return view('admin.contents.courses', ['data' => $data, 'subjects' => $subjects]);
    }
    public function viewCourse($course_id) {
        $course = $this->courseRepository->find($course_id);
        $list_question = $this->courseRepository->getQuestion($course_id);
        return view('admin.contents.view_course', [
            'course' => $course,
            'list_question' => $list_question,
            'list_type' => QuestionType::all(),
            'list_course' => Course::all()
        ]);
    }

    public function editCourse(Request $request)
    {
        if($request->ajax()) {
            $this->courseRepository->updateCourse($request);
            return response(['msg' => $request->new_subject_id]);
        }
        else {
            return view('admin.contents.overview');
        }
    }

    public function deleteCourse($course_id)
    {
        Course::where('id', $course_id)
            ->update(['hidden' => 1]);
        return redirect()->route('admin_courses');
    }

    public function createCourse(Request $request)
    {
        if($request->ajax()) {
            $this->courseRepository->createCourse($request);
            return response(['msg' => "Response ok"]);
        }
        else {
            return view('admin.contents.overview');
        }
    }
}
