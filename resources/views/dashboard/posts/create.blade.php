@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Create New Post</h1>
@endsection

@section('main_content')
    <div class="col-md-8 col-lg-6">
        <form method="POST" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control" id="slug" >
            </div>
            
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select name="category_id" class="form-select " required  >
                  @foreach( $categories as $category )
                    @if( old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                {{-- Integrated form Trix Editor --}}
                <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>

            </div>
              

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display:none;
        }
    </style>
@endsection