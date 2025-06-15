<form method="POST" action="{{ route('reviews.store', $album) }}" class="mt-3">
    @csrf

    <div class="mb-3">
        <label for="content" class="form-label">Your Review</label>
        <textarea name="content" id="content" rows="4"
                  class="form-control @error('content') is-invalid @enderror"
                  required>{{ old('content') }}</textarea>

        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit Review</button>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
