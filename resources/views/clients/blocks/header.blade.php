<nav class="navbar navbar-expand-lg navbar-body-secondary bg-body-secondary p-3">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('/') }}">
            <h3>Le_Quizz</h3>
        </a>

        <!-- Navbar toggler for mobile devices -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Dropdown menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Subjects
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Regist Subjects</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Manage Subjects</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Exams
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Regist Exams</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Manage Exams</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Search box and Login button -->
        <div class="d-flex" id="navbarNavItems">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mr-3" type="submit">Search</button>
            </form>

            @php
                // Example PHP logic to toggle login and user options
                $isLoggedIn = false; // Replace with your actual logic to check if the user is logged in
            @endphp

            @if ($isLoggedIn)
                <!-- User is logged in, show user options -->
                <div id="userOptions" class="ms-2">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="userOptionsButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://via.placeholder.com/30" alt="User Avatar" class="rounded-circle me-2">
                            User Name
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userOptionsButton">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            @else
                <!-- User is not logged in, show login button -->
                <a href="{{ route('register') }}">
                    <button id="loginBtn" class="btn btn-primary ms-2">Login</button>
                </a>
            @endif
        </div>
    </div>
</nav>
