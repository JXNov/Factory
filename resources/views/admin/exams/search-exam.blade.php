@extends('layouts.admin')

@section('title')
    Search
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="pt-3 pb-2 mb-3">Search results Exams for: {{ $search }}</h2>
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
                            <th>Exam Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $key => $exam)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exam->exam_title }}</td>
                                <td>{{ $exam->exam_time_limit }} Minute</td>
                                <td>{{ $exam->exam_limit_quest }} Questions</td>
                                <td>{{ $exam->exam_description }}</td>
                                <td>
                                    @foreach ($subjects as $subject)
                                        @if ($subject->id_subject == $exam->id_subject)
                                            {{ $subject->name_subject }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.exams.edit', $exam->id_exam) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.exams.destroy', $exam->id_exam) }}" method="POST"
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
        </div>
    </div>
@endsection
