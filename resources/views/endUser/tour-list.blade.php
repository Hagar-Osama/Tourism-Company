@extends('endUser.layouts.master')

@section('title')
    Tour List
@endsection

@section('content')
    <!-- Page Title -->
    <section class="page-title style-two centred" style="background-image: url(assets/images/background/page-title-2.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <h1>Tours List</h1>
                <p>Discover your next great adventure</p>
            </div>
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
    <!-- End Page Title -->


    <!-- tours-page-section -->
    <section class="tours-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h3>Showing 1-6 of 20 Results</h3>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="short-box clearfix">
                                <div class="select-box">
                                    <select class="wide">
                                        <option data-display="Sort by">Sort by</option>
                                        <option value="1">Sort 01</option>
                                        <option value="2">Sort 02</option>
                                        <option value="3">Sort 03</option>
                                        <option value="3">Sort 04</option>
                                    </select>
                                </div>
                            </div>
                            <div class="menu-box">
                                <button class="grid-view on"><i class="icon-Grid"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper grid">
                        <div class="tour-grid-content">
                            <div class="row clearfix">
                                @isset($packages)
                                    @foreach($packages as $package)
                                <div class="col-lg-6 col-md-6 col-sm-12 tour-block">
                                    <div class="tour-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img src="{{env('AWS_URL'). '/packages'. "/" .$package['main_image']}}" alt="">
                                                <a href="{{route('user.package.details',$package['id'])}}"><i class="fas fa-link"></i></a>
                                            </figure>
                                            <div class="lower-content">
                                                <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                                                <h3><a href="{{route('user.package.details',$package['id'])}}">{{$package['title']}}</a></h3>
                                                <h4>${{$package['price']}}<span> / Per person</span></h4>
                                                <ul class="info clearfix">
                                                    <li><i class="far fa-clock"></i>5 Days</li>
                                                    <li><i class="far fa-map"></i>{{$package['location']}}</li>
                                                </ul>
                                                <p>{!! $package['body'] !!}</p>
                                                <div class="btn-box">
                                                    <a href="{{route('user.package.details',$package['id'])}}">See Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
{{--                        <div class="tour-list-content list-item">--}}
{{--                            @isset($packages)--}}
{{--                                @foreach($packages as $package)--}}
{{--                            <div class="tour-block-two">--}}
{{--                                <div class="inner-box">--}}
{{--                                    <figure class="image-box">--}}
{{--                                        <img src="{{URL::asset('images/packages/'.$package['main_image'])}}" alt="">--}}
{{--                                        <a href="{{route('user.package.details',$package['id'])}}"><i class="fas fa-link"></i></a>--}}
{{--                                    </figure>--}}
{{--                                    <div class="content-box">--}}
{{--                                        <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>--}}
{{--                                        <h3><a href="{{route('user.package.details',$package['id'])}}">{{$package['title']}}</a></h3>--}}
{{--                                        <h4>${{$package['price']}}<span> / Per person</span></h4>--}}
{{--                                        <p>{!! mb_substr($package['body'],0,100) !!}</p>--}}
{{--                                        <div class="btn-box">--}}
{{--                                            <a href="{{route('user.package.details',$package['id'])}}">See Details</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                                @endforeach--}}
{{--                            @endisset--}}
{{--                        </div>--}}
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="default-sidebar tour-sidebar ml-20">
                        <div class="sidebar-widget sidebar-search">
                            <div class="widget-title">
                                <h3>Search</h3>
                            </div>
                            <form action="destination-details.html" method="post" class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>Category</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Adventure Tours</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input" checked="checked">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">City Tours</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Couple Tours</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Group Tours</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Hosted Tours</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget price-filter">
                            <div class="widget-title">
                                <h3>Price Range</h3>
                            </div>
                            <div class="range-slider clearfix">
                                <div class="value-box clearfix">
                                    <div class="min-value pull-left">
                                        <p>$50.00</p>
                                    </div>
                                    <div class="max-value pull-right">
                                        <p>$100.00</p>
                                    </div>
                                </div>
                                <div class="price-range-slider"></div>
                            </div>
                        </div>
                        <div class="sidebar-widget duration-widget">
                            <div class="widget-title">
                                <h3>Durations</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">0 - 24 hours</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">1 - 2 days</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">2 - 3 days</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">3 - 4 days</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">4 - 5 days</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget review-widget">
                            <div class="widget-title">
                                <h3>Review Score</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star light"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                    <li class="custom-check-box">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">
                                                        <i class="icon-Star"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                        <i class="icon-Star light"></i>
                                                    </span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="advice-widget">
                            <div class="inner-box" style="background-image: url(assets/images/resource/advice-1.jpg);">
                                <div class="text">
                                    <h2>Get <br />25% Off <br />On New York Tours</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tours-page-section end -->
@endsection
@section('js')
    <script src="{{URL::asset('assets/js/owl.js')}}"></script>
    <script src="{{URL::asset('assets/js/wow.js')}}"></script>
    <script src="{{URL::asset('assets/js/validation.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{URL::asset('assets/js/appear.js')}}"></script>
    <script src="{{URL::asset('assets/js/scrollbar.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('assets/js/product-filter.js')}}"></script>
@endsection
