@extends('layouts.client')

@section('title')
    Do Test
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        @foreach ($exams as $exam)
            <h2 class="text-center pt-4 pb-2 mb-3">{{ $exam->exam_title }}</h2>
            @php
                $index = 1;
            @endphp

            <form action="{{ route('questions.point', $exam->id_exam) }}" method="post">
                @csrf

                <div class="row">
                    @foreach ($questions as $question)
                        @if ($exam->id_exam == $question->id_exam)
                            <div class="col-md-12">
                                <p><span class="fw-bold">Question {{ $index++ }}: {{ $question->title_question }}</span>
                                </p>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        name="answers[{{ $question->id_question }}]"
                                        id="choice{{ $question->id_question }}_1" value="A">
                                    <label class="form-check-label" for="choice{{ $question->id_question }}_1">
                                        {{ $question->choice1_question }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        name="answers[{{ $question->id_question }}]"
                                        id="choice{{ $question->id_question }}_2" value="B">
                                    <label class="form-check-label" for="choice{{ $question->id_question }}_2">
                                        {{ $question->choice2_question }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        name="answers[{{ $question->id_question }}]"
                                        id="choice{{ $question->id_question }}_3" value="C">
                                    <label class="form-check-label" for="choice{{ $question->id_question }}_3">
                                        {{ $question->choice3_question }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        name="answers[{{ $question->id_question }}]"
                                        id="choice{{ $question->id_question }}_4" value="D">
                                    <label class="form-check-label" for="choice{{ $question->id_question }}_4">
                                        {{ $question->choice4_question }}
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
