@extends('layouts.main-nofooter')

@section('main')
<head>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
        html,
        body {
        height: 100%;
        }

        body {
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }

        .form-signin .checkbox {
        font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
      </style>
</head>
<div class="row justify-content-center">
    <main class="form-signin col-8 col-md-5 col-lg-3">
        {{-- show notification --}}
        @if( session('registration_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('registration_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif( session('login_failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('login_failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-center mb-3 mt-5">
            <img src="https://img.icons8.com/external-bearicons-gradient-bearicons/64/000000/external-login-call-to-action-bearicons-gradient-bearicons-1.png" class="img-fluid w-25"/>
        </div>
        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" required
                value="{{ request()->old('username') }}">
                <label for="floatingInput">Username</label>
                @error('username')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <small class="d-block mt-3 text-sm-center">Don't have an account? <a href="/register" class="text-decoration-none text-white badge bg-success">Register now</a></small>
            <p class="mt-5 mb-3 text-muted">&copy; 2022, <a href="https://instagram.com/adityawr388">adityawr388</a></p>
        </form>
    </main>

</div>
  
@endsection