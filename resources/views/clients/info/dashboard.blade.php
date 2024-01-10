@extends('layouts.client')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="mb-0">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif

        <form class="mt-4" action="{{ route('info.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" value="{{ old('old_password') }}" class="form-control" id="old_password"
                    name="old_password">
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" value="{{ old('new_password') }}" class="form-control" id="new_password"
                    name="new_password">
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" value="{{ old('confirm_password') }}" class="form-control" id="confirm_password"
                    name="confirm_password">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
