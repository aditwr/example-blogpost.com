<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/favicon.svg" alt="ex" width="40px" class=""> Blog
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
                <a href="/login" class="btn btn-primary">Sign In</a>
              @endif
            @endauth

          </div>
      </div>
    </div>
  </nav>