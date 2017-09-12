<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 15:31
 */

namespace App\Repositories\Post;


use App\Models\Comment;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;
use App\Repositories\EloquentRepository;
use Carbon\Carbon;
use Guzzle\Http\Message\PostFileInterface;
use Illuminate\Http\Request;
use Image;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }


    public function createPost(Request $request)
    {
        $post = Post::create([
            'title' => $request->get('post_title'),
            'content' => $request->get('post_content'),
            'course_id' => $request->get('post_course'),
            'image' => 'book.jpg'
        ]);
        if($request->hasFile('post_image')) {
            $post_img = $request->file('post_image');
            $filename = 'post' . $post->id . '.' . $post_img->getClientOriginalExtension();
            Image::make($post_img)->resize(360, 238.234)->save(public_path('img/post/' . $filename));
            Post::where('id', $post->id)
                ->update(['image' => $filename]);
        }
    }

    public function getPost()
    {
        $list_post = Post::all();
        foreach ($list_post as $post) {
            $post->course_name = Course::where('id', $post->course_id)->first()->name;
        }
        return $list_post;
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
