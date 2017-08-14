@extends('layouts.app')

@section('content')
    <section id="slider">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="slider_area">
                    <!-- Start super slider -->
                    <div id="slides">
                        <ul class="slides-container">
                            <li>
                                <img src="img/slider/2.jpg" alt="img">
                                <div class="slider_caption">
                                    <h2>Largest & Beautiful University</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <a class="slider_btn" href="#">Know More</a>
                                </div>
                            </li>
                            <!-- Start single slider-->
                            <li>
                                <img src="img/slider/3.jpg" alt="img">
                                <div class="slider_caption slider_right_caption">
                                    <h2>Better Education Environment</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                                    <a class="slider_btn" href="#">Know More</a>
                                </div>
                            </li>
                            <!-- Start single slider-->
                            <li>
                                <img src="img/slider/4.jpg" alt="img">
                                <div class="slider_caption">
                                    <h2>Find out you in better way</h2>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                                    <a class="slider_btn" href="#">Know More</a>
                                </div>
                            </li>
                        </ul>
                        <nav class="slides-navigation">
                            <a href="#" class="next"></a>
                            <a href="#" class="prev"></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section
@endsection