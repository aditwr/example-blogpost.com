@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Edit Post</h1>
@endsection

@section('main_content')
    <div class="col-md-8 col-lg-6 mb-5">
        <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data" >
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ old('title', $post->title) }}">
              <div class="form-text">Post slug is generated automatically, ex: your-post-title-by-{username}</div>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-6">
              <label for="category" class="form-label">Category</label>
              <select name="category_id" class="form-select" required  >
                  @foreach( $categories as $category )
                    @if( old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              
            </div>

            <div class="mb-3 col-lg-7">
                <label for="image" class="form-label">Post Image</label>
                {{-- send the old image pathname, use it to delete image --}}
                <input type="hidden" name="oldImage" value="{{ $post->image }}" >
                @if( $post->image )
                    <img src="{{ asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-1 d-block">
                @else
                    <img class="img-preview img-fluid mb-1">
                @endif
                <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                onchange="previewImage()" >
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                {{-- Integrated form Trix Editor --}}
                <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>

            </div>
              

            <button type="submit" class="btn btn-primary">Update Post</button>
          </form>
    </div>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display:none;
        }
    </style>
    <script>
        function previewImage(){
            const imageInput = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            // instantiated FileReader Class
            const oFReader = new FileReader();
            // call method readAsDataURL, parameter: image from input
            oFReader.readAsDataURL(imageInput.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection