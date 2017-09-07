<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 12/08/2017
 * Time: 13:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\QuestionType;
use App\Repositories\Answer\AnswerRepository;
use App\Repositories\Question\QuestionRepository;
use Illuminate\Http\Request;
use Image;

class QuestionController extends Controller
{
    protected $questionRepository;
    protected $answerRepository;
    public function __construct(QuestionRepository $questionRepository, AnswerRepository $answerRepository)
    {
        $this->middleware('admin');
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }
    public function index() {
        $data = $this->questionRepository->getAllQuestion();
        return view('admin.contents.questions', [
            'list_question' => $data[0],
            'list_course' => $data[2],
            'list_type' => $data[1]
        ]);
    }
    public function createQuestion() {
        return view('admin.contents.create_question',[
            'list_course' => Course::all(),
            'list_type' => QuestionType::all()
        ]);
    }
    public function checkCreateQuestion(Request $request) {
        $this->questionRepository->createQuestion($request);
        return redirect()->back()->with('status', 'Create Question Successfull');
    }

    public function editQuestion($question_id) {
        $data = $this->questionRepository->editQuestion($question_id);
        return view('admin.contents.editQuestion', [
            'question' => $data[0],
            'list_course' => $data[1],
            'list_type' => $data[2]
        ]);
    }
    public function checkeditQuestion(Request $request, $question_id) {
        $this->questionRepository->checkEditQuestion($request, $question_id);
        return redirect()->back();
    }
    public function createAnswer(Request $request, $question_id) {
        if(!$request->hasFile('answer-desc')) {
            $answer = $this->answerRepository->createAnswer($request, $question_id);
            $question = Question::where('id', $question_id)->first();
            $question->total_answer = $question->total_answer + 1;
            $question->save();
        }
        else {
            $answer = $this->answerRepository->createAnswer($request, $question_id);
            $this->answerRepository->updateAnswer($request, $question_id, $answer);
        }

        return redirect()->back();
    }
    public function deleteQuestion(Request $request, $question_id) {
        $this->questionRepository->deleteQuestion($question_id);
        $this->questionRepository->updateQuestion($request, $question_id);
        return redirect()->back();
    }
}
