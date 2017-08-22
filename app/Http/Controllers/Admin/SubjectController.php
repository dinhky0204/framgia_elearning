<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Repositories\Subject\SubjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    protected $subjectRepository;
    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->middleware('admin');
        $this->subjectRepository = $subjectRepository;
    }

    public function getSubjects()
    {
        $data = Subject::where('hidden', 0)->get();
        return view('admin.contents.subjects', ['data' => $data]);
    }

    public function editSubject(Request $request)
    {
        if ($request->ajax()) {
            $this->subjectRepository->editSubject($request);
            return response(['msg' => 'Response ok']);
        } else {
            return view('admin.contents.overview');
        }
    }

    public function deleteSubject($subject_id)
    {
        $this->subjectRepository->deleteSubject($subject_id);
        return redirect()->route('admin_subjects');
    }

    public function createSubject(Request $request)
    {
        if ($request->ajax()) {
            $this->subjectRepository->createSubject($request);
            return response(['msg' => 'Response ok']);
        } else {
            return view('admin.contents.overview');
        }
    }
}
