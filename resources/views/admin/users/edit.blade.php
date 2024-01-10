@extends('layouts.admin')

@section('title')
    Edit Users
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="pt-3 pb-2 mb-3">Edit Users</h2>

            <div class="table-responsive">
                <form action="{{ route('admin.users.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ $getUser->name }}" type="text" class="form-control" id="name"
                            name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ $getUser->email }}" type="email" class="form-control" id="email"
                            name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" id="role">
                            <option value="">Select Role</option>
                            <option value="1" {{ $getUser->role == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $getUser->role == 0 ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <button type="submit" name="btnAdd" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
