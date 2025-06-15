@props(['search' => ''])

<nav class="bg-light py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        {{-- Left: Logo and Search --}}
        <div class="d-flex align-items-center flex-grow-1">
            <a href="{{ route('artists.index') }}" class="me-3">
                <img src="{{ asset('logo.png') }}" alt="MusicRank Logo" style="height: 40px;">
            </a>

            <form method="GET" action="{{ route('artists.index') }}" class="flex-grow-1 me-3">
                <div class="input-group">
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search artists or albums...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: Language + Account --}}
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-dark me-3">EN <i class="bi bi-caret-down-fill"></i></button>
            <li class="nav-item">
                @foreach($available_locales as $locale_name => $available_locale)
                    @if($available_locale === $current_locale)
                        <span>{{ $locale_name }}</span>
                    @else
                        <a href="{{ route('locale.switch',  $available_locale) }}">
                            <span>{{ $locale_name }}</span>
                        </a>
                    @endif
                @endforeach
            </li>

            @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="accountMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2">{{ auth()->user()->username }}</span>
                        <div class="rounded-circle border" style="width: 40px; height: 40px; background-color: #ccc;"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountMenu">
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">My Profile</a></li>
                        @if(auth()->user()->isAdmin())
                            <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin Panel</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-success">Register</a>
            @endauth
        </div>
    </div>
</nav>
