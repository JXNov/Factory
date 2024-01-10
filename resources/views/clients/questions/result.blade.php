@extends('layouts.client')

@section('title')
    Do Test
@endsection

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center pt-4 pb-2 mb-3">Exam:
                    {{ $getExam->name }}
                </h1>
            </div>

            <div class="col-md-12">
                <h2 class="text-center pt-4 pb-2 mb-3">Your point: <span class="text-danger">{{ $getUserScore->score }}</span>
                    /
                    10
                </h2>
            </div>

            <div class="col-md-12">
                <div class="text-center">
                    <a href="{{ route('subjects.show', $getExam->subject_id) }}" class="btn btn-primary">Back to Exams
                        Page</a>

                    <a href="{{ route('/') }}" class="btn btn-primary">Back to home page</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        history.pushState(null, null, document.URL);

        window.addEventListener('popstate', function() {
            history.pushState(null, null, document.URL);
        });

        window.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            window.history.back();
        });

        window.addEventListener('load', function() {
            window.history.forward();
        });
    </script>
@endpush
