@extends('layouts.admin')

@section('title')
    Create Questions
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @foreach ($exams as $exam)
                <h2 class="pt-3 pb-2 mb-3">Create Questions by Exam: {{ $exam->exam_title }}</h2>

                <form action="{{ route('admin.questions.storeByExam', $exam->id_exam) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="question"
                            placeholder="Enter question">
                    </div>

                    <div class="mb-3">
                        <label for="exam" class="form-label">Exam</label>

                        @foreach ($exams as $exam)
                            <input type="hidden" class="form-control" id="exam" name="exam"
                                value="{{ $exam->id_exam }}" placeholder="Enter exam">

                            <input type="text" class="form-control" id="exam" name="exam"
                                value="{{ $exam->exam_title }}" placeholder="Enter exam" disabled>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="choice1" class="form-label">Choice A</label>
                        <input type="text" class="form-control" id="choice1" name="choice1"
                            placeholder="Enter choice A">
                    </div>

                    <div class="mb-3">
                        <label for="choice2" class="form-label">Choice B</label>
                        <input type="text" class="form-control" id="choice2" name="choice2"
                            placeholder="Enter choice B">
                    </div>

                    <div class="mb-3">
                        <label for="choice3" class="form-label">Choice C</label>
                        <input type="text" class="form-control" id="choice3" name="choice3"
                            placeholder="Enter choice C">
                    </div>

                    <div class="mb-3">
                        <label for="choice4" class="form-label">Choice D</label>
                        <input type="text" class="form-control" id="choice4" name="choice4"
                            placeholder="Enter choice D">
                    </div>

                    <div class="mb-3">
                        <label for="correct" class="form-label">Answer</label>
                        <select class="form-select" id="correct" name="correct">
                            <option selected>Select answer</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
            @endforeach
        </div>
    </div>
@endsection
