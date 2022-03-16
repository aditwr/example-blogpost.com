@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Dashboard</h1>
@endsection

@section('main_content')
    <h3 class="display-5">My Posts</h3>
    <div class="col-lg-6">
        <table class="table table-light table-sm">
            <thead class="table-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($myposts as $post)
                  <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td class="">
                      <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info text-white text-decoration-none">
                          <span data-feather="eye"></span> View
                      </a>
                  </td>
                  </tr>
              @endforeach
  
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $myposts->links() }}
          </div>

          <div class="container my-3">
            <a href="/blog" class="btn btn-primary text-decoration-none text-light">Back to Blog</a>
        </div>
    </div>

    @if( session()->has('notif'))
        <script>
            Swal.fire(
            'Can\'t Access',
            "{{ session('notif') }}",
            'error'
            )
        </script>
    @endif
    <script>
        Swal.fire(
        'Hello kind people!',
        'This application is still under development, I will try to further improve this application',
        'info'
        )
    </script>
@endsection