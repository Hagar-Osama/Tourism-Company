<!-- main header -->
<header class="main-header style-three">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box clearfix">
            <div class="menu-area pull-left clearfix">
                <div class="logo-box">
                    <figure class="logo"><a href="{{route('user.index')}}"><img src="{{URL::asset('assets/images/logo-3.png')}}" alt=""></a></figure>
                </div>
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="current dropdown"><a href="{{route('user.index')}}">Home</a>
                            </li>
                            <li class="dropdown"><a>Categories</a>
                            <ul class="dropdown">
                            @isset($categories)
                                @forelse($categories as $category)
                                <li class="dropdown"><a>{{$category['name']}}</a>
                                    <ul>
                                        <li><a href="destination.html">Destinations 01</a></li>
                                    </ul>
                                </li>
                            </li>
                                @empty
                                @endforelse
                            @endisset
                            </ul>

                            <li><a href="{{route('user.package.index')}}">Tour</a></li>
                            <li><a href="{{route('user.gallery.index')}}">Gallery</a></li>
                            <li><a href="{{route('user.contact.index')}}">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <ul class="menu-right-content pull-right clearfix">
                <li class="search-box-outer">
                    <div class="dropdown">
                        <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                        <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                            <div class="form-container">
                                <form method="post" action="blog.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search...." required="">
                                        <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="btn-box">
                    <a href="{{route('user.package.index')}}" class="theme-btn">Book A Tour</a>
                </li>
            </ul>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    @isset($assets)
                    @foreach($assets as $asset)
                    <figure class="logo"><a href="index.html"><img src="{{env('AWS_URL'). '/assets'. '/' .$asset->image}}" alt=""></a></figure>
                    @endforeach
                    @endisset
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                                <div class="form-container">
                                    <form method="post" action="blog.html">
                                        <div class="form-group">
                                            <input type="search" name="search-field" value="" placeholder="Search...." required="">
                                            <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

