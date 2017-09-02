<?php
namespace App\Repositories\Answer;

use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 21/08/2017
 * Time: 14:40
 */
interface AnswerRepositoryInterface
{
    public function createAnswer(Request $request, $question_id);
    public function updateAnswer(Request $request, $question_id, $answer);
}