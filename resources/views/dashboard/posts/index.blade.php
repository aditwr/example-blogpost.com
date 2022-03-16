@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Manage Posts</h1>
@endsection

@section('main_content')

    @if( session()->has('success') )
    <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive  col-lg-10">
        <a href="/dashboard/posts/create" class="btn btn-success">Create New Post</a>
        <table class="table table-light table-sm mt-2">
          <thead class="table-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Created at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->created_at->format('l, d M Y') }}</td>
                <td class="">
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info text-white text-decoration-none">
                        <span data-feather="eye"></span> View
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-white text-decoration-none">
                        <span data-feather="edit"></span> Edit
                    </a>
                    
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline"> 
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="trash-2"></span> Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $posts->links() }}
        </div>
      </div>
@endsection