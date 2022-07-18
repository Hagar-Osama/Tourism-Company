<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assetsAdmin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('assetsAdmin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assetsAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assetsAdmin/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('assetsAdmin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
@yield('js')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('assetsAdmin/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assetsAdmin/assets/js/dashboard/dash_1.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

<script src="{{asset('assetsAdmin/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>


