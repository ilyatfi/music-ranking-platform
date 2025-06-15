<x-layout title="Profile">
    <div class="container">

        <h2 class="mb-4">{{ __('Profile') }}: {{ $user->username }}</h2>

        {{-- Reviews Section --}}
        <div class="mb-5">
            <h4 class="mb-3">{{ __('Your Reviews') }}</h4>

            @forelse ($user->reviews as $review)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            <a href="{{ route('albums.show', $review->album) }}" class="text-decoration-none text-dark">
                                {{ $review->album->title }}
                            </a>
                        </h5>
                        <p class="card-text">{{ $review->content }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted">{{ __('You havent written any reviews yet.') }}</p>
            @endforelse
        </div>

        {{-- Ratings Section --}}
        <div class="mb-5">
            <h4 class="mb-3">{{ __('Your Ratings') }}</h4>

            @forelse ($user->ratings as $rating)
                <div class="card mb-2 shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('albums.show', $review->album) }}" class="text-decoration-none text-dark">
                                <strong>{{ $rating->album->title }}</strong><br>
                            </a>
                        <span class="fs-5 text-primary">{{ $rating->score }}/10</span>
                    </div>
                </div>
            @empty
                <p class="text-muted">{{ __('You havent rated any albums yet.') }}</p>
            @endforelse
        </div>

    </div>
</x-layout>
