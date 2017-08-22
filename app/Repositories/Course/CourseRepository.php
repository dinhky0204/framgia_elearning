<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 22/08/2017
 * Time: 13:24
 */

namespace App\Repositories\Course;


use App\Models\Course;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;

class CourseRepository extends EloquentRepository implements CourseRepositoryInterface
{

    public function createCourse(Request $request)
    {
        Course::create([
            'name' => $request->name,
            'total_question' => 0,
            'subject_id' => $request->subject_id,
            'hidden' => false,
            'admin_id' => 1,
            'desc' => $request->description,
        ]);
    }

    public function updateCourse(Request $request)
    {
        Course::where('id', $request->id)
            ->where('subject_id', $request->old_subject_id)
            ->update(['name' => $request->name,
                'desc' => $request->description,
                'subject_id' => $request->new_subject_id
            ]);
    }

    public function getModel()
    {
        return Course::class;
    }
}