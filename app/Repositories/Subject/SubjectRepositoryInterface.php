<?php
namespace App\Repositories\Subject;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 22/08/2017
 * Time: 13:51
 */
interface SubjectRepositoryInterface
{
    public function createSubject(Request $request);
    public function editSubject(Request $request);
    public function deleteSubject($subject_id);
}