@extends('layouts.admin')

@section('title')
    Questions
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="pt-3 pb-2 mb-3">Questions</h2>

            {{-- Search --}}
            <form action="{{ route('admin.questions') }}" method="GET">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <select class="form-select" name="exam" id="exam">
                                <option value="" selected>All Exam</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id_exam }}"
                                        {{ request()->exam == $exam->id_exam ? 'selected' : '' }}>
                                        {{ $exam->exam_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>


            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Subject</th>
                            <th>Exam</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Correct Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($search))
                            @foreach ($questions as $key => $question)
                                @if ($question->id_exam == $search)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $question->title_question }}</td>
                                        <td>
                                            @foreach ($subjects as $subject)
                                                @foreach ($exams as $exam)
                                                    @if ($exam->id_exam == $question->id_exam && $exam->id_subject == $subject->id_subject)
                                                        {{ $subject->name_subject }}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($exams as $exam)
                                                @if ($exam->id_exam == $question->id_exam)
                                                    {{ $exam->exam_title }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $question->choice1_question }}</td>
                                        <td>{{ $question->choice2_question }}</td>
                                        <td>{{ $question->choice3_question }}</td>
                                        <td>{{ $question->choice4_question }}</td>
                                        <td>{{ $question->correct_answer }}</td>
                                        <td>
                                            <a href="{{ route('admin.questions.edit', $question->id_question) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.questions.destroy', $question->id_question) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            @foreach ($questions as $key => $question)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $question->title_question }}</td>
                                    <td>
                                        @foreach ($subjects as $subject)
                                            @foreach ($exams as $exam)
                                                @if ($exam->id_exam == $question->id_exam && $exam->id_subject == $subject->id_subject)
                                                    {{ $subject->name_subject }}
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($exams as $exam)
                                            @if ($exam->id_exam == $question->id_exam)
                                                {{ $exam->exam_title }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $question->choice1_question }}</td>
                                    <td>{{ $question->choice2_question }}</td>
                                    <td>{{ $question->choice3_question }}</td>
                                    <td>{{ $question->choice4_question }}</td>
                                    <td>{{ $question->correct_answer }}</td>
                                    <td>
                                        <a href="{{ route('admin.questions.edit', $question->id_question) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.questions.destroy', $question->id_question) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Add Question</a>
        </div>
    </div>
@endsection
