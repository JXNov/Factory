@extends('layouts.client')

@section('title')
    Detail Subject
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        @foreach ($subjects as $subject)
            <h2 class="text-center pt-4 pb-2 mb-3">{{ $subject->name_subject }}</h2>

            <div class="row">
                @foreach ($exams as $exam)
                    @if ($subject->id_subject == $exam->id_subject)
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $exam->exam_title }}</h5>
                                    <p class="card-text">{{ $exam->exam_description }}.</p>
                                    <a href="{{ route('questions.show', $exam->id_exam) }}" class="btn btn-primary">Do
                                        Test</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
    </div>
@endsection
