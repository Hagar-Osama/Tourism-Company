@extends('endUser.layouts.master')

@section('title')
    Tour Details
@endsection

@section('content')

            <!-- Page Title -->
            <section class="page-title style-three" style="background-image: url(assets/images/background/page-title-3.jpg);">
                <div class="auto-container">
                    <div class="inner-box">
                        <div class="rating"><span><i class="fas fa-star"></i>8.0 Superb</span></div>
                        <h2>{{$package['title']}}</h2>
                        <h3>${{$package['price']}}<span> / Per person</span></h3>
                    </div>
                </div>
            </section>

            <!-- End Page Title -->


            <!-- tour-details -->
            <section class="tour-details">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                            <div class="tour-details-content">
                                <div class="inner-box">
                                    <div class="text">
                                        <h2>Overview</h2>
                                        <p>{!! $package['body'] !!}</p>
                                        <ul class="info-list clearfix">
                                            <li><i class="far fa-clock"></i>5 Days</li>
                                            <li><i class="far fa-user"></i>Age 15+</li>
                                            <li><i class="far fa-map"></i>{{$package['location']}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overview-inner">
                                    <ul class="overview-list clearfix">
                                        <li><span>Destination:</span>New York City</li>
                                        <li><span>Departure:</span>Yes Requard</li>
                                        <li><span>Departure Time:</span>New York City</li>
                                        <li><span>Return Time:</span>English & Spanish</li>
                                        <li class="clearfix"><span>Included:</span>
                                            <ul class="included-list clearfix">
                                                <li>Air fares</li>
                                                <li>4 Nights Hotel Accomodation</li>
                                                <li>Entrance Fees</li>
                                                <li>Tour Guide</li>
                                            </ul>
                                        </li>
                                        <li class="clearfix"><span>Excluded:</span>
                                            <ul class="excluded-list clearfix">
                                                <li>Air fares</li>
                                                <li>Air fares</li>
                                                <li>Air fares</li>
                                                <li>Air fares</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tour-plan">
                                    <div class="text">
                                        <h2>Tour Plan</h2>
                                        <p>Aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                    <div class="content-box">
                                        <div class="single-box">
                                            <span>01</span>
                                            <h4>8:00 am to 10:00 am</h4>
                                            <h3>Day 1: Arrive South Africa Forest</h3>
                                            <p>Aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <ul class="list clearfix">
                                                <li>Air fares</li>
                                                <li>4 Nights Hotel Accomodation</li>
                                                <li>Entrance Fees</li>
                                            </ul>
                                        </div>
                                        <div class="single-box">
                                            <span>02</span>
                                            <h4>8:00 am to 10:00 am</h4>
                                            <h3>Day 2: Arrive South Africa Forest</h3>
                                            <p>Aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <ul class="list clearfix">
                                                <li>Air fares</li>
                                                <li>4 Nights Hotel Accomodation</li>
                                                <li>Entrance Fees</li>
                                            </ul>
                                        </div>
                                        <div class="single-box">
                                            <span>03</span>
                                            <h4>8:00 am to 10:00 am</h4>
                                            <h3>Day 3: Arrive South Africa Forest</h3>
                                            <p>Aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <ul class="list clearfix">
                                                <li>Air fares</li>
                                                <li>4 Nights Hotel Accomodation</li>
                                                <li>Entrance Fees</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="location-map">
                                    <div class="text">
                                        <h2>View On Map</h2>
                                        <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat duis aute irure dolor.</p>
                                    </div>
                                    <div class="map-inner">
                                        <div
                                            class="google-map"
                                            id="contact-google-map"
                                            data-map-lat="40.712776"
                                            data-map-lng="-74.005974"
                                            data-icon-path="assets/images/icons/map-marker.png"
                                            data-map-title="Brooklyn, New York, United Kingdom"
                                            data-map-zoom="12"
                                            data-markers='{
                                            "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                        }'>

                                        </div>
                                    </div>
                                </div>
                                <div class="photo-gallery">
                                    <div class="text">
                                        <h2>Photo Gallery</h2>
                                        <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                    <div class="image-box clearfix">
                                        @isset($package_images)
                                            @foreach($package_images as $item)
                                        <figure class="image">
                                            <img src="{{env('AWS_URL'). '/special'. "/".$item['image']}}" alt="">
                                            <a href="{{env('AWS_URL'). '/special'. "/".$item['image']}}" class="view-btn lightbox-image" data-fancybox="gallery"><i class="icon-Plus"></i></a>
                                        </figure>
                                            @endforeach
                                        @endisset

                                    </div>
                                </div>

                                <div class="review-box">
                                    <div class="text">
                                        <div class="total-rating">
                                            <h2>4.8</h2>
                                            <span>Superb</span>
                                        </div>
                                    </div>
                                    <div class="progress-content">
                                        <div class="progress-box">
                                            <p>Accommodation</p>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="70%"></div>
                                                <div class="count-text">70%</div>
                                            </div>
                                        </div>
                                        <div class="progress-box">
                                            <p>Transport</p>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="80%"></div>
                                                <div class="count-text">80%</div>
                                            </div>
                                        </div>
                                        <div class="progress-box">
                                            <p>Comfort</p>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="100%"></div>
                                                <div class="count-text">100%</div>
                                            </div>
                                        </div>
                                        <div class="progress-box">
                                            <p>Hospitality</p>
                                            <div class="bar">
                                                <div class="bar-inner count-bar" data-percent="70%"></div>
                                                <div class="count-text">70%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-box">
                                    <div class="text">
                                        <h2>Leave Your Comments</h2>
                                        <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat duis aute irure dolor.</p>
                                        <ul class="list clearfix">
                                            <li>
                                                <h5>Accommodation:</h5>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </li>
                                            <li>
                                                <h5>Transport:</h5>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </li>
                                            <li>
                                                <h5>Comfort:</h5>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </li>
                                            <li>
                                                <h5>Food:</h5>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </li>
                                            <li>
                                                <h5>Hospitality:</h5>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <form action="tour-details.html" method="post" class="comment-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="name" placeholder="Your Name" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" name="email" placeholder="Email Address" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <input type="text" name="review" placeholder="Review Title" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Write Message"></textarea>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <button type="submit" class="theme-btn">Submit Now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                            <div class="default-sidebar tour-sidebar ml-20">
                                <div class="form-widget">
                                    <div class="widget-title">
                                        <h3>Book This Tour</h3>
                                    </div>
                                    @include('partials.session')
                                    <form action="{{route('user.package.book')}}" method="post" class="tour-form">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{$package['id']}}">
                                        <div class="form-group">
                                            <input type="text" name="name" class="@error('name') is-invalid fparsley-error parsley-error @enderror" placeholder="Your Name" required="" value="{{old('name')}}">
                                            @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <p>{{ $message }}</p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="@error('email') is-invalid fparsley-error parsley-error @enderror" placeholder="Your Email" required="" value="{{old('email')}}">
                                            @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <p>{{ $message }}</p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="@error('phone') is-invalid fparsley-error parsley-error @enderror" placeholder="Phone" required="" value="{{old('phone')}}">
                                            @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <p>{{ $message }}</p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="date" class="form-input @error('date') is-invalid fparsley-error parsley-error @enderror" placeholder="dd/mm/yy" id="datepicker" value="{{old('date')}}">
                                            @error('date')
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <p>{{ $message }}</p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message" class="@error('message') is-invalid fparsley-error parsley-error @enderror"></textarea>
                                            @error('message')
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <p>{{ $message }}</p>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn">Book Tour</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="sidebar-widget downloads-widget">
                                    <div class="widget-title">
                                        <h3>Downloads</h3>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="download-links clearfix">
                                            <li><a href="{{$package['plan_pdf']}}" download="{{$package['plan_pdf']}}">Plan Package Tour<i class="fas fa-download"></i></a></li>
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
            <!-- tour-details end -->
@endsection
@section('js')
    <script>
        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('message') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
