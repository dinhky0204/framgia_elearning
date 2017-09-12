@extends('layouts.app')
@section('show_post')
  {{ HTML::style('/css/show_comment.css') }}
  <div class="well" style="margin-top: 6%">
    <div class="row">
      <div class="col-md-8 col-md-offset-2" style="background-color: #fff">
        <div class="pull-left col-md-4 col-xs-12 thumb-contenido"><img class="center-block img-responsive" src='/img/post/{{$post->image}}' /></div>
        <div class="">
          <h1  class="hidden-xs hidden-sm">{{$post->title}}</h1>
          <hr>
          <small>{{$post->created_at}}</small><br>
          <hr>
          <?php echo $post->content ?>
      </div>
    </div>
  </div>

    <div class="comment-container" id="list_comment">
      <div class="col-md-8 col-md-offset-3" id="comment-box-input">
        <form action="#" method="POST" @submit.prevent = "onSubmit" v-if="!edit">
          {{ csrf_field() }}
          <img src="/avatar/{{Auth::user()->avatar}}" alt="" style="width:60px; height: 60px;">
          <textarea name ="comment_content" v-model="new_comment.comment_content" required id="input_comment" cols="60" rows="3"></textarea>
          <div class="alert alert-success col-md-3" transition="success" v-if="success">Create comment successful.</div>
          <div class="col-md-8">
            <button class="btn btn-primary" v-if="!edit" >Add comment</button>
            <button type="submit" class="btn btn-primary" v-if="edit" @click= "editComment(comment_edit_id)">Edit comment</button>
          </div>
        </form>

        <form action="#" method="POST" @submit.prevent = "editComment(comment_edit_id)" v-if="edit">
          {{ csrf_field() }}
          <img src="/avatar/{{Auth::user()->avatar}}" alt="" style="width:60px; height: 60px;">
          <textarea name ="comment_content" v-model="new_comment.comment_content" required id="input_comment" cols="60" rows="3"></textarea>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" v-if="edit" @click= "editComment(comment_edit_id)">Edit comment</button>
          </div>
        </form>
      </div>

      <div class="row">
        <div v-for="comment in comments">
          <div class="col-sm-1 col-md-offset-3">
            <div class="thumbnail">
              <img class="img-responsive user-photo" src="/avatar/default.jpg" />
            </div><!-- /thumbnail -->
          </div><!-- /col-sm-1 -->

          <div class="col-sm-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>@{{ comment.user_name }}</strong> <span class="text-muted">commented @{{ comment.time_ago }}</span>
                <a @click="removeComment(comment.id)" v-if="comment.is_user" class="pull-right"><i class="glyphicon glyphicon-trash" style="color: red"> </i></a>
                <a href="#input_comment" @click="showComment(comment.id)" v-if="comment.is_user" class="pull-right"><i class="glyphicon glyphicon-pencil"></i></a>
              </div>
              <div class="panel-body">
                @{{ comment.content }}
              </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
          </div><!-- /col-sm-5 -->
        </div>
      </div><!-- /row -->

    </div><!-- /container -->

@endsection
