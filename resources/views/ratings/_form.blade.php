<form action="{{ $userRating
    ? route('ratings.update', ['album' => $album->id, 'rating' => $userRating->id])
    : route('ratings.store', ['album' => $album->id]) }}"
    method="POST" class="mt-3">

    @csrf
    @if($userRating)
        @method('PUT')
    @endif

    <input type="hidden" name="album_id" value="{{ $album->id }}">

    <div class="mb-3">
        <label for="score" class="form-label">Your Rating (1–10):</label>
        <div class="input-group">
            <input type="number" name="score" id="score"
                   class="form-control @error('score') is-invalid @enderror"
                   min="1" max="10"
                   value="{{ old('score', $userRating->score ?? '') }}"
                   style="max-width: 100px;" required>

            <button type="submit" class="btn btn-primary">
                {{ $userRating ? 'Update Rating' : 'Submit Rating' }}
            </button>
        </div>

        @error('score')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
