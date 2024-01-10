@extends('layouts.client')

@section('title')
    Subjects
@endsection

@section('content')
    {{-- @include('clients.blocks.carousel') --}}

    <div class="container marketing">
        <div class="row">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($listSubjects as $subject)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <image href="{{ asset('storage\\') . $subject->image }}" width="100%" height="100%" />
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $subject->name }}</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text">
                                    @if (strlen($subject->description) > 120)
                                        {{ substr($subject->description, 0, 120) . '...' }}
                                    @else
                                        {{ $subject->description }}
                                    @endif
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('subjects.show', $subject->id) }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="{{ route('subjects', $subject->id) }}" type="button"
                                            class="btn btn-sm btn-outline-secondary">Add</a>
                                    </div>
                                    {{-- <small class="text-body-secondary">9 mins</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
