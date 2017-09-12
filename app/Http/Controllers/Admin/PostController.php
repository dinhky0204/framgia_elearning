<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 14:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('admin');
        $this->postRepository = $postRepository;
    }
    public function index() {
        return view('admin.contents.show_post', ['list_post' => $this->postRepository->getPost()]);
    }
    public function createPost() {
        return view('admin.contents.create_post', [
            'list_course' => Course::all()
        ]);
    }
    public function savePost(Request $request) {
        if(!$request->get('post_content'))
            return redirect()->back()->withInput();
        else {
            if($this->postRepository->createPost($request))
                return redirect()->back();
            else
                return redirect()->back()->withInput();
       }
    }
    public function editPost($post_id) {
        return view('admin.contents.edit_post', [
            'post' => Post::where('id', $post_id)->first(),
            'list_course' => Course::all()
        ]);
    }
    public function updatePost($post_id, Request $request) {
        $post = Post::where('id', $post_id)->first();
        $post->title = $request->get('post_title');
        $post->course_id = $request->get('post_course');
        $post->content = $request->get('post_content');
        if($request->hasFile('post_image')) {
            $post_img = $request->file('post_image');
            $filename = 'post' . $post->id . '.' . $post_img->getClientOriginalExtension();
            Image::make($post_img)->resize(360, 238.234)->save(public_path('img/post/' . $filename));
            $post->image = $filename;
        }
        $post->save();
        return redirect()->route('admin_show_posts')->with('post_edit', 'Update post successful');
//        return view('admin.contents.show_post', ['list_post' => $this->postRepository->getPost()])->with('post_edit', 'Update post successful');
    }
    public function deletePost($post_id) {
        Post::where('id', $post_id)->delete();
        Comment::where('post_id', $post_id)->delete();
        return redirect()->back();
    }
}
