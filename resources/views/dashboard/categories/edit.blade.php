@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Post Categories</h1>
@endsection

@section('main_content')
<h3 class="display-5">Rename Category</h3>

<div class="col-lg-7 bg-light rounded px-3 py-2">

    @if( session()->has('fail') )
    <div class="alert alert-danger alert-dismissible fade show col-lg-7" role="alert">
      {{ session('fail') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <img class="image-preview img-fluid mb-1" >
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
        </div>

        <button class="btn btn-warning" type="submit" >Rename</button>
    </form>
</div>

<script>
    function previewImage(){
        const inputImage = document.querySelector('#image');
        const imageTarget = document.querySelector('.image-preview');

        imageTarget.style.display = 'block';
        imageTarget.src = URL.createObjectURL(inputImage.files[0]);
    }
</script>


@endsection