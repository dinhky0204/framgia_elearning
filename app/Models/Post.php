<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 14:33
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'title',
        'content',
        'course_id',
        'image'
    ];
}