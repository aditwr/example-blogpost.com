@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Post Categories</h1>
@endsection

@section('main_content')
<h3 class="display-5">Add new Category</h3>

<div class="col-lg-7 bg-light rounded px-3 py-2">
    <form action="/dashboard/categories" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <img class="image-preview img-fluid mb-1" >
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
        </div>

        <button class="btn btn-success" type="submit" >Create</button>
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