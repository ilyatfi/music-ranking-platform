<x-layout title="{{ $album->title }}">
    <div class="container">

        {{-- Album Header --}}
        <div class="mb-4">
            <h2 class="fw-bold">{{ $album->title }}</h2>
            <p class="text-muted mb-1">
                By: <a href="{{ route('artists.show', $album->artist) }}">{{ $album->artist->stage_name }}</a>
            </p>
            <p class="text-muted mb-1">{{ __('Release Date') }}: {{ $album->release_date }}</p>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded shadow-sm">
                        <strong>Average Rating:</strong><br>
                        @if ($averageRating)
                            @php
                                $score = $averageRating;
                                $stars = floor($score / 2);
                                $hasHalf = fmod($score, 2) >= 1;
                                if ($score >= 8) {
                                    $colorClass = 'text-success'; // green
                                } elseif ($score >= 4) {
                                    $colorClass = 'text-warning'; // orange
                                } else {
                                    $colorClass = 'text-danger'; // red
                                }
                            @endphp

                            <span class="fs-4 {{ $colorClass }}">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $stars)
                                        <i class="bi bi-star-fill"></i>
                                    @elseif ($hasHalf && $i == $stars + 1)
                                        <i class="bi bi-star-half"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </span>
                            <span class="text-muted ms-2">({{ number_format($score, 1) }}/10)</span>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </div>
                </div>

                @auth
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded shadow-sm">
                            <strong>Your Rating:</strong><br>
                            @php
                                $userRating = $album->ratings->where('user_id', auth()->id())->first();
                            @endphp

                            @if ($userRating)
                                @php
                                    $score = $userRating->score;
                                    $stars = floor($score / 2); // full stars
                                    $hasHalf = fmod($score, 2) >= 1; // half star if score has 1 leftover
                                    if ($score >= 8) {
                                        $colorClass = 'text-success'; // green
                                    } elseif ($score >= 4) {
                                        $colorClass = 'text-warning'; // orange
                                    } else {
                                        $colorClass = 'text-danger'; // red
                                    }
                                @endphp

                                <span class="fs-4 {{$colorClass}}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $stars)
                                            <i class="bi bi-star-fill"></i>
                                        @elseif ($hasHalf && $i == $stars + 1)
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                </span>
                                <span class="text-muted ms-2">({{ $score }}/10)</span>
                            @else
                                <span class="text-muted">You haven't rated this album yet.</span>
                            @endif
                        </div>
                    </div>
                @endauth

            </div>
        </div>

        {{-- Forms for Authenticated Users --}}
        @auth
            @php
                $userRating = $album->ratings->where('user_id', auth()->id())->first();
            @endphp

            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Write a Review</h5>
                            @include('reviews._form', ['album' => $album])
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Rate this Album</h5>
                            @include('ratings._form', ['album' => $album, 'userRating' => $userRating])
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        {{-- Reviews Section --}}
        <div>
            <h4 class="mb-3">User Reviews</h4>

            @forelse ($album->reviews as $review)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">{{ $review->user->username }}</h6>
                        <p class="card-text">{{ $review->content }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted">No reviews yet. Be the first to review this album!</p>
            @endforelse
        </div>
    </div>
</x-layout>
