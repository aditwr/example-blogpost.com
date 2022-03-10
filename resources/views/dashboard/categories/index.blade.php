@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Post Categories</h1>
@endsection

@section('main_content')
    <h3 class="display-5">List of Post Categories</h3>

    @if( session()->has('success') )
    <div class="alert alert-success alert-dismissible fade show col-lg-7" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive  col-lg-7">
        <a href="/dashboard/categories/create" class="btn btn-success">Create New Post Categories</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td class="">
                    <a href="/dashboard/categores/{{ $category->slug }}" class="badge bg-info text-white text-decoration-none">
                        <span data-feather="eye"></span> View
                    </a>
                    <a href="/dashboard/categores/{{ $category->slug }}/edit" class="badge bg-warning text-white text-decoration-none">
                        <span data-feather="edit"></span> Edit
                    </a>
                    
                    <form action="/dashboard/categores/{{ $category->slug }}" method="post" class="d-inline"> 
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="trash-2"></span> Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach

          </tbody>
        </table>
      </div>
@endsection