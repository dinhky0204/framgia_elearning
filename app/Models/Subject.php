<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:47
 */

namespace App\Models;



class Subject extends BaseModel
{

    protected $fillable  = [
        'id',
        'name',
        'description',
        'hidden',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
