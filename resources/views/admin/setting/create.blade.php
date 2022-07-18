@extends('admin.layouts.master')

@section('title')
    Settings | Create
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
@endsection

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('admin.setting.store')}}" method="post">
                    @csrf
                    <div class="row row-xs">
                    <div class="parsley-select col-md-12" id="slWrapper">
                        <label class="form-label mt-2">Choose Key <span title="required" class="tx-danger">*</span></label>
                        <select name="key" class="form-control select2 @error('key') is-invalid fparsley-error parsley-error @enderror" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one"  required>
                            <option label="Choose one"></option>
                            <option value="address">Address</option>
                            <option value="phone">Phone</option>
                            <option value="email">Email</option>
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">Youtube</option>
                            <option value="linkedin">Linkedin</option>
                        </select>
                        @error('key')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    </div>

                    <div class="form-group mt-3">
                        <label class="control-label">Value:</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid fparsley-error parsley-error @enderror" placeholder="Value" value="{{old('value')}}">
                        @error('value')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Create" class="btn btn-primary ml-3 mt-3">
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
@endsection


