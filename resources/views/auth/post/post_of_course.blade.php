@extends('layouts.app')
@section('posts')
    {{ HTML::style('/assets/bower/bootstrap/dist/css/bootstrap.min.css') }}
    {{ HTML::style('/css/post.css') }}
    <br>
    <br>
    <br>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($list_post as $post)
                        <div class="col-lg-6 col-md-6">
                            <aside>
                                <img src="/img/post/{{$post->image}}"
                                     class="img-responsive">
                                <div class="content-title">
                                    <div class="text-center">
                                        <h3><a href="/post/{{$post->id}}">{{$post->title}}</a></h3>
                                    </div>
                                </div>
                                <div class="content-footer">
                                    <img class="user-small-img"
                                         src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADtA/hio87ZnTpakcchDXNrKc_wlkHEcpH6vMwCJoC/w140-h148-p-rw/profile-pic.jpg">
                                    <span style="font-size: 16px;color: #fff;">Falcon95</span>
                                    <span class="pull-right">
                                    <span href="#" data-toggle="tooltip" data-placement="right" title="Loved">
                                        {{$post->created_at}}
                                    </span>
                                    <a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments"></i>{{$post->total_comment}}</a>
                                    </span>
                                </div>
                            </aside>
                        </div>
                            @endforeach

                    </div>
                </div>

                <!--           // RECENT POST===========-->
                <div class="col-lg-4">
                    <div class="widget-sidebar">
                        <h2 class="title-widget-sidebar">// RECENT POST</h2>
                        <div class="content-widget-sidebar">
                            <ul>
                                <li class="recent-post">
                                    <div class="post-img">
                                        <img src="https://lh3.googleusercontent.com/-ndZJOGgvYQ4/WM1ZI8dH86I/AAAAAAAADeo/l67ZqZnRUO8QXIQi38bEXuxqHfVX0TV2gCJoC/w424-h318-n-rw/thumbnail8.jpg"
                                             class="img-responsive">
                                    </div>
                                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                                    <p>
                                        <small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni
                                            2017
                                        </small>
                                    </p>
                                </li>
                                <hr>

                                <li class="recent-post">
                                    <div class="post-img">
                                        <img src="https://lh3.googleusercontent.com/-ojLI116-Mxk/WM1ZIwdnuwI/AAAAAAAADeo/4K6VpwIPSfgsmlXJB5o0N8scuI3iW4OpwCJoC/w424-h318-n-rw/thumbnail6.jpg"
                                             class="img-responsive">
                                    </div>
                                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                                    <p>
                                        <small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni
                                            2017
                                        </small>
                                    </p>
                                </li>
                                <hr>

                                <li class="recent-post">
                                    <div class="post-img">
                                        <img src="https://lh3.googleusercontent.com/-TrK1csbtHRs/WM1ZI1SIUNI/AAAAAAAADeo/OkiUjuad6skWl9ugxbiIA_436OwsWKBNgCJoC/w424-h318-n-rw/thumbnail3.jpg"
                                             class="img-responsive">
                                    </div>
                                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                                    <p>
                                        <small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni
                                            2017
                                        </small>
                                    </p>
                                </li>
                                <hr>

                                <li class="recent-post">
                                    <div class="post-img">
                                        <img src="https://lh3.googleusercontent.com/-UKfIhJSBW9M/WM1ZI8ou34I/AAAAAAAADeo/vlLGY29147AYLaxUW29ZXJlun115BhkhgCJoC/w424-h318-n-rw/thumbnail7.jpg"
                                             class="img-responsive">
                                    </div>
                                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                                    <p>
                                        <small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni
                                            2017
                                        </small>
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection