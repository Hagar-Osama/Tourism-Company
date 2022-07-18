<!-- main-footer -->
<footer class="main-footer bg-color-2">
    <div class="footer-top pt-130">
        <div class="vector-bg" style="background-image: url(assets/images/shape/shape-11.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        @foreach($assets as $asset)
                        <figure class="footer-logo"><a href="{{route('user.index')}}"><img src="{{env('AWS_URL'). '/assets' .'/' .$asset->image}}" alt=""></a></figure>
                        <div class="text">
                            <p>{{$asset->slug}}</p>
                        </div>
                        @endforeach
                        <ul class="social-links clearfix">
                            @isset($settings)
                                @forelse($settings as $item)
                                    @if($item->key == 'facebook')
                                        <li><a href="{{$item->value}}"><i class="fab fa-facebook-f"></i></a></li>
                                    @elseif($item->key == 'twitter')
                                        <li><a href="{{$item->value}}"><i class="fab fa-twitter"></i></a></li>
                                    @elseif($item->key == 'instagram')
                                        <li><a href="{{$item->value}}"><i class="fab fa-instagram"></i></a></li>
                                    @elseif($item->key == 'youtube')
                                        <li><a href="{{$item->value}}"><i class="fab fa-youtube"></i></a></li>
                                    @elseif($item->key == 'linkedin')
                                        <li><a href="{{$item->value}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    @endif
                                @empty
                                @endforelse
                            @endisset
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Listing</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget gallery-widget">
                        <div class="widget-title">
                            <h3>Gallery</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="image-list clearfix">
                                @isset($galleries)
                                    @forelse($galleries as $item)
                                    <li><figure class="image-box"><a ><img src="{{env('AWS_URL'). '/galleries'. "/" .$item->image}}" width="90px" height="90px" alt="gallery"></a></figure></li>
                                    @empty
                                    @endforelse
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                @isset($settings)
                                    @forelse($settings as $value)
                                        @if($value->key == 'address')
                                    <li><i class="fas fa-map-marker-alt"></i>{{$value->value}}</li>
                                        @elseif($value->key == 'phone')
                                    <li><i class="fas fa-microphone"></i><a href="tel:{{$value->value}}">{{$value->value}}</a></li>
                                        @elseif($value->key == 'email')
                                    <li><i class="fas fa-envelope"></i><a href="mailto:{{$value->value}}">{{$value->value}}</a></li>
                                        @endif
                                    @empty
                                    @endforelse
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner clearfix">
                <div class="copyright pull-left">
                    <p><a href="">Egypt Metropolitan Travel</a> &copy; 2021 All Right Reserved</p>
                </div>
                <ul class="footer-nav pull-right">
                    <li><a href="http://unlimited-software.com/">Developed By Unlimited Software House</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->
