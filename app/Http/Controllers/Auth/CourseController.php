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
use App\Models\StudentAnswerQuestionExact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class CourseController
{
    public function showCourse(Request $request, $course_id) {
        $user = Auth::user();
        $list_question = Question::where('course_id', $course_id)->get();
        foreach ($list_question as $question) {
            $list_answer = Answer::where('question_id', $question->id)->get();
            $question->answers = $list_answer;
        }
        JavaScript::put([
            'list_question' => $list_question,
            'course_id' => $course_id,
        ]);
        if($request->ajax()) {
            foreach ($request->correct_questions as $correct_question) {
                $user_question = StudentAnswerQuestionExact::where('user_id', $user['id'])
                    ->where('question_id', $correct_question)->count();
                if($user_question == 0) {
                    StudentAnswerQuestionExact::create(['user_id' => $user['id'], 'question_id' => $correct_question]);
                }
            }

            return response(['msg' => $correct_question]);
        }
        return view('auth.course', ['list_question' => $list_question]);
    }
    public function showResult(Request $request) {

    }
}
