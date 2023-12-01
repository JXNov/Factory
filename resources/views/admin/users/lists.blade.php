@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="pt-3 pb-2 mb-3">Users</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>{{ $user->name_user }}</td>

                                <td>{{ $user->gender_user }}</td>

                                <td>{{ $user->dob_user }}</td>

                                <td>{{ $user->email_user }}</td>

                                <td>{{ $user->pass_user }}</td>

                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id_user) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.users.destroy', $user->id_user) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>
@endsection
