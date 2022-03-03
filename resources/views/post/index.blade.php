@extends('layouts.main')

@section('main')
<div class="container-fluid row gx-0">
    
    {{-- include ads one --}}
    @include('partials.ads.ads1')

    {{-- main --}}
    <div class="col-lg-9">
        <div class="container">
            <div class="container-fluid row row-cols-1 row-cols-lg-3 gx-0 mb-1 mb-lg-0">
                <div class="col d-flex align-self-end justify-content-end justify-content-lg-start">
                    <a href="/subscribe" class="text-muted">
                        <p class="fs-5 fw-light">Subscribe</p>
                    </a>
                </div>
                <div class="col d-flex justify-content-center align-self-center">
                    <h3 class="h3 text-dark">{{ $title }}</h3>
                </div>
                <div class="col d-flex align-self-center justify-content-center justify-content-lg-end">
                    <form action="/blog" class="d-block w-75">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Post.." value="{{ request()->input('search') }}">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <hr class="my-0">
            <div class="container-fluid shadow-sm bg-light">
                <div class="py-3 row row-cols-1 row-cols-xl-5 justify-content-between px-0">
                    @foreach ($categories as $category)
                        <a href="/blog/category/{{ $category->slug }}" class="text-dark text-muted d-flex justify-content-center" >{{ $category->name }}</a>
                    @endforeach
                </div>
        
            </div>
            
            @empty($hidden_carousel_and_headpost)
                <div id="carouselExampleInterval" class="carousel slide shadow-sm rounded-bottom" data-bs-ride="carousel"
                style="width:100%; max-height: 600px; display:flex; overflow:hidden; align-items:center">
                    <div class="carousel-inner">
            
                        <div class="carousel-item active position-relative" data-bs-interval="10000">
                            <a href="blog/category/{{ $categories[0]->slug }}" class="text-decoration-none opacity-75">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3">{{ $categories[0]->name }}</h3>
                                </div>
                            </a>
                        <img src="/assets/img/post/hero-1.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
            
                        <div class="carousel-item" data-bs-interval="2000">
                            <a href="blog/category/{{ $categories[1]->slug }}" class="text-decoration-none opacity-75">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3">{{ $categories[1]->name }}</h3>
                                </div>
                            </a>
                        <img src="/assets/img/post/hero-2.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
            
                        <div class="carousel-item">
                            <a href="blog/category/{{ $categories[2]->slug }}" class="text-decoration-none opacity-75">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3">{{ $categories[2]->name }}</h3>
                                </div>
                            </a>
                        <img src="/assets/img/post/hero-3.jpg" class="d-block w-100 img-fluid" alt="...">
                        </div>
            
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endempty

            <div class="row row-cols-1 row-cols-lg-2 gx-0 mt-3">
                <div class="col-lg-9 mx-0 mb-1">
                    <div class="py-2">
                        <h3 class="h3 fst-italic">@if(request()->input('search')) Result Post @else Recent Post @endif</h3>
                        <hr>
                    </div>
                    @if( $posts->count() )
                        @empty($hidden_carousel_and_headpost)
                            <div class="row row-cols-1 row-cols-lg-3 gx-0">
                                <div class="col">
                                    <div class="card pb-4 " style="min-height:500px">
                                        <img src="/assets/img/post/post-img.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title m-0">{{ $posts[0]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[0]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted m-0">by {{ $posts[0]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[0]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge bg-secondary">{{ $posts[0]->category->name }}</p>
                                            </a>
                                            <p class="card-text">{{ $posts[0]->excerpt }}</p>
                                            <a href="blog/post/{{ $posts[0]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card pb-4 " style="min-height:500px">
                                        <img src="/assets/img/post/post-img.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[1]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title m-0">{{ $posts[1]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[1]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted m-0">by {{ $posts[1]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[1]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge bg-secondary">{{ $posts[1]->category->name }}</p>
                                            </a>
                                            <p class="card-text">{{ $posts[1]->excerpt }}</p>
                                            <a href="blog/post/{{ $posts[1]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card pb-4 " style="min-height:500px">
                                        <img src="/assets/img/post/post-img.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[2]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title m-0">{{ $posts[2]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[2]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted m-0">by {{ $posts[2]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[2]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge bg-secondary">{{ $posts[2]->category->name }}</p>
                                            </a>
                                            <p class="card-text">{{ $posts[2]->excerpt }}</p>
                                            <a href="blog/post/{{ $posts[2]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endempty

                        @foreach($posts as $post)
                            <div class="">
                                <div class="card mb-3 border-end-0 border-start-0 bg-light">
                                    <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center overflow-hidden">
                                        <img src="/assets/img/post/post-img.jpg" class="img-fluid rounded-start" style="min-height:100%;" alt="post-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <a href="/blog/post/{{ $post->slug }}" class="text-decoration-none text-dark">
                                            <h5 class="card-title h3">{{ $post->title }}</h5>
                                        </a>
                                        <p class="text-muted my-0">{{ $post->created_at->format('l, d M Y') }} by <a href="/blog/author/{{ $post->user->username }}">{{ $post->user->username }}</a></p>
                                        <a href="/blog/category/{{ $post->category->slug }}" class="my-0">
                                            <p class="badge bg-secondary">{{ $post->category->name }}</p>
                                        </a>
                                        <p class="card-text mb-0">{{ $post->excerpt }}...</p>
                                        <p class="card-text my-0"><small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="display-5 text-center">No post found.</p>
                    @endif
                </div>

                <div class="col-lg-3 ps-lg-3">
                    <div class="sticky-top">
                        <div class="bg-light rounded p-3 px-lg-3 py-lg-4 my-3 my-lg-0">
                            <h3 class="h3 fst-italic">About</h3>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda optio sit, perferendis voluptatem facere voluptate debitis amet tempore ratione aperiam placeat deserunt non labore quasi quisquam architecto, ducimus aut qui?
                        </div>
                        <div class="px-lg-3 py-3 py-lg-4 px-3 px-lg-0" >
                            <h3 class="h3 fst-italic">Archieve</h3>
                            <a href="#" class="d-block">Februari 2022</a>
                            <a href="#" class="d-block">Januari 2022</a>
                            <a href="#" class="d-block">Desember 2021</a>
                            <a href="#" class="d-block">November 2021</a>
                            <a href="#" class="d-block">Oktober 2021</a>
                            <a href="#" class="d-block">Agustus 2021</a>
                            <a href="#" class="d-block">Juli 2021</a>
                            <a href="#" class="d-block">Juni 2021</a>
                            <a href="#" class="d-block">Mei 2021</a>
                            <a href="#" class="d-block">April 2021</a>
                        </div>
                        <div class="px-lg-3 py-3 py-lg-4 px-3 px-lg-0">
                            <h3 class="h3 fst-italic">Contact Us</h3>
                            <a href="#" class="d-block">Instagram</a>
                            <a href="#" class="d-block">Facebook</a>
                            <a href="#" class="d-block">Twitter</a>
                        </div>

                    </div>
                </div>

            </div>

        
        </div>
    </div>

    {{-- inlcude ads two --}}
    @include('partials.ads.ads2')

    {{-- paginations link --}}
    <div class="d-flex justify-content-center mt-5">
        <div class="d-flex-justify-items-center">{{ $posts->links() }}</div>
    </div>

</div>
@endsection