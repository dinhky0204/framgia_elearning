<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:49
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Course extends BaseModel
{
    protected $table = 'courses';
    protected $fillable = [
        'id',
        'name',
        'total_question',
        'hidden',
        'admin_id',
        'subject_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }
}
