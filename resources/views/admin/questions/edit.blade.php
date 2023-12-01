@extends('layouts.admin')

@section('title')
    Edit Question
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="pt-3 pb-2 mb-3">Edit Question</h2>

            @foreach ($questions as $question)
                <form action="{{ route('admin.questions.update', $question->id_question) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="question"
                            value="{{ $question->title_question }}">
                    </div>

                    <div class="mb-3">
                        <label for="exam" class="form-label">Exam</label>
                        <select class="form-select" id="exam" name="exam">
                            <option selected>Select exam</option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id_exam }}"
                                    {{ $exam->id_exam == $question->id_exam ? 'selected' : '' }}>{{ $exam->exam_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="choice1" class="form-label">Choice A</label>
                        <input type="text" class="form-control" id="choice1" name="choice1"
                            value="{{ $question->choice1_question }}">
                    </div>

                    <div class="mb-3">
                        <label for="choice2" class="form-label">Choice B</label>
                        <input type="text" class="form-control" id="choice2" name="choice2"
                            value="{{ $question->choice2_question }}">
                    </div>

                    <div class="mb-3">
                        <label for="choice3" class="form-label">Choice C</label>
                        <input type="text" class="form-control" id="choice3" name="choice3"
                            value="{{ $question->choice3_question }}">
                    </div>

                    <div class="mb-3">
                        <label for="choice4" class="form-label">Choice D</label>
                        <input type="text" class="form-control" id="choice4" name="choice4"
                            value="{{ $question->choice4_question }}">
                    </div>

                    <div class="mb-3">
                        <label for="correct" class="form-label">Answer</label>
                        <select class="form-select" id="correct" name="correct">
                            <option selected>Select answer</option>
                            <option value="A" {{ $question->correct_answer == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $question->correct_answer == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $question->correct_answer == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $question->correct_answer == 'D' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            @endforeach
        </div>
    </div>
@endsection
