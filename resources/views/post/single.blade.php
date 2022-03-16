@extends('layouts.main')
@section('main')
<div class="container-fluid row gx-0 p-0 m-0">
    {{-- include ads one --}}
    @include('partials.ads.ads1')

    {{-- main --}}
    <div class="col-lg-8">

        {{-- breadcrumb [3 values] --}}
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb px-2 px-xl-0">
                <li class="breadcrumb-item"><a href="/blog">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <div class="container">
            <div class="container mb-3"> 
                <div class="row justify-content-center g-0">
                    <div class="col">
                        <div class="container mb-2 mt-0 px-2 px-xl-0">
                            <h2 class="display-4 text-center">{{ $post->title }}</h2>
                            <hr>
                            <p class="my-0 small">{{ $post->created_at->format('l, d M Y') }} - by <a href="/blog/author/{{ $post->user->username }}" class="text-primary">{{ $post->user->username }}</a> - <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                            
                            <p class="small fw-bold">Category : <a class="text-decoration-none rounded-pill text-light badge bg-secondary " href="/blog/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>      
                        </div>
                        
                    </div>
        
                </div>
            </div>

            <div class="d-flex align-items-center overflow-hidden" style="height:400px">
                @if( $post->image )
                    <img src="{{ asset('storage/' . $post->image) }}" alt="hero_image" class="img-fluid w-100">
                @else
                    <img src="https://picsum.photos/1200/800" alt="hero_image" class="img-fluid w-100">
                @endif
            </div>

            <div class="mb-3 row p-0 m-0 gx-0"> 
                <div class=" col-xl-8 row justify-content-center">
                    <div class="col">
                        <div class="container-fluid my-3 ">
                                    
                            <article class="my-3">
                                {{-- deactivate e() / htmlspecialcars function to process tag p in post->body data --}}
                                {!! $post->body !!}
                            </article>
        
                        </div>
                        
                    </div>
        
                </div>
                <div class="col-xl-4 mb-1 mx-0">
                    <div class="container-fluid p-0 py-1 m-0 sticky-xl-top">
                        <div class="my-3 bg-light ps-2 pe-1">
                            <h3 class="h3 fst-italic">Related Post</h3>
                            <div class="mx-0 my-2 p-0">
                                @foreach( $related_posts as $related_post )
                                <div class="bg-white rounded px-1 py-1 row g-0 mb-2" style="height:73px">
                                    <div class="col-3 d-flex align-items-center justify-content-center bg-secondary overflow-hidden" style="height:100%">
                                        <a href="/blog/post/{{ $related_post->slug }}" class="">
                                            @if( $related_post->image )
                                                <img src="{{ asset('storage/' . $related_post->image) }}" alt="hero_image" class="img-fluid w-100">
                                            @else
                                                <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/400/300" alt="hero_image" class="img-fluid w-100">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-9 overflow-hidden ps-1">
                                        <a href="/blog/post/{{ $related_post->slug }}" class="text-decoration-none text-dark">
                                            <p class="fs-6 fw-bold m-0 text-truncate">{{ $related_post->title }}</p>
                                        </a>
                                        <p class="m-0 small text-truncate lh-small">{{ $related_post->excerpt }}</p>
                                        <p class="text-muted m-0 small text-truncate"><small>{{ $related_post->created_at->format('l, d M Y') }} by <a href="/blog/author/{{ $related_post->user->username }}" class="">{{ $related_post->user->username }}</a></small></p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $related_posts->links() }}
                            </div>
                        </div>

                        <div class="py-3 py-lg-4">
                            <h3 class="h3 fst-italic">Contact Us</h3>
                            <a href="https://instagram.com/adityaa.wr" class="d-block text-decoration-none text-dark "><i class="bi bi-instagram"></i> Instagram</a>
                            <a href="https://github.com/adityawahyuramadhan" class="d-block text-decoration-none text-dark "><i class="bi bi-github"></i> Github</a>
                            <a href="https://wa.wizard.id/7efe46" class="d-block text-decoration-none text-dark "><i class="bi bi-whatsapp"></i> Whatsapp</a>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid mt-4 p-2">
            <div class="row bg-light g-0">
                <form action="/blog/post/{{ $post->slug }}/comment/store" method="POST" class="my-3">
                    @csrf
                    <h4 class="ps-2 fs-6 fw-bold">Leave a Reply</h4>
                    <div class="form-floating px-2">
                        <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required ></textarea>
                        <label for="floatingTextarea2" class="text-disabled">Comment</label>
                        <button class="btn btn-secondary mt-2" type="submit">Post Comment</button>
                    </div>
                </form>

                @if( $comments->count() )                    
                    <div class="ps-3 pe-2">
                        <p class="lead">Comments</p>
                        @foreach( $comments as $comment )
                        <div class="bg-white rounded row g-0 p-1 my-2">
                            <div class="col-2 col-md-2 col-xl-1 d-flex justify-content-center">
                                <img src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/000000/external-User-essential-collection-bearicons-glyph-bearicons.png"/>
                            </div>
                            <div class="col-9 ps-1">
                                <a href="/blog/author/{{ $comment->user->username }}" class="text-decoration-none text-dark">
                                    <p class="fs-6 fw-bold my-0">{{ $comment->user->username }}</p>
                                </a>
                                <p class="small my-0" >{{ $comment->body }}</p>
                                <p class="small my-0 text-muted">{{ $comment->created_at->format('l, d M Y : h:m:s') }}</p>
                            </div>

                            @isset( auth()->user()->id )
                                @if( $comment->user->id == auth()->user()->id )
                                    <div class="col-1">
                                        <form action="/blog/post/comment/{{ $comment->id }}/delete" method="post" class="d-flex align-items-center justify-content-center h-100"> 
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" type="submit" onclick="return confirm('are you sure deleting this comment?')"><i class="bi bi-trash-fill"></i> Delete</button>    
                                        </form>
                                    </div>
                                @else 
                                    @can('admin')
                                    <div class="col-1">
                                        <form action="/blog/post/comment/{{ $comment->id }}/delete" method="post" class="d-flex align-items-center justify-content-center h-100"> 
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" type="submit" onclick="return confirm('are you sure deleting this comment?')"><i class="bi bi-trash-fill"></i> Delete</button>    
                                        </form>
                                    </div>
                                    @endcan
                                @endif
                            @endisset

                            

                        </div>
                        @endforeach
                        <div class="">
                            {{ $comments->links() }}
                        </div>
                    </div>
               @endif
            </div>
        </div>
    
        <div class="container text-center my-3">
            <a href="/blog" class="btn btn-primary text-decoration-none text-light">Back to Blog</a>
        </div>
    </div>

    {{-- include ads two --}}
    @include('partials.ads.ads2')

</div>

{{-- notification --}}
@if( session()->has('deny') )
    <script>
        Swal.fire(
        'You must Login.',
        "{{ session('fail') }}",
        'warning'
        )
    </script>
@endif

@if( session()->has('success') )
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
        })
    </script>
@elseif( session()->has('fail') )
    <script>
        Swal.fire(
        'Something Wrong!',
        "{{ session('fail') }}",
        'error'
        )
    </script>
@endif

<script>
    function underDelevopment(){
        Swal.fire(
        'Under Development',
        'Sorry, Post Comment Features is under development.',
        'info'
        )
    }
</script>
@endsection