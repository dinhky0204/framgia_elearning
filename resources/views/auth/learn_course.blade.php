@extends('layouts.app')
@section('content')
    <section id="hero1" class="hero">
        <div class="inner">
            <div class="learn-container">
                <div class="learn-course-container col-md-8 col-md-offset-2">
                    @foreach($content as $key => $value)
                        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                            <div class="flippable appcon ac-bicycle">
                                <div class="front">
                                    <img src="/img/answer_image/{!! $value['correctAnswer']['desc'] !!}">
                                </div>
                                <div class="back">
                                    {{$value['correctAnswer']['answer_content']}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-8 col-md-offset-2" style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);">
        <table class="table table-bordered" style="background-color: #00cc99">
            <tbody>
            @foreach($content as $vocabulary)
                <tr>
                    <td style="font-size: 18px">{{$vocabulary['question_content']}}</td>
                    <td style="font-size: 18px">{{$vocabulary['correctAnswer']['answer_content']}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection