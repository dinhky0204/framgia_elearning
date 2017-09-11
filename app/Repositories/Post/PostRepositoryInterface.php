<?php
namespace App\Repositories\Post;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 15:30
 */
interface PostRepositoryInterface
{
    public function createPost(Request $request);
    public function getPost();
    public function getCommentOfPost($post_id);
    public function getPostOfCourse($course_id);
}