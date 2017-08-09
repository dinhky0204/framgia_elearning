<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function getSubjects(){
        $data = \App\Models\Subject::get();

        return view('admin.contents.subjects', ['data' => $data]);
    }

    public function deleteSubject($subject_id){
        // If subject is deleted, all the course will be deleted too

        $deletedCourse = \App\Models\Course::where('subject_id', '=', $subject_id)->delete();
        $deletedSubject = \App\Models\Subject::where('id', '=', $subject_id)->delete();

        return redirect()->route('admin_subjects');
    }
}