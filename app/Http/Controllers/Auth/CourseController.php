<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/08/2017
 * Time: 16:18
 */

namespace App\Http\Controllers\Auth;


use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class CourseController
{
    public function showCourse($course_id) {
        $list_question = Question::where('course_id', $course_id)->get();
        foreach ($list_question as $question) {
            $list_answer = Answer::where('question_id', $question->id)->get();
            $question->answers = $list_answer;
        }
//        dd($list_question[0]->answers);
        return view('auth.course', ['list_question' => $list_question]);
    }
    public function testExample(Request $request) {
        return view('auth.home');
    }
}