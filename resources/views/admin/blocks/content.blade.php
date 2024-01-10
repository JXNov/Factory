<main class="col-md-9 ms-sm-auto col-lg-10 mt-3 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Statistical</h1>

        <form action="{{ route('admin.search') }}" method="get">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="user_name" placeholder="User Name">
                </div>

                <div class="col-md-4">
                    <select name="exam_id" class="form-control">
                        <option value="">Exam Name</option>
                        @foreach ($listExams as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        @php $i = 1; @endphp
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Exam Name</th>
                    <th scope="col">Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersExams as $score)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $score->user_name }}</td>
                        <td>{{ $score->user_email }}</td>
                        <td>{{ $score->exam_name }}</td>
                        <td>{{ $score->score }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
