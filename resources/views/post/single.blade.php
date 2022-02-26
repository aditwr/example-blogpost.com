@extends('layouts.main')

@section('main')
<div class="container-fluid row gx-0 p-0 m-0">
    {{-- include ads one --}}
    @include('partials.ads.ads1')

    {{-- main --}}
    <div class="col-lg-7">

        {{-- breadcrumb [3 values] --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/blog">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <div class="container bg-light">
            
            <div class="container mb-3"> 
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="container my-3 bg-light">
                            <h2 class="display-4 text-center">{{ $post->title }}</h2>
                            <hr>
                            <p class="my-0">{{ $post->created_at->format('l, d M Y') }} - by <a href="/posts?author={{ $post->user->username }}" class="text-primary">{{ $post->user->name }}</a> - <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                            
                            <p class="">Category : <a class="text-decoration-none text-light badge bg-secondary " href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                            <div class="d-flex align-items-center overflow-hidden" style="height:400px">
                                <img src="/assets/img/post/hero-1.jpg" alt="hero_image" class="img-fluid w-100">
                            </div>
        
                            <article class="my-3">
                                {{-- deactivate e() / htmlspecialcars function to process tag p in post->body data --}}
                                {!! $post->body !!}
                            </article>
        
                        </div>
                        
                    </div>
        
                </div>
            </div>

        </div>

        <div class="container-fluid mt-4 p-2">
            <div class="row bg-light">
                <form action="" class="my-3">
                    <h4>Leave a Reply</h4>
                    <div class="form-floating px-2">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2" class="text-disabled">Comments</label>
                        <button class="btn btn-secondary mt-2" type="submit">Post Comment</button>
                    </div>
                </form>
               
            </div>
        </div>
    
        <div class="container text-center my-3">
            <a href="/posts" class="btn btn-primary text-decoration-none text-light">Back to Blog page</a>
        </div>
    </div>

    {{-- include ads two --}}
    @include('partials.ads.ads2')

</div>
@endsection