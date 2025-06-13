<x-layout title="Admin">
    <div class="container">
        <h2>Admin Panel: Moderate Reviews</h2>

        @foreach ($reviews as $review)
            <div>
                <p><strong>{{ $review->user->name }}</strong> on <em>{{ $review->album->title }}</em></p>
                <p>{{ $review->content }}</p>
                <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
            <hr>
        @endforeach
    </div>
</x-layout>