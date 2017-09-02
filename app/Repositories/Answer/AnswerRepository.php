<?php
namespace App\Repositories\Answer;

use App\Models\Answer;
use App\Models\Question;
use App\Repositories\EloquentRepository;
use Illuminate\Http\Request;
use Image;

/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 21/08/2017
 * Time: 14:41
 */
class AnswerRepository extends EloquentRepository implements AnswerRepositoryInterface
{

    public function getModel()
    {
        return Answer::class;
    }

    public function createAnswer(\Illuminate\Http\Request $request, $question_id)
    {
        return Answer::create(['tag' => $request->get('answer-tag'),
            'answer_content' => $request->get('answer-content'),
            'correct' => $request->get('answer-correct'),
            'question_id' => $question_id,
            'desc' => 'default.jpg'
        ]);
    }

    public function updateAnswer(Request $request, $question_id, $answer)
    {
        $answer_img = $request->file('answer-desc');
        $filename = 'answer' . $answer->id . '.' . $answer_img->getClientOriginalExtension();
        Image::make($answer_img)->resize(150, 150)->save(public_path('img/answer_image/' . $filename));
        Answer::where('id', $answer->id)
            ->update(['desc' => $filename]);
        $question = Question::where('id', $question_id)->first();
        $question->total_answer = $question->total_answer + 1;
        $question->save();
    }
}