@extends('layouts.main-nonav-nofooter')

@section('main')

<nav class="navbar navbar-expand-lg navbar-dark p-0 position-absolute w-100" style="z-index: 10">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/favicon.svg" alt="ex" width="30px" class=""> Blog
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row container-fluid gx-0" id="navbarSupportedContent">
          <div class="col-lg-10 d-flex justify-content-center justify-content-lg-end">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : ''  }}" href="/about">About</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-2 d-flex justify-content-center justify-content-lg-end gx-0">
            @auth
              <ul class="navbar-nav mx-auto ms-lg-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark position-absolute" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log out</button>
                        </form>
                    </li>
                </ul>
                </li>
            </ul>
            @else    
              @if(request()->url() == 'http://example-blogpost.com.test/login' || request()->url() == 'https://example-blogpost.com.test/login')
                <a href="/register" class="btn btn-success">Sign Up</a>
              @else
                <a href="/login" class="btn btn-light text-dark-50 fw-bolder">Sign In</a>
              @endif
            @endauth

          </div>
      </div>
    </div>
</nav>

<main class="d-flex align-items-center justify-content-center position-absolute" 
style="bottom: 0; top: 0; left: 0; right: 0; background-image: url('assets/img/home-background.jpg'); 
background-position: center top">
    <div class="text-center text-white">
        <h1><span id="typed"></span></h1>
        <div class="d-flex justify-content-center px-lg-5 mx-lg-5">
            <p class="lead px-4 px-lg-5 mx-lg-5">Thanks for visiting my website. This is a simple Blog Application I've made with Laravel 8. This application provides many blog application features, such as reading, writing, editing, and deleting blog posts. I'll very be glad if you like to dig deeper into this website.</p>    
        </div>
        <p class="lead">
            <a href="/blog" class="btn btn-lg btn-secondary fw-bold border-white bg-white text-dark">View Blog</a>
        </p>

    </div>

</main>

<footer class="position-absolute w-100" style="bottom: 10px">
    <p class="text-center text-white text-muted">Made with <span style="color: #e25555;">&#9829;</span> by <a class="text-white text-decoration-none" href="http://instagram.com/adityaa.wr">@adityaa.wr</a> </p>
</footer>


{{-- cdn for typed.js --}}
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script type="text/javascript">
    Swal.fire({
      title: "Hi!, so glad to see you.",
      text: 'Hi, I am Aditya, a newbie on Web Development. Thanks for visiting this website, you\'re very kind and generous :)',
      imageUrl: "{{ asset('/assets/img/aditya.profile.png') }}",
      imageWidth: 200,
      imageHeight: 200,
      imageAlt: 'Custom image',
      confirmButtonText: 'You\'re welcome',
    })
    
    // auto typing animations with typed.js
    var typed = new Typed("#typed", {
        strings: ['Simple Blog Application', 'Made with Laravel 8'],
        typeSpeed: 120,
        delaySpeed: 200,
        loop: true
    });
</script>

@endsection