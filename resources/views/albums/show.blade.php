<x-layout title="{{ $album->title }}">
    <div class="container">
        <h2>{{ $album->title }}</h2>
        <p>By: <a href="{{ route('artists.show', $album->artist) }}">{{ $album->artist->stage_name }}</a></p>
        <p>{{ __('Release Date') }}: {{ $album->release_date }}</p>
        <p>Average Rating: {{ number_format($averageRating, 1) }}/10</p>

        @auth
            @php
                $userRating = $album->ratings->where('user_id', auth()->id())->first();
            @endphp

            @include('reviews._form', ['album' => $album])
            @include('ratings._form', ['album' => $album, 'userRating' => $userRating])
        @endauth


        <h4>Reviews</h4>
        @foreach ($album->reviews as $review)
            <div>
                <strong>{{ $review->user->name }}</strong>
                <p>{{ $review->content }}</p>
            </div>
        @endforeach
    </div>
</x-layout>