@extends('layouts.admin')

@section('title')
    Exams
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    @php $i = 1; @endphp

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row">
                <h2 class="pt-3 pb-2 mb-3 col-md-3">Exams</h2>

                <form class="d-flex pt-3 pb-2 mb-3 col-md-4" action="{{ route('admin.exams.search') }}" method="GET">
                    <input type="text" name="search" id="search" class="form-control form-control-light me-4 rounded"
                        placeholder="Search" aria-label="Search">

                    <select name="subject_id" id="subject_id" class="form-select form-control-light me-4 rounded">
                        <option value="">Select Subject</option>
                        @foreach ($listSubjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exam Name</th>
                            <th>Exam Time Limit</th>
                            <th>Exam Limit Quest</th>
                            <th>Exam Description</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listExams as $exam)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $exam->name }}</td>
                                <td>{{ $exam->time_limit }} Minute</td>
                                <td>{{ $exam->number_of_questions }} Questions</td>
                                <td>{{ $exam->description }}</td>
                                <td>
                                    @foreach ($listSubjects as $subject)
                                        @if ($subject->id == $exam->subject_id)
                                            {{ $subject->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.exams.show', $exam->id) }}"
                                        class="btn btn-sm btn-success">Manage
                                        Questions</a>

                                    <a href="{{ route('admin.exams.edit', $exam->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.exams.create') }}" class="btn btn-primary">Add Exam</a>
        </div>
    </div>
@endsection
