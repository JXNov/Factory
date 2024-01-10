@extends('layouts.client')

@section('title')
    Registered Subjects
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
                        <th scope="col">Subject Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listSubjects as $subject)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $subject->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
