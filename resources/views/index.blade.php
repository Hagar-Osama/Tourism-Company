@extends('endUser.layouts.master')

@section('title')
    Egypt Metropolitan Travel
@endsection

@section('content')
    <!-- banner-section -->
    <section class="banner-section style-three bg-color-1">
        <div class="pattern-layer-2" style="background-image: url(assets/images/shape/shape-19.png);"></div>
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                @isset($sliders)
                    @if(count($sliders) > 0)
                        @foreach($sliders as $slider)
                        <div class="slide-item">
                            <div class="image-layer" style="background-image:url({{env('AWS_URL'). '/sliders'. '/' .$slider->image}})"></div>
                            <div class="auto-container">
                                <div class="text">
                                    <h2>Find Your Destination1</h2>
                                    <p>Discover your next great adventure</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                @endisset
        </div>
        <div class="auto-container">
            <div class="form-inner">
                <form action="index.html" method="post" class="booking-form clearfix">
                    <div class="form-group">
                        <input type="text" name="service" placeholder="Where to?" required="">
                    </div>
                    <div class="form-group input-date">
                        <i class="far fa-angle-down"></i>
                        <input type="text" name="date" placeholder="When?" id="datepicker">
                    </div>
                    <div class="form-group">
                        <div class="select-box">
                            <select class="wide">
                                <option data-display="Travel Type">Travel Type</option>
                                <option value="1">Adventure Tours</option>
                                <option value="2">City Tours</option>
                                <option value="3">Couple Tours</option>
                                <option value="4">Group Tours</option>
                            </select>
                        </div>
                    </div>
                    <div class="message-btn">
                        <button type="submit" class="theme-btn"><i class="far fa-search"></i>Find Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- feature-section -->
    <section class="feature-section centred bg-color-1 sec-pad">
        <div class="anim-icon">
            <div class="icon anim-icon-1" style="background-image: url(assets/images/shape/shape-15.png);"></div>
            <div class="icon anim-icon-2" style="background-image: url(assets/images/shape/shape-16.png);"></div>
            <div class="icon anim-icon-3" style="background-image: url(assets/images/shape/shape-17.png);"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <p>Travio Specials</p>
                <h2>Why Travel with Tutive?</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{URL::asset('assets/images/resource/feature-1.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-1"></i></div>
                                <h4>2000+ Our Worldwide Guides</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{URL::asset('assets/images/resource/feature-2.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-2"></i></div>
                                <h4>100% Trusted Tour Agency</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{URL::asset('assets/images/resource/feature-3.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-3"></i></div>
                                <h4>12+ Years of Travel Experience</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{URL::asset('assets/images/resource/feature-4.jpg')}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box"><i class="icon-4"></i></div>
                                <h4>98% of Our Travelers are Happy</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- about-style-three -->
    <section class="about-style-three">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-4.png);"></div>
        <div class="anim-icon">
            <div class="icon anim-icon-1" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="icon anim-icon-2" style="background-image: url(assets/images/shape/shape-18.png);"></div>
            <div class="icon anim-icon-3" style="background-image: url(assets/images/shape/shape-18.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box text-right">
                            @isset($abouts)
                                @if(count($abouts) > 0)
                                    @foreach($abouts as $about)
                                        <div class="image-box">
                                            <figure class="image">
                                                <img src="{{env('AWS_URL'). '/abouts'. "/" .$about->image}}" width="390px" height="310px" alt="about">
                                            </figure>
                                        </div>
                                        <div class="text">
                                            <p>{!! $about->body !!}</p>
                                            <h3>{{$about->slug}}</h3>
                                        </div>
                                    @endforeach
                                @endif
                            @endisset

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_4">
                        <div class="content-box">
                            @isset($abouts)
                                @if(count($abouts) > 0)
                                    @foreach($abouts as $about)
                                        <div class="sec-title">
                                            <p>{{$about->slug}}</p>
                                        </div>
                                        <figure class="image-box"><img src="{{env('AWS_URL'). '/abouts'. "/" .$about->image}}" width="510px" height="350px" alt="about"></figure>
                                    @endforeach
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-three end -->


    <!-- offer-section -->
    <section class="offer-section sec-pad" style="background-image: url(assets/images/background/offer-1.jpg);">
        <div class="auto-container">
            <div class="sec-title light">
                <p>Deals & Offers</p>
                <h2>Last Minute Amazing Deals</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                @foreach($lastPackages as $lastPackage)
                    <div class="offer-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{env('AWS_URL'). '/packages'. "/".$lastPackage->main_image}}" alt=""></figure>
                            <div class="content-box">
                                <h3><a href="destination-details.html">{{$lastPackage->title}}</a></h3>
                                <h4>${{$lastPackage->price}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- offer-section end -->


    <!-- tour-style-two -->
    <section class="tour-style-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <p>Modern & Beautiful</p>
                <h2>Our Most Popular Adventures</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 tour-block">
                    <div class="tour-block-two wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{URL::asset('assets/images/tour/tour-4.jpg')}}" alt="">
                                <a href="tour-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="content-box">
                                <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                                <h3><a href="tour-details.html">Moscow Red City Land</a></h3>
                                <h4>$170.00<span> / Per person</span></h4>
                                <p>Lorem ipsum dolor amet consectetur adipiscing sed.</p>
                                <div class="btn-box">
                                    <a href="tour-details.html">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 tour-block">
                    <div class="tour-block-two wow fadeInRight animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{URL::asset('assets/images/tour/tour-5.jpg')}}" alt="">
                                <a href="tour-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="content-box">
                                <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                                <h3><a href="tour-details.html">Moscow Red City Land</a></h3>
                                <h4>$170.00<span> / Per person</span></h4>
                                <p>Lorem ipsum dolor amet consectetur adipiscing sed.</p>
                                <div class="btn-box">
                                    <a href="tour-details.html">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 tour-block">
                    <div class="tour-block-two wow fadeInLeft animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{URL::asset('assets/images/tour/tour-6.jpg')}}" alt="">
                                <a href="tour-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="content-box">
                                <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                                <h3><a href="tour-details.html">Moscow Red City Land</a></h3>
                                <h4>$170.00<span> / Per person</span></h4>
                                <p>Lorem ipsum dolor amet consectetur adipiscing sed.</p>
                                <div class="btn-box">
                                    <a href="tour-details.html">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 tour-block">
                    <div class="tour-block-two wow fadeInRight animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{URL::asset('assets/images/tour/tour-7.jpg')}}" alt="">
                                <a href="tour-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="content-box">
                                <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                                <h3><a href="tour-details.html">Moscow Red City Land</a></h3>
                                <h4>$170.00<span> / Per person</span></h4>
                                <p>Lorem ipsum dolor amet consectetur adipiscing sed.</p>
                                <div class="btn-box">
                                    <a href="tour-details.html">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tour-style-two end -->

    <!-- funfact-style-two -->
    <section class="funfact-style-two centred">
        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-14.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                    <div class="counter-block-two">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="2000">0</span><span>+</span>
                            </div>
                            <p>Awesome Hikers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                    <div class="counter-block-two">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="70">0</span><span>+</span>
                            </div>
                            <p>Stunning Places</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                    <div class="counter-block-two">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="1200">0</span><span>+</span>
                            </div>
                            <p>Miles to Hike</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                    <div class="counter-block-two">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="15">0</span>
                            </div>
                            <p>Years in Service</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- funfact-style-two end -->


@endsection
