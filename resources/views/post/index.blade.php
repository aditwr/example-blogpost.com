@extends('layouts.main')

@section('main')
<div class="container-fluid row gx-0">
    <div class="col">
        <div class="bg-secondary me-lg-4 my-1 d-flex vh-100">
            <p class="m-auto display-4 text-white">Ads</p>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="container">
            <div class="container-fluid row row-cols-1 row-cols-lg-3 gx-0 mb-1 mb-lg-0">
                <div class="col d-flex align-self-end justify-content-end justify-content-lg-start">
                    <a href="/subscribe" class="text-muted">
                        <p class="fs-5">Subscribe</p>
                    </a>
                </div>
                <div class="col d-flex justify-content-center align-self-center">
                    <h3 class="h3 text-dark">All Post</h3>
                </div>
                <div class="col d-flex align-self-center justify-content-center justify-content-lg-end">
                    <form action="/search" class="d-block w-75">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search Post..">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <hr class="my-0">
            <div class="container-fluid shadow-sm bg-light">
                <div class="py-3 row justify-content-between px-0">
                    <a href="/category" class="text-dark text-muted col-lg-2 d-flex justify-content-center" >Web Programming</a>
                    <a href="/category" class="text-dark text-muted col-lg-2 d-flex justify-content-center" >Web Design</a>
                    <a href="/category" class="text-dark text-muted col-lg-2 d-flex justify-content-center" >App Development</a>
                    <a href="/category" class="text-dark text-muted col-lg-2 d-flex justify-content-center" >Software Development</a>
                    <a href="/category" class="text-dark text-muted col-lg-2 d-flex justify-content-center" >Game Development</a>
                </div>
        
            </div>
        
        
            <div id="carouselExampleInterval" class="carousel slide shadow-sm rounded-bottom" data-bs-ride="carousel"
            style="width:100%; max-height: 600px; display:flex; overflow:hidden; align-items:center">
                <div class="carousel-inner">
        
                    <div class="carousel-item active position-relative" data-bs-interval="10000">
                        <a href="/blog/post" class="text-decoration-none opacity-75">
                            <div class="position-absolute text-white" 
                            style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                <h3 class="display-4 bg-dark px-5 py-3">Web Programming</h3>
                            </div>
                        </a>
                    <img src="assets/img/post/hero-1.jpg" class="d-block w-100 img-fluid" alt="...">
                    </div>
        
                    <div class="carousel-item" data-bs-interval="2000">
                        <a href="/blog/post" class="text-decoration-none opacity-75">
                            <div class="position-absolute text-white" 
                            style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                <h3 class="display-4 bg-dark px-5 py-3">App Development</h3>
                            </div>
                        </a>
                    <img src="assets/img/post/hero-2.jpg" class="d-block w-100 img-fluid" alt="...">
                    </div>
        
                    <div class="carousel-item">
                        <a href="/blog/post" class="text-decoration-none opacity-75">
                            <div class="position-absolute text-white" 
                            style="z-index: 10; display:flex; height: 600px; align-items:center; top:-10%;">
                                <h3 class="display-4 bg-dark px-5 py-3">Software Development</h3>
                            </div>
                        </a>
                    <img src="assets/img/post/hero-3.jpg" class="d-block w-100 img-fluid" alt="...">
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
        
            <div class="container mx-0 mt-3 mb-1">
                <div class="row row-cols-1 row-cols-lg-3 g-3">
                    <div class="col">
                        <div class="card pb-4">
                            <img src="assets/img/post/post-img.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title m-0">Post Title</h5>
                              <p class="text-muted m-0">by Author's Name</p>
                              <p class="badge bg-secondary">Category</p>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="d-block position-absolute fixed-bottom btn btn-success rounded-0 rounded-bottom">Read more</a>
                            </div>
                          </div>
                    </div>
                    
                </div>
            </div>
        
        </div>
    </div>
    <div class="col">
        <div class="bg-secondary ms-lg-4 my-1 d-flex vh-100">
            <p class="m-auto display-4 text-white">Ads</p>
        </div>
    </div>
</div>
@endsection