@extends('layouts.admin')

@section('title')
    Manage Questions Exam
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <div class="row">
        @include('admin.blocks.sidebar')
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @foreach ($exams as $exam)
                <h2 class="pt-3 pb-2 mb-3">Manage Questions Exam: {{ $exam->exam_title }}</h2>


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
                                <th>Question Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $key => $question)
                                @if ($exam->id_exam == $question->id_exam)
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
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <form action="{{ route('admin.questions.destroy', $question->id_question) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('admin.questions.createByExam', $exam->id_exam) }}"
                        class="btn btn-sm btn-primary">Add
                        Question</a>
            @endforeach
        </div>

    </div>
@endsection
