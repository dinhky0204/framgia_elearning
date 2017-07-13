<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:49
 */

namespace App\Models;


class QuestionType extends BaseModel
{
    protected $fillable = [
        'id',
        'type',
        'description',
    ];

    public function Questions()
    {
        return $this->hasMany(Question::class);
    }
}
