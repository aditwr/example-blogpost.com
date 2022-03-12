@extends('dashboard.layouts.main')

@section('content_title')
    <h1 class="h2">Add Admin</h1>
@endsection

@section('main_content')
    <div class="table-responsive col-lg-10">
        <table class="table table-light">
            <thead class="table-dark">
                <tr class="">
                    <td class="">No</td>
                    <td class="">Admin Username</td>
                    <td class="">Admin Fullname</td>
                    <td class="">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach( $admins as $admin )
                <tr class="">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $admin->username }}</td>
                    <td class="">{{ $admin->name }}</td>
                    <td class="">
                        <form action="/dashboard/addadmin" method="POST" >
                            @method('DELETE')
                            {{-- method except 'get', need csrf token to validating process --}}
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $admin->id }}">
                            <button onclick="return confirm('Are you Sure?')" type="submit" class="badge bg-danger text-decoration-none text-white border-0" ><span data-feather="trash-2"></span> Remove Admin Rights</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $admins->links() }}
        </div>
    </div>
    <div class="col-lg-6 bg-light py-2 px-2">
        <form action="/dashboard/addadmin" method="get">
        <label for="search" class="form-label fw-bold">Choose User and make it Administrator</label>
        <div class="input-group mb-3">
            <input type="text" name="key" id="search" class="form-control" placeholder="username or fullname" value="{{ request()->input('key') }}">
            <button class="btn btn-success" type="submit" id="button-addon2">Search User</button>
        </div>
        </form>
        
        @isset( $users )
        <table class="table table-light">
            <thead class="table-light">
                <tr class="fw-bold">
                    <td class="">No</td>
                    <td class="">Username</td>
                    <td class="">Fullname</td>
                    <td class="">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach( $users as $user )
                <tr class="">
                    <td class="">{{ $loop->iteration }}</td>
                    <td class="">{{ $user->username }}</td>
                    <td class="">{{ $user->name }}</td>
                    <td class="">
                        @if( $user->is_admin )
                            <div class="badge bg-success"><span data-feather="check"></span> Already an Admin</div>
                        @else
                            <form action="/dashboard/addadmin" method="POST" >
                                {{-- method except 'get', need csrf token to validating process --}}
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <button type="submit" class="badge bg-info text-decoration-none text-white border-0" onclick="return confirm('Are you sure?')" ><span data-feather="user"></span> Add to Admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endisset

    </div>
@endsection