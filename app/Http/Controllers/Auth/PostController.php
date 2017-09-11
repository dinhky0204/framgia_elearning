<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 16:38
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Post\PostRepository;

class PostController extends Controller
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function showPost($post_id) {
        $this->postRepository->getCommentOfPost($post_id);
        $post = Post::where('id', $post_id)->first();
        return view('auth.post.show_post', ['post' => $post, 'post_id' => $post_id]);
    }
    public function postOfCourse($course_id) {
        $list_post = $this->postRepository->getPostOfCourse($course_id);
        return view('auth.post.post_of_course', ['list_post' => $list_post]);
    }
}
