<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 08/09/2017
 * Time: 14:52
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

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
//        dd($request->get('post_content'));
        if(!$request->get('post_content'))
            return redirect()->back()->withInput();
        else {
            if($this->postRepository->createPost($request))
                return redirect('home');
            else
                return redirect()->back()->withInput();
       }
    }
}
