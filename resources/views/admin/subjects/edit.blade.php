@extends('layouts.admin')

@section('title')
    Edit Subject
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')

        @foreach ($subjects as $subject)
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="pt-3 pb-2 mb-3">Edit Subject</h2>
                <form action="{{ route('admin.subjects.update', $subject->id_subject) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Subject Name"
                            value="{{ $subject->name_subject }}">
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Subject Image</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">Subject Detail</label>
                        <textarea class="form-control" id="detail" rows="5" name="detail">{{ $subject->detail_subject }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
        @endforeach
    </div>
    </div>
@endsection
