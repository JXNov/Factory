@extends('layouts.client')

@section('title')
    Detail Subject
@endsection

@section('content')
    <div class="container">
        <div class="row pt-4 pb-2 mb-3">
            <h2 class="col-md-4">{{ $getSubject->name }}</h2>

            <div class="col-md-8">
                <div class="mb-3">
                    @if (Auth::check())
                        @if ($checkRegister == false)
                            <form action="{{ route('subjects.register', $getSubject->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        @else
                            <button type="button" class="btn btn-secondary">Registered</button>
                        @endif


                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Register</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>

        <div class="row">
            @foreach ($listExams as $exam)
                @if ($getSubject->id == $exam->subject_id)
                    <div class="col-sm-4 mb-4 mb-sm-0">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $exam->name }}</h5>
                                <p class="card-text">{{ $exam->description }}.</p>
                                <p class="card-text">Time: {{ $exam->time_limit }} minutes</p>
                                <p class="card-text">{{ $exam->number_of_questions }} Questions</p>

                                @if (Auth::check())
                                    @if ($checkRegister)
                                        @php
                                            $checkCompleted = \App\Models\UsersExams::where('user_id', Auth::user()->id)
                                                ->where('exam_id', '=', $exam->id)
                                                ->where('score', '>=', 5)
                                                ->first();
                                        @endphp

                                        @if ($checkCompleted)
                                            <button type="button" class="btn btn-success">Quiz Completed</button>
                                            <span class="small badge text-bg-success">You have completed the quiz!</span>
                                        @else
                                            <a href="{{ route('questions.show', [$exam->id, Auth::user()]) }}"
                                                class="btn btn-primary">Do test</a>
                                        @endif
                                    @else
                                        <button type="button" class="btn btn-secondary btn-custom">Do test</button>
                                        <span class="small badge text-bg-danger">You need to register to take the
                                            quiz!</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Register</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Comments</h3>
                <hr>

                @if (Auth::check())
                    <form action="{{ route('subjects.comment', [$getSubject->id, Auth::user()->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Comment</a>
                @endif
            </div>

            @forelse ($listComments as $comment)
                <div class="col-md-12 mt-4">
                    <h5 class="card-title">
                        @if ($getUser->id == $comment->user_id)
                            @if ($getUser->role == 1)
                                {{ $getUser->name }} <span class="badge bg-success">Admin</span>
                            @else
                                {{ $getUser->name }} <span class="badge bg-primary">User</span>
                            @endif
                        @endif
                    </h5>
                    <p class="card-text">{{ $comment->text }}</p>
                </div>
            @empty
                <div class="col-md-12 mt-4">
                    <p>No comments available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.querySelectorAll('.btn-custom').forEach(function(button) {
            button.addEventListener('click', function() {
                button.nextElementSibling.style.visibility = 'visible';
                setTimeout(function() {
                    button.nextElementSibling.style.visibility = 'hidden';
                }, 3000);
            });
        });
    </script>
@endpush
