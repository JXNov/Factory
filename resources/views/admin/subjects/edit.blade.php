@extends('layouts.admin')

@section('title')
    Edit Subject
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @foreach ($subjects as $subject)
        <div class="row">
            @include('admin.blocks.sidebar')
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="pt-3 pb-2 mb-3">Edit Subject</h2>
                <form action="{{ route('admin.subjects.update', $subject->id_subject) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Subject Name"
                            value="{{ $subject->name_subject }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
