<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:51
 */

namespace App\Models;


class StudentCourseEnrollment extends BaseModel
{
    protected $table = 'student_course_enrollment';
    protected $fillable = [
        'id',
        'progress',
        'user_id',
        'course_id',
    ];
    public function studentCourse()
    {
        return $this->belongsToMany(User::class, 'student_course', 'user_id', 'course_id');
    }
}
