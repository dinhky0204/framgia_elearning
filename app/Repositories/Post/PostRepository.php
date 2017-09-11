<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 15:31
 */

namespace App\Repositories\Post;


use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Repositories\EloquentRepository;
use Carbon\Carbon;
use Guzzle\Http\Message\PostFileInterface;
use Illuminate\Http\Request;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }


    public function createPost(Request $request)
    {
        $post = Post::create([
           'title' => 'default',
            'content' => $request->get('post_content'),
            'course_id' => $request->get('post_course')
        ]);
        if(!$post) {
            return false;
        }
        else return true;

    }

    public function getPost()
    {
        return Post::all();
    }

    public function getCommentOfPost($post_id)
    {
      $list_comment = Comment::where('post_id', $post_id)->get();
      if($list_comment) {
        foreach ($list_comment as $key => $comment) {
          $comment->user_name = User::where('id', $comment->user_id)->first()->name;
        }
          return $list_comment;
      }
      else
          return false;
    }

    public function getPostOfCourse($course_id)
    {
        $list_post = Post::where('course_id', $course_id)->get();
        foreach ($list_post as $post) {
            $post->total_comment = Comment::where('post_id', $post->id)->count();
        }
        return $list_post;
    }
}
