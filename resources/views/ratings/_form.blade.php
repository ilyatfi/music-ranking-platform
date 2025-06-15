<form action="{{ $userRating
    ? route('ratings.update', ['album' => $album->id, 'rating' => $userRating->id])
    : route('ratings.store', ['album' => $album->id]) }}"
    method="POST">
    @csrf
    @if($userRating)
        @method('PUT')
    @endif

    <input type="hidden" name="album_id" value="{{ $album->id }}">

    <label for="score">Your Rating (1–10):</label>
    <input type="number" name="score" id="score" min="1" max="10"
           value="{{ old('score', $userRating->score ?? '') }}" required>

    <button type="submit">{{ $userRating ? 'Update Rating' : 'Submit Rating' }}</button>
</form>
@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif