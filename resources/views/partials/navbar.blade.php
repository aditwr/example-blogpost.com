<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/favicon.svg" alt="ex" width="40px" class=""> Blog
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row container-fluid" id="navbarSupportedContent">
          <div class="col-lg-10 d-flex justify-content-end">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ ($active == 'home')? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active == 'blog')? 'active' : '' }}" href="/blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active == 'about')? 'active' : '' }}" href="/about">About</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-2 d-flex justify-content-end">
            <a href="/signin" class="btn btn-primary">Sign In</a>
          </div>
      </div>
    </div>
  </nav>