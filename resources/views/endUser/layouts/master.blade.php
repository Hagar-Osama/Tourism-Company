<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    @include('endUser.layouts.head')
</head>


<!-- page wrapper -->
<body>

<div class="boxed_wrapper">


    <!-- preloader -->
@include('endUser.layouts.loader')
<!-- preloader end -->


    <!-- main header -->
@include('endUser.layouts.main_header')
<!-- main-header end -->

    <!-- Mobile Menu  -->
@include('endUser.layouts.mobile_menu')
<!-- End Mobile Menu -->

@yield('content')


    <!-- main-footer -->
@include('endUser.layouts.main_footer')
<!-- main-footer end -->



    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>
</div>


@include('endUser.layouts.footer_js')

</body><!-- End of .page_wrapper -->
</html>
