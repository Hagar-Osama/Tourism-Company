
@extends('admin.layouts.master')

@section('title')
    Settings | Update
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
                <form class="form-vertical" action="{{route('admin.setting.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="setting_id" value="{{$setting->id}}">
                    <div class="row row-xs">
                        <div class="parsley-select col-md-12" id="slWrapper">
                            <label class="form-label mt-2">Choose Key <span title="required" class="tx-danger">*</span></label>
                            <select name="key" class="form-control select2 @error('key') is-invalid fparsley-error parsley-error @enderror" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required="">
                                <option label="Choose one"></option>
                                <option value="address" @if($setting->key == 'address') selected @else "" @endif >Address</option>
                                <option value="phone" @if($setting->key == 'phone') selected @else "" @endif >Phone</option>
                                <option value="email" @if($setting->key == 'email') selected @else "" @endif >Email</option>
                                <option value="facebook" @if($setting->key == 'facebook') selected @else "" @endif >Facebook</option>
                                <option value="twitter" @if($setting->key == 'twitter') selected @else "" @endif >Twitter</option>
                                <option value="youtube" @if($setting->key == 'youtube') selected @else "" @endif >Youtube</option>
                                <option value="instagram" @if($setting->key == 'instagram') selected @else "" @endif >Instagram</option>
                                <option value="instagram" @if($setting->key == 'linkedin') selected @else "" @endif >Linkedin</option>
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
                        <input type="text" name="value" class="form-control @error('value') is-invalid fparsley-error parsley-error @enderror"  value="{{$setting->value}}">
                        @error('value')
                        <span class="invalid-feedback text-danger" role="alert">
                          <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection

