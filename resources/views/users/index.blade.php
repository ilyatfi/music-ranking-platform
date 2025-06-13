<x-layout title="Profile">
    <div class="container">
        <h2>Your Profile: {{ $user->name }}</h2>

        <h4>Your Reviews</h4>
        <ul>
            @foreach ($user->reviews as $review)
                <li>
                    <strong>{{ $review->album->title }}</strong>: {{ $review->content }}
                </li>
            @endforeach
        </ul>

        <h4>Your Ratings</h4>
        <ul>
            @foreach ($user->ratings as $rating)
                <li>{{ $rating->album->title }} — {{ $rating->score }}/10</li>
            @endforeach
        </ul>
    </div>
</x-layout>