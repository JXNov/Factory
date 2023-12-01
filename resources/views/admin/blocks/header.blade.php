<header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap px-3 shadow">
    <a class="navbar-brand col-md-3 col-lg-2" href="#">Le_Quizz</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <form class="d-flex col-md-6" action="{{ route('admin.search') }}" method="GET">
        <input type="text" name="search" id="search" class="form-control form-control-light me-4 rounded"
            placeholder="Search" aria-label="Search">

        <button type="submit" class="btn btn-success">Search</button>
    </form>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="btn btn-outline-primary px-3" href="#">Sign out</a>
        </div>
    </div>
</header>
