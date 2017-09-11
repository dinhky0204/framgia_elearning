<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
  public function store($post_id, Request $request) {
    $user = Auth::user();
    Comment::create([
      'content' => $request->get('comment_content'),
      'post_id' => $post_id,
      'user_id' => $user->id
    ]);
    return response("Create successfull");
  }
  public function index($post_id) {
    $list_comment = Comment::where('post_id', $post_id)->get();
     if($list_comment) {
       foreach ($list_comment as $key => $comment) {
         $comment->user_name = User::where('id', $comment->user_id)->first()->name;
         $comment->avatar = User::where('id', $comment->user_id)->first()->avatar;
         $comment->time_ago = Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans();
         if($comment->user_id == Auth::user()->id) {
           $comment->is_user = true;
         }
         else
           $comment->is_user = false;
       }
         return response($list_comment);
     }
    return response("error");
  }
  public function getComment($comment_id) {
    return response(Comment::where('id', $comment_id)->first());
  }
  public function editComment(Request $request, $comment_id) {
    Comment::where('id', $comment_id)
      ->update(['content' => $request->get('comment_content')]);
    return response("edit ok");
  }
  public function deleteComment($comment_id) {
    $result = Comment::where('id', $comment_id)->delete();
    if ($result)
      return response("Delete Ok");
    else
      return response("Delete Error");
  }
}
