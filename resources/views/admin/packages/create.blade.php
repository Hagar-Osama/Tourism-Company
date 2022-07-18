@extends('admin.layouts.master')

@section('title')
Packages| Create
@endsection

@section('css')
<link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
<link href="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="container">
        <div class="container my-5 mx-auto">
            @include('partials.session')
            <form class="form-vertical" action="{{route('admin.package.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label class="control-label">Title:</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid fparsley-error parsley-error @enderror" placeholder="Title" value="{{old('title')}}">
                    @error('title')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Location:</label>
                    <input type="text" name="location" class="form-control @error('location') is-invalid fparsley-error parsley-error @enderror" placeholder="Location" value="{{old('location')}}">
                    @error('location')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Price:</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid fparsley-error parsley-error @enderror" placeholder="Price" value="{{old('price')}}">
                    @error('price')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Date:</label>
                    <input type="date" name="start_date" class="form-control @error('start_date') is-invalid fparsley-error parsley-error @enderror" placeholder="Date" value="{{old('start_date')}}">
                    @error('start_date')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>


                <div class="clipboard">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">With textarea</span>
                        </div>
                        <textarea id="editor" class="form-control @error('body') is-invalid fparsley-error parsley-error @enderror" aria-label="With textarea" name="body">{{old('body')}}</textarea>
                    </div>
                    @error('body')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="row row-xs">
                    <div class="parsley-select col-md-12" id="slWrapper">
                        <label class="control-label">Category Name:</label>
                        <select name="category_id" class="form-control select2 @error('category_id') is-invalid fparsley-error parsley-error @enderror" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required>
                            <option label="Choose One"></option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback text-danger" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="control-label">Plan PDF:</label>
                    <input type="file" name="plan_pdf" class="form-control @error('plan_pdf') is-invalid fparsley-error parsley-error @enderror" placeholder="PLAN PDF" value="{{old('plan_pdf')}}">
                    @error('plan_pdf')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="custom-file-container" data-upload-id="myFirstImage">
                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file">
                        <input type="file" class="custom-file-container__custom-file__custom-file-input @error('image') is-invalid fparsley-error parsley-error @enderror" name="image">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control @error('image') is-invalid fparsley-error parsley-error @enderror"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                    @error('image')
                    <span class="invalid-feedback text-danger" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>

                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file">
                        <input type="file" class="custom-file-container__custom-file__custom-file-input @error('images[]') is-invalid fparsley-error parsley-error @enderror" name="images[]" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control  @error('images[]') is-invalid fparsley-error parsley-error @enderror"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                    @error('images[]')
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
<script src="{{asset('assetsAdmin/assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/select2/custom-select2.js')}}"></script>
<script src="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


<script>
    //editor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    //Select
    var ss = $(".basic").select2({
        tags: true,
    });
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage');
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage');
</script>
@endsection
