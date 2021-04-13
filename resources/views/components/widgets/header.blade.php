<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src={{ asset('img/logo.png') }} >
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="/" class="nav-link active">Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Features</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Pricing</a>
        </li>
        @auth
        <li class="nav-item">
            <a href="{{ route('merchant.index') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('auth.logout') }}" class="d-none" method="POST">
                @csrf
            </form>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('auth.showLoginForm') }}" class="nav-link">Sign in</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('auth.showRegistrationForm') }}" class="nav-link">Register</a>
        </li>
        @endauth
    </ul>
</header>
