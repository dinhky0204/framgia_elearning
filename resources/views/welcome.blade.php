@extends('layouts.app')

@section('slider')
    <div class="background-header" style="position: relative">
        <div >
            <div class="color-pencil" >
                <img class="w3-image" src="/img/slider/4.jpg" alt="Me" width="1350" height="620" style="background: rgba(51,51,51,0.8);">
            </div>
        </div>
       <a href="{{route('login')}}">
           <div class="text-box">
               <div class="hover">
                   <h3><span>Getting started with</span> <span style="color: #00DD00">E-Learning</span></h3>
               </div>
           </div>
       </a>
        <div class="text-box col-md-3 col-md-offset-2">
            <h4><i class="fa fa-graduation-cap" style="color: #00DD00"><span style="color: #000000">Hơn 1000 học viên tham gia</span></i>

            </h4>
        </div>
        <div class="text-box col-md-3 col-md-offset-1">
            <h4><i class="fa fa-book" style="color: #00DD00"><span style="color: #000000">Hơn 300 Bài học</span></i>
            </h4>
        </div>
        <div class="text-box col-md-3 col-md-offset-1">
            <h4><i class="fa fa-paper-plane" style="color: #00DD00"><span style="color: #000000">Học trực tuyến</span></i>

            </h4>
        </div>
    </div>
@endsection