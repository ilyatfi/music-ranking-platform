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
                    <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="{{ __('Search artists') }}...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- Right: Language + Account --}}
        <div class="d-flex align-items-center">
            <div class="dropdown me-3">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="localeDropdown" data-bs-toggle="dropdown" aria-expanded="false">EN                </button>
                <ul class="dropdown-menu" aria-labelledby="localeDropdown">
                    @foreach($available_locales as $locale_name => $available_locale)
                        @if($available_locale === $current_locale)
                            <li><span class="dropdown-item active">{{ $locale_name }}</span></li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('locale.switch', $available_locale) }}">
                                    {{ $locale_name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>


            @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="accountMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2">{{ auth()->user()->username }}</span>
                        <div class="rounded-circle border" style="width: 40px; height: 40px; background-color: #ccc;"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountMenu">
                        <li><a class="dropdown-item" href="{{ route('users.index') }}">{{ __('My Profile') }}</a></li>
                        @if(auth()->user()->isAdmin())
                            <li><a class="dropdown-item" href="{{ route('admin.index') }}">{{ __('Admin Panel') }}</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger">{{ __('Logout') }}</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline-success">{{ __('Register') }}</a>
            @endauth
        </div>
    </div>
</nav>
