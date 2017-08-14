<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getSubjects()
    {
        $data = Subject::where('hidden', 0)->get();
        return view('admin.contents.subjects', ['data' => $data]);
    }

    public function editSubject(Request $request)
    {
        if ($request->ajax()) {
            $subject = Subject::where('id', intval($request->id))->first();
            $subject->name = $request->name;
            $subject->description = $request->description;
            $subject->save();
            return response(['msg' => 'Response ok']);
        } else {
            return view('admin.contents.overview');
        }
    }

    public function deleteSubject($subject_id)
    {
        $deletedSubject = Subject::where('id', '=', $subject_id)
            ->update(['hidden' => 1]);
        return redirect()->route('admin_subjects');
    }

    public function createSubject(Request $request)
    {
        if ($request->ajax()) {
            Subject::create(['name' => $request->name, 'description' => $request->description, 'hidden' => 0]);
            return response(['msg' => 'Response ok']);
        } else {
            return view('admin.contents.overview');
        }
    }
}
