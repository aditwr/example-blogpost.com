@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Show Post</h1>
@endsection

@section('main_content')
<head>
    <style>
        @media only screen and (max-width: 600px) {
    .hero-img {
        height: 300px !important;
    }
    }
    </style>
</head>
    
<div class="container-fluid">
            
    <div class="container mb-3 row gx-0 px-0"> 
        <div class="col-xl-10 row justify-content-start m-0 px-0 gx-0">
        
                <div class="container bg-light px-0">
                    
                    <div class="container mb-3"> 
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="container my-3 bg-light">
                                    <h2 class="display-4 text-center">{{ $post->title }}</h2>
                                    <hr>
                                    <p class="my-0">{{ $post->created_at->format('l, d M Y') }} - by <a href="/blog/author/{{ $post->user->username }}" class="text-primary">{{ $post->user->name }}</a> - <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                                    
                                    <p class="">Category : <a class="text-decoration-none text-light badge bg-secondary " href="/blog/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>      
                                </div>
                                
                            </div>
                
                        </div>
                    </div>
        
                    <div class="d-flex align-items-center overflow-hidden hero-img" style="height:500px">
                        @if( $post->image )
                            <img src="{{ asset('storage/' . $post->image) }}" alt="hero_image" class="img-fluid w-100">
                        @else
                            <img src="/assets/img/post/hero-1.jpg" alt="hero_image" class="img-fluid w-100">
                        @endif
                    </div>
        
                    <div class="container mb-3"> 
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="container my-3 bg-light">
                                            
                                    <article class="my-3">
                                        {{-- deactivate e() / htmlspecialcars function to process tag p in post->body data --}}
                                        {!! $post->body !!}
                                    </article>
                
                                </div>
                                
                            </div>
                
                        </div>
                    </div>
        
                </div>
        
        </div>

        {{-- side menu --}}
        <div class="col-xl-2">
            <div class="bg-light rounded px-3 pb-3 pt-3 mx-0 mx-sm-2 my-2 my-sm-2">
                <p class="lead">Take action for this Post</p>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-0 mb-xl-2"><span data-feather="edit" ></span> Edit this Post</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline"> 
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('are you sure?')"><span data-feather="trash-2"></span> Delete this Post</button>
                  </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <a href="/dashboard/posts" class="btn btn-primary"><span data-feather="arrow-left" ></span> Back to My Posts</a>
    </div>

    
</div>



@endsection