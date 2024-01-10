@extends('layouts.client')

@section('title')
    Score
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="table-responsive mt-4">
            @php $i = 1; @endphp
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersExams as $score)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $score->exam_name }}</td>
                            <td>{{ $score->subject_name }}</td>
                            <td>{{ $score->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
