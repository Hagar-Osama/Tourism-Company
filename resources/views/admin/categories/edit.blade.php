@extends('admin.layouts.master')

@section('title')
    Categories | Edit
@endsection


@section('content')
    <!-- Start Card -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                <form class="form-vertical" action="{{route('admin.category.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <div class="form-group mb-4">
                        <label class="control-label">Category Name:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror" placeholder="Category Name" value="{{$category->name}}">
                        @error('name')
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

