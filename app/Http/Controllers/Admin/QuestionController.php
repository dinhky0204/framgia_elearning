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
    public function test() {
        return view('admin.contents.test_component', [
            'list_course' => Course::all(),
            'list_type' => QuestionType::all()
        ]);
    }
    public function create(Request $request) {
//        dd($request->all());
        $correct = 0;
        $list_tag = $request->get('list_tag');
        $list_content = $request->get('list_content');
        $list_image = $request->get('image');
        $question = Question::create([
            'question_content' => $request->get('question_content'),
            'point' => $request->get('question_point'),
            'course_id' => $request->get('course'),
            'total_answer' => $request->get('total_answer'),
            'description' => "Default",
            'question_type_id' => $request->get('question_type')
        ]);
        $course = Course::where('id', $request->get('course'))->first();
        $course->total_question = $course->total_question + 1;
        $course->save();
        for ($i=0; $i<$request->get('total_answer'); $i++) {
            if (($i+1)==$request->get('correct')) {
                $correct = 1;
            }
            else $correct = 0;
            $answer = Answer::create([
                'tag' => $list_tag[$i],
                'answer_content' => $list_content[$i],
                'correct' => $correct,
                'question_id' => $question->id,
                'desc' => 'default.jpg'
            ]);
            if(($i+1) < sizeof($list_image)) {
                $exploded = explode(',', $list_image[$i+1]['link']);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg'))
                    $extension = 'jpg';
                else
                    $extension = 'png';
                $filename = 'answer' . $answer->id . '.' . $extension;
                $path = public_path() . '/img/answer_image/' . $filename;
                file_put_contents($path, $decoded);
                $answer->desc = $filename;
                $answer->save();
            }
        }
        return response('success');
    }
}
