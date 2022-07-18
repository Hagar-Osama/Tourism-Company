@extends('endUser.layouts.master')

@section('title')
    ContactUs
@endsection

@section('content')
    <!-- Page Title -->
    <section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact</h1>
                <p>Discover your next great adventure</p>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- contact-info-section -->
    <section class="contact-info-section bg-color-1">
        <div class="anim-icon">
            <div class="icon anim-icon-1" style="background-image: url(assets/images/shape/shape-3.png);"></div>
            <div class="icon anim-icon-2" style="background-image: url(assets/images/shape/shape-3.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                @isset($settings)
                    @forelse($settings as  $value)
                        @if($value->key == 'address')
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Location"></i></div>
                                <h3>{{ucfirst($value->key)}}</h3>
                                <p>{{$value->value}}</p>
                            </div>
                        </div>
                    </div>
                        @elseif($value->key == 'phone')
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Phone"></i></div>
                                <h3>{{ucfirst($value->key)}}</h3>
                                <p><a href="tel:{{$value->value}}">{{$value->value}}</a></p>
                            </div>
                        </div>
                    </div>
                        @elseif($value->key == 'email')
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Envelope"></i></div>
                                <h3>{{ucfirst($value->key)}}</h3>
                                <p><a href="mailto:{{$value->value}}">{{$value->value}}</a></p>
                            </div>
                        </div>
                    </div>
                        @endif
                    @empty
                    @endforelse
                @endisset
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                    <div class="content_block_5">
                        <div class="content-box">
                            <div class="sec-title">
                                <p>Get in touch</p>
                                <h2>Feel Free to Contact with us</h2>
                            </div>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiu smod tempor incididunt ut labore dolore magna aliqua. Quis ultrices ipsum suspen ultrices gravida Risus commodo.</p>
                            </div>
                            <ul class="social-links clearfix">
                                @isset($settings)
                                    @forelse($settings as $value)
                                        @if($value->key == 'facebook')
                                        <li><a href="{{$value->value}}"><i class="fab fa-facebook-f"></i></a></li>
                                        @elseif($value->key == 'youtube')
                                        <li><a href="{{$value->value}}"><i class="fab fa-youtube"></i></a></li>
                                        @elseif($value->key == 'twitter')
                                        <li><a href="{{$value->value}}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                    @empty
                                    @endforelse
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        @include('partials.session')
                        <form method="post" action="{{route('user.contact.store')}}" class="default-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="@error('name') is-invalid fparsley-error parsley-error @enderror" name="name" placeholder="Your Name" required="" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                      <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" class="@error('email') is-invalid fparsley-error parsley-error @enderror" name="email" placeholder="Email Address" required="" value="{{old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                      <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" class="@error('phone') is-invalid fparsley-error parsley-error @enderror" name="phone" required="" placeholder="Phone Number" value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="invalid-feedback text-danger" role="alert">
                                      <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" class="@error('subject') is-invalid fparsley-error parsley-error @enderror" name="subject" required="" placeholder="Subject" value="{{old('subject')}}">
                                    @error('subject')
                                    <span class="invalid-feedback text-danger" role="alert">
                                      <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" class="@error('message') is-invalid fparsley-error parsley-error @enderror" placeholder="Write Message">{{old('message')}}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback text-danger" role="alert">
                                      <p>{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn" type="submit" name="submit-form">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->

@endsection
