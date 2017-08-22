<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 21/08/2017
 * Time: 13:02
 */

namespace App\Repositories\Question;


use Illuminate\Http\Request;

interface QuestionRepositoryInterface
{
    public function createQuestion(Request $request);
    public function getAllQuestion();
    public function editQuestion($question_id);
    public function deleteQuestion($question_id);
    public function checkEditQuestion(Request $request, $question_id);
    public function updateQuestion(Request $request, $question_id);
}