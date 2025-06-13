<nav class="navbar">
    <a href="{{ route('artists.index') }}">Home</a>
    <ul>
        @auth
            <li class="nav-item">
                <a href="{{ route('users.index') }}">Profile</a>
            </li>
            @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}">Admin Panel</a>
                </li>
            @endif
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            </li>
        @endauth

        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}">Register</a>
            </li>
        @endguest
    </ul>
</nav>