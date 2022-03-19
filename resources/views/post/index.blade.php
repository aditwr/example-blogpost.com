@extends('layouts.main')

@section('main')
<div class="container-fluid row gx-0">
    
    {{-- include ads one --}}
    @include('partials.ads.ads1')

    {{-- main --}}
    <div class="col-lg-9">
        <div class="container">
            <div class="container-fluid row row-cols-1 row-cols-lg-3 gx-0 mb-1 mb-lg-0 mt-2">
                <div class="col-xl d-flex align-items-center justify-content-end justify-content-lg-start">
                    {{-- <a href="https://instagram.com/adityaa.wr" class="text-muted text-decoration-none">
                        <p class="fs-5 ">Subscribe or Follow</p>
                    </a> --}}
                    <a href="https://instagram.com/adityaa.wr" class="d-block text-decoration-none text-dark fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="https://github.com/adityawahyuramadhan" class="d-block text-decoration-none text-dark fs-5 mx-2"><i class="bi bi-github"></i></a>
                    <a href="https://wa.wizard.id/7efe46" class="d-block text-decoration-none text-dark fs-5 me-2 me-xl-0"><i class="bi bi-whatsapp"></i></a>
                </div>
                <div class="col col-xl-6 d-flex justify-content-center align-self-center">
                    <h3 class="display-6 text-dark">{{ $title }}</h3>
                </div>
                <div class="col-xl d-flex align-self-center justify-content-center justify-content-lg-end ps-0">
                    <form action="/blog/search" class="d-block" style="width: 90%" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Post.." value="{{ request()->input('search') }}">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            {{-- <hr class="my-0"> --}}
            <div class="container-fluid shadow-sm bg-light py-0">
                <div class="row row-cols-1 row-cols-xl-5 justify-content-between px-0 py-2">
                    @foreach ($categories as $category)
                        <a href="/blog/category/{{ $category->slug }}" class="text-dark text-muted d-flex justify-content-center" >
                            <i class="bi bi-bookmark-fill me-1"></i>{{ $category->name }}
                        </a>
                    @endforeach
                </div>  
            </div>
            {{-- Category Hero --}}
            @empty($hidden_carousel_and_headpost)
                <div id="carouselExampleInterval" class="carousel slide shadow-sm " data-bs-ride="carousel"
                style="width:100%; max-height: 500px; display:flex; overflow:hidden; align-items:center">
                    <div class="carousel-inner">
                    @if( $categories->count() >= 3 )
                        <div class="carousel-item active position-relative h-75 h-lg-100" style="height: 500px" data-bs-interval="10000">
                            
                            @if( $categories[0]->image)
                                {{-- asset helper refer to public directory on root --}}
                                <img src="{{ asset( 'storage/'. $categories[0]->image ) }}" class="d-block w-100 img-fluid" alt="hero-image">
                            @else
                                <img src="/assets/img/category/web-programming.jpg" class="d-block w-100 img-fluid" alt="hero-image">
                            @endif
                            <a href="blog/category/{{ $categories[0]->slug }}" class="text-decoration-none opacity-75 h-100">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 100%; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3 fw-bold">{{ $categories[0]->name }}</h3>
                                </div>
                            </a>
                        </div>
            
                        <div class="carousel-item h-75 h-lg-100" style="height: 500px" data-bs-interval="2000">
                            <a href="blog/category/{{ $categories[1]->slug }}" class="text-decoration-none opacity-75 h-100">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 100%; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3 fw-bold">{{ $categories[1]->name }}</h3>
                                </div>
                            </a>
                            @if( $categories[1]->image)
                                {{-- asset helper refer to public directory on root --}}
                                <img src="{{ asset( 'storage/'. $categories[1]->image ) }}" class="d-block w-100 img-fluid" alt="hero-image">
                            @else
                                <img src="/assets/img/category/web-design.jpg" class="d-block w-100 img-fluid" alt="hero-image">
                            @endif
                        </div>
            
                        <div class="carousel-item h-75 h-lg-100" style="height: 500px">
                            <a href="blog/category/{{ $categories[2]->slug }}" class="text-decoration-none opacity-75 h-100">
                                <div class="position-absolute text-white" 
                                style="z-index: 10; display:flex; height: 100%; align-items:center; top:-10%;">
                                    <h3 class="display-4 bg-dark px-5 py-3 fw-bold">{{ $categories[2]->name }}</h3>
                                </div>
                            </a>
                            @if( $categories[2]->image)
                                {{-- asset helper refer to public directory on root --}}
                                <img src="{{ asset( 'storage/'. $categories[2]->image ) }}" class="d-block w-100 img-fluid" alt="hero-image">
                            @else
                                <img src="/assets/img/category/software-development.jpg" class="d-block w-100 img-fluid" alt="hero-image">
                            @endif
                        </div>
                    @endif
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
                        <h3 class="h3 fst-italic ps-3 ps-lg-0 opacity-75">
                            @empty($hidden_carousel_and_headpost)
                                Recent Post
                            @else
                                Result Post
                            @endempty
                        </h3>
                        <hr>
                    </div>
                    
                    @if( $posts->count() )
                        {{-- Top Posts --}}
                        @empty($hidden_carousel_and_headpost)
                            @isset($posts[3])
                            <div class="row row-cols-1 row-cols-lg-4 gx-1 mb-3 d-none d-lg-flex">
                                <div class="col">
                                    <div class="card pb-3 shadow-sm card-img-top" style="min-height:400px">
                                        <div class="d-flex align-items-center overflow-hidden" style="height:150px">
                                            @if( $posts[0]->image )
                                                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="hero_image" class="img-fluid w-100 " style="min-height:100%;">
                                            @else
                                                <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/400/300" alt="hero_image" class="img-fluid w-100" style="min-height:100%;">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title fs-6 m-0">{{ $posts[0]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[0]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted small m-0"><i class="bi bi-person-fill"></i> by {{ $posts[0]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[0]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge rounded-pill bg-dark"><i class="bi bi-bookmark-fill"></i> {{ $posts[0]->category->name }}</p>
                                            </a>
                                            <p class="card-text small opacity-75">{{ $posts[0]->excerpt }}..</p>
                                            <a href="blog/post/{{ $posts[0]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card pb-3 shadow-sm " style="min-height:400px">
                                        <div class="d-flex align-items-center overflow-hidden" style="height:150px">
                                            @if( $posts[1]->image )
                                                <img src="{{ asset('storage/' . $posts[1]->image) }}" alt="hero_image" class="img-fluid w-100 " style="min-height:100%;">
                                            @else
                                                <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/400/300" alt="hero_image" class="img-fluid w-100" style="min-height:100%;">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[1]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title fs-6 m-0">{{ $posts[1]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[1]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted small m-0"><i class="bi bi-person-fill"></i> by {{ $posts[1]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[1]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge rounded-pill bg-dark"><i class="bi bi-bookmark-fill"></i> {{ $posts[1]->category->name }}</p>
                                            </a>
                                            <p class="card-text small opacity-75">{{ $posts[1]->excerpt }}..</p>
                                            <a href="blog/post/{{ $posts[1]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card pb-3 shadow-sm " style="min-height:400px">
                                        <div class="d-flex align-items-center overflow-hidden" style="height:150px">
                                            @if( $posts[2]->image )
                                                <img src="{{ asset('storage/' . $posts[2]->image) }}" alt="hero_image" class="img-fluid w-100 " style="min-height:100%;">
                                            @else
                                                <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/400/300" alt="hero_image" class="img-fluid w-100" style="min-height:100%;">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[2]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title fs-6 m-0">{{ $posts[2]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[2]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted small m-0"><i class="bi bi-person-fill"></i> by {{ $posts[2]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[2]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge rounded-pill bg-dark"><i class="bi bi-bookmark-fill"></i> {{ $posts[2]->category->name }}</p>
                                            </a>
                                            <p class="card-text small opacity-75">{{ $posts[2]->excerpt }}..</p>
                                            <a href="blog/post/{{ $posts[2]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card pb-3 shadow-sm " style="min-height:400px">
                                        <div class="d-flex align-items-center overflow-hidden" style="height:150px">
                                            @if( $posts[3]->image )
                                                <img src="{{ asset('storage/' . $posts[3]->image) }}" alt="hero_image" class="img-fluid w-100 " style="min-height:100%;">
                                            @else
                                                <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/600/400" alt="hero_image" class="img-fluid w-100" style="min-height:100%;">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <a href="blog/post/{{ $posts[3]->slug }}" class="text-decoration-none text-dark">
                                                <h5 class="card-title fs-6 m-0">{{ $posts[3]->title }}</h5>
                                            </a>
                                            <a href="/blog/author/{{ $posts[3]->user->username }}" class="text-decoration-none">
                                                <p class="text-muted small m-0"><i class="bi bi-person-fill"></i> by {{ $posts[3]->user->username }}</p>
                                            </a>
                                            <a href="/blog/category/{{ $posts[3]->category->slug }}" class="text-decoration-none text-light">
                                                <p class="badge rounded-pill bg-dark"><i class="bi bi-bookmark-fill"></i> {{ $posts[3]->category->name }}</p>
                                            </a>
                                            <p class="card-text small opacity-75">{{ $posts[3]->excerpt }}..</p>
                                            <a href="blog/post/{{ $posts[3]->slug }}" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endisset
                        @endempty

                        {{-- Posts --}}
                        @foreach($posts as $post)
                            <div class="mx-3 mx-lg-0 my-3 my-lg-2">
                                <div class="card border-end-0 border-start-0 bg-light pb-2 pb-lg-0">
                                    <div class="row g-0 p-0">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center overflow-hidden p-0 g-0">
                                            <div class="d-flex align-items-center justify-content-center overflow-hidden p-0 m-0 bg-secondary w-100" style="height:180px">
                                                @if( $post->image )
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt="hero_image" class="img-fluid w-100" style="min-height:100%;">
                                                @else
                                                    <img src="https://picsum.photos/id/{{ mt_rand(1, 500) }}/600/300" class="img-fluid w-100 rounded-start" style="min-height:100%;" alt="post-image">
                                                @endif
                                            </div>    
                                        </div>
                                        <div class="col-md-8 py-1">
                                            <div class="card-body py-0">
                                                <a href="/blog/post/{{ $post->slug }}" class="text-decoration-none text-dark my-0">
                                                    <h5 class="card-title my-0">{{ $post->title }}</h5>
                                                </a>
                                                <p class="text-muted my-0 small"><i class="bi bi-clock-fill text-dark"></i> {{ $post->created_at->format('l, d M Y') }} by <a href="/blog/author/{{ $post->user->username }}" class="badge bg-info rounded-pill text-dark text-decoration-none opacity-75">
                                                    <i class="bi bi-person-fill"></i> {{ $post->user->username }}</a></p>
                                                <a href="/blog/category/{{ $post->category->slug }}" class="mt-0 mb-0 text-decoration-none text-dark">
                                                    <i class="bi bi-bookmark-fill"></i> <p class="badge rounded-pill bg-dark opacity-75 my-0">{{ $post->category->name }}</p>
                                                </a>
                                                <p class="card-text mb-0 mt-1 text-truncate">{{ $post->excerpt }}</p>
                                                <p class="card-text my-0"><small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small></p>
                                                <a href="/blog/post/{{ $post->slug }}" class="mb-0 mt-1 btn btn-success text-light"><i class="bi bi-eye-fill"></i> Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach

                        {{-- paginations link --}}
                        <div class="d-flex justify-content-center mt-5 ">
                            <div class="d-flex-justify-items-center">{{ $posts->links() }}</div>
                        </div>

                    @else
                        <p class="display-5 text-center">No post found.</p>
                    @endif
                </div>

                <div class="col-lg-3 ps-lg-3">
                    <div class="sticky-top pt-2">
                        <div class="bg-light rounded p-3 px-lg-3 py-lg-4 my-3 my-lg-0">
                            <h3 class="h3 fst-italic">About</h3>
                            <p class="opacity-75">This is a Simple Blog Aplication that I've built with Laravel 8. I've put dummy Post data in this website. However, You can register new Account and Login to manage your own Post.</p>
                            <p class="">That's it, have a nice day!</p>
                        </div>
                        <div class="px-lg-3 py-3 py-lg-4 px-3 px-lg-0" >
                            <h3 class="h3 fst-italic">Archieve</h3>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Februari 2022</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Januari 2022</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Desember 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">November 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Oktober 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Agustus 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Juli 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Juni 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">Mei 2021</a>
                            <a onclick="alert('Hi!, Thanks for clicking, you are really kind, unfortunately I haven\'t made this feature yet. ')" href="#" class="d-block text-info text-decoration-none">April 2021</a>
                        </div>
                        <div class="px-lg-3 py-3 py-lg-4 px-3 px-lg-0">
                            <h3 class="h3 fst-italic">Contact Us</h3>
                            <a href="https://instagram.com/adityaa.wr" class="d-block text-decoration-none text-dark "><i class="bi bi-instagram"></i> Instagram</a>
                            <a href="https://github.com/adityawahyuramadhan" class="d-block text-decoration-none text-dark "><i class="bi bi-github"></i> Github</a>
                            <a href="https://wa.wizard.id/7efe46" class="d-block text-decoration-none text-dark "><i class="bi bi-whatsapp"></i> Whatsapp</a>
                        </div>

                    </div>
                </div>

            </div>

        
        </div>
    </div>
    {{-- inlcude ads two --}}
    @include('partials.ads.ads2')
</div>
<div class="d-flex justify-content-center my-2">
    <a href="#" class="text-decoration-none text-success fs-4 opacity-75"><i class="bi bi-arrow-up-square-fill"></i></a>
</div>
@endsection