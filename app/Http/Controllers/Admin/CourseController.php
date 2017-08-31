<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Subject;
use App\Repositories\Course\CourseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $courseRepository;
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
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
//        dd($list_question);
        return view('admin.contents.view_course', ['course' => $course, 'list_question' => $list_question]);
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
