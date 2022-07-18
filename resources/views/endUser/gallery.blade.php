@extends('endUser.layouts.master')

@section('title')
    Gallery
@endsection

@section('content')
    <!-- Page Title -->
    <section class="page-title centred" style="background-image: url(assets/images/background/page-title-4.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <h1>Gallery</h1>
                <p>Discover your next great adventure</p>
            </div>
        </div>
    </section>
    <!-- End Page Title -->


    <!-- gallery-section -->
    <section class="gallery-section">
        <div class="auto-container">
            <div class="row clearfix">
                @isset($galleries)
                    @forelse($galleries as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 gallery-block">
                    <div class="gallery-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{env('AWS_URL'). '/galleries'. "/" .$item->image}}" width="340px" height="340px" alt="gallery_image"></figure>
                            <div class="view-btn"><a href="{{route('user.gallery.index')}}" class="lightbox-image" data-fancybox="gallery"><i class="icon-Plus"></i></a></div>
                        </div>
                    </div>
                </div>
                    @empty
                    @endforelse
                @endisset

            </div>
        </div>
    </section>
    <!-- gallery-section end -->

@endsection
