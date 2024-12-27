<style>
    .navbar-collapse {
        background-color: transparent !important;
        color: white !important;
    }

    .nav-link {
        color: white !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="container">
        <a class="navbar-brand" href="/">PALM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forum">Forum</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    {{-- <li class="nav-item">
                        <img src="https://www.w3schools.com/w3images/avatar4.png" class="card-img-top" alt="Web Designing"
                            style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
