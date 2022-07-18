<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="{{route('user.index')}}"><img src="{{URL::asset('assets/images/logo-2.png')}}" alt="Logo" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                @isset($settings)
                    @if(count($settings) > 0)
                @foreach($settings as $key => $value)
                        @if($key == 'address')
                                <li>{{$value->value}}</li>
                        @elseif($key == 'phone')
                             <li><a href="tel:{{$value->value}}">{{$value->value}}</a></li>
                        @elseif($key == 'email')
                              <li><a href="mailto:{{$value->value}}">{{$value->value}}</a></li>
                        @endif
                @endforeach
                    @endif
                @endisset
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->
