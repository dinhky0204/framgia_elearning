<?php
namespace App\Repositories\Course;

use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 22/08/2017
 * Time: 13:24
 */
interface CourseRepositoryInterface
{
    public function createCourse(Request $request);
    public function updateCourse(Request $request);
    public function getContentToLearn($course_id);
}