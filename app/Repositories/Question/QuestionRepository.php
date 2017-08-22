<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 21/08/2017
 * Time: 14:06
 */

namespace App\Repositories\Question;


use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\StudentAnswerQuestionExact;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;
use Image;

class QuestionRepository extends EloquentRepository implements QuestionRepositoryInterface
{
    public function getAllQuestion()
    {
        $list_question = Question::all();
        foreach ($list_question as $question) {
            $question->course = Course::where('id', $question->course_id)->first();
            $question->type = QuestionType::where('id', $question->question_type_id)->first();
        }
        $list_type = QuestionType::all();
        $list_course = Course::all();
        return array($list_question, $list_type, $list_course);
    }

    public function editQuestion($question_id)
    {
        $question = Question::where('id', $question_id)->first();
        $question->list_answer = Answer::where('question_id', $question_id)->get();
        $question->type = QuestionType::where('id', $question->question_type_id)->first();
        $question->course = Course::where('id', $question->course_id)->first();
        $list_course = Course::all();
        $list_type = QuestionType::all();
        return [$question, $list_course, $list_type];
    }
    public function getModel()
    {
        return \App\Models\Question::class;
    }

    public function checkEditQuestion(Request $request, $question_id)
    {
        Question::where('id', $question_id)
            ->update([
                'question_content' => $request->get('question-content'),
                'point' => $request->get('question-point'),
                'question_type_id' => $request->get('question-type'),
                'course_id' => $request->get('new-course-of-question')
            ]);
        $list_answer = json_decode($request->get('total-answer'));
        foreach ($list_answer as $answer) {
            if(!$request->get('answer-content-' . $answer->id)) {
                Answer::where('id', $answer->id)->delete();
                $question = Question::where('id', $answer->question_id)->first();
                $question->total_answer = $question->total_answer -1;
                $question->save();
            }
            if($request->hasFile('answer-desc-' . $answer->id)) {
                $answer_img = $request->file('answer-desc-' . $answer->id);
                $filename = 'answer' . $answer->id . '.' . $answer_img->getClientOriginalExtension();
                Image::make($answer_img)->resize(150, 150)->save(public_path('img/answer_image/' . $filename));
                Answer::where('id', $answer->id)
                    ->update(['desc' => $filename]);
            }
            if(intval($request->get('answer-correct-' . $answer->id)) != $answer->correct) {
                if($answer->correct == 0)
                {
                    Answer::where('id', $answer->id)
                        ->update(['correct'=> true]);
                }
                else {
                    Answer::where('id', $answer->id)
                        ->update(['correct'=> false]);
                }
            }
            if($request->get('answer-tag-' . $answer->id) != $answer->tag) {
                Answer::where('id', $answer->id)
                    ->update(['tag'=> $request->get('answer-tag-' . $answer->id)]);
            }
        }
    }

    public function createQuestion(Request $request)
    {
        return Question::create([
            'question_content' => $request->get('question-content'),
            'total_answer' => 0,
            'point' => intval($request->get('question-point')),
            'description' => 'default',
            'course_id' => intval($request->get('question-course')),
            'question_type_id' => intval($request->get('question-type'))
        ]);
    }
    public function deleteQuestion($question_id)
    {
        StudentAnswerQuestionExact::where('question_id', $question_id)->delete();
        Answer::where('question_id', $question_id)->delete();
        Question::where('id', $question_id)->delete();
    }

    public function updateQuestion(Request $request, $question_id)
    {
        $course = Course::where('id', $request->get('course-id'))->first();
        $course->total_question = $course->total_question -1;
        $course->save();
    }
}
