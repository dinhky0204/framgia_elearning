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

    public function deleteCourse($course_id)
    {
        // If all the courses belong to subject has been deleted then subject will be deleted
        $deletedRows = \App\Models\Course::where('id', '=', $course_id)->delete();

        return redirect()->route('admin_courses');
    }
}