@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Dashboard</h1>
@endsection

@section('main_content')
    <h3 class="display-5">Halaman Index</h3>
    <div class="col-lg-8">
        
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
@endsection