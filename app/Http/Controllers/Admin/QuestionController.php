<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 12/08/2017
 * Time: 13:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Image;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index() {
        $list_question = Question::all();
        foreach ($list_question as $question) {
            $question->course = Course::where('id', $question->course_id)->first();
            $question->type = QuestionType::where('id', $question->question_type_id)->first();
        }
        $list_type = QuestionType::all();
        $list_course = Course::all();
        return view('admin.contents.questions', ['list_question' => $list_question, 'list_course' => $list_course, 'list_type' => $list_type]);
    }
    public function editQuestion($question_id) {
        $question = Question::where('id', $question_id)->first();
        $question->list_answer = Answer::where('question_id', $question_id)->get();
        $question->type = QuestionType::where('id', $question->question_type_id)->first();
        $question->course = Course::where('id', $question->course_id)->first();
        $list_course = Course::all();
        $list_type = QuestionType::all();
        return view('admin.contents.editQuestion', ['question' => $question, 'list_type' => $list_type, 'list_course' => $list_course]);
    }
    public function checkeditQuestion(Request $request, $question_id) {
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
        return redirect()->back();
    }
    public function createAnswer(Request $request, $question_id) {
        if(!$request->hasFile('answer-desc')) {
            Answer::create(['tag' => $request->get('answer-tag'),
                'answer_content' => $request->get('answer-content'),
                'correct' => $request->get('answer-correct'),
                'question_id' => $question_id,
                'desc' => 'default.jpg'
            ]);
        }
        else {
            $answer = Answer::create(['tag' => $request->get('answer-tag'),
                'answer_content' => $request->get('answer-content'),
                'correct' => $request->get('answer-correct'),
                'question_id' => $question_id,
                'desc' => 'default.jpg'
            ]);
            $answer_img = $request->file('answer-desc');
            $filename = 'answer' . $answer->id . '.' . $answer_img->getClientOriginalExtension();
            Image::make($answer_img)->resize(150, 150)->save(public_path('img/answer_image/' . $filename));
            Answer::where('id', $answer->id)
                ->update(['desc' => $filename]);
            $question = Question::where('id', $question_id)->first();
            $question->total_answer = $question->total_answer + 1;
            $question->save();
        }

        return redirect()->back();
    }
    public function deleteQuestion(Request $request, $question_id) {
        Answer::where('question_id', $question_id)->delete();
        Question::where('id', $question_id)->delete();
        $course = Course::where('id', $request->get('course-id'))->first();
        $course->total_question = $course->total_question -1;
        $course->save();
        return redirect()->back();
    }
    public function createQuestion(Request $request) {
        $tmp = Question::create([
            'question_content' => $request->get('question-content'),
            'total_answer' => 0,
            'point' => intval($request->get('question-point')),
            'description' => 'default',
            'course_id' => intval($request->get('question-course')),
            'question_type_id' => intval($request->get('question-type'))
        ]);
        $course = Course::where('id', intval($request->get('question-course')))->first();
        $course->total_question = $course->total_question + 1;
        $course->save();
        if($tmp)
            return redirect()->back();
        else
            return redirect()->back()->withInput();
    }
}
