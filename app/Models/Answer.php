<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:50
 */

namespace App\Models;


class Answer extends BaseModel
{
    protected $table = 'answers';

    protected $fillable = [
        'id',
        'tag',
        'answer_content',
        'correct',
    ];

    public function Question()
    {
        return $this->hasOne(Question::class);
    }
}
