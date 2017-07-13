<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:50
 */

namespace App\Models;


class StudentAnswerQuestionExact extends BaseModel
{
    protected $table = 'student_answer_question';
    protected $fillable = [
        'id',
        'user_id',
        'question_id',
    ];
    public function studentQuestion()
    {
        return $this->belongsToMany(User::class, 'student_question', 'user_id', 'question_id');
    }

}
