<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:50
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'id',
        'question_content',
        'total_answer',
        'description',
        'point',
        'course_id',
        'question_type_id',
    ];

    public function Answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
