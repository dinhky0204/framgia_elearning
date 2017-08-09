<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function getCourses()
    {
        $data = \App\Models\Course::with('subject')->get();

        return view('admin.contents.courses', ['data' => $data]);
    }

    public function editCourse()
    {

    }

    public function deleteCourse($course_id)
    {
        // If all the courses belong to subject has been deleted then subject will be deleted

        $temp = \App\Models\Course::where('id', '=', $course_id)->get();
        $count = \App\Models\Course::where('subject_id', '=', $temp->first()->subject_id)->get()->count();

        //dd($count);

        if($count > 1) {
            $deletedCourse = \App\Models\Course::where('id', '=', $course_id)->delete();
        }
        else {
            $subject_foreign_key = \App\Models\Course::where('id', '=', $course_id)->get()->first()->subject_id;

            $deletedCourse = \App\Models\Course::where('id', '=', $course_id)->delete();
            $deletedSubject = \App\Models\Subject::where('id', '=', $subject_foreign_key)->delete();
        }

        //$deletedRows = \App\Models\Course::where('id', '=', $course_id)->delete();

        return redirect()->route('admin_courses');
    }
}