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

            @auth
                <div class="me-2">{{ auth()->user()->username }}</div>
                <div class="rounded-circle border" style="width: 40px; height: 40px; background-color: #ccc;"></div>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-success">Register</a>
            @endauth
        </div>
    </div>
</nav>
