<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 22/08/2017
 * Time: 13:53
 */

namespace App\Repositories\Subject;


use App\Models\Subject;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;

class SubjectRepository extends EloquentRepository implements SubjectRepositoryInterface
{

    public function getModel()
    {
        return Subject::class;
    }

    public function createSubject(Request $request)
    {
        Subject::create(['name' => $request->name,
            'description' => $request->description,
            'hidden' => 0
        ]);
    }

    public function editSubject(Request $request)
    {
        $subject = Subject::where('id', intval($request->id))->first();
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->save();
    }

    public function deleteSubject($subject_id)
    {
        Subject::where('id', '=', $subject_id)
            ->update(['hidden' => 1]);
    }
}