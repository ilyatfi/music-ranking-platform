<x-layout title="Edit Album">
    <div class="container">

        <h2 class="mb-4">
            {{ __('Edit Album') }}: <span class="text-primary fw-semibold">{{ $album->title }}</span>
        </h2>

        <form action="{{ route('artist.albums.update', $album) }}"
              method="POST"
              class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            {{-- Album Title --}}
            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">{{ __('Title') }}</label>
                <input type="text"
                       name="title"
                       id="title"
                       value="{{ old('title', $album->title) }}"
                       class="form-control @error('title') is-invalid @enderror"
                       required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Release Date --}}
            <div class="mb-3">
                <label for="release_date" class="form-label fw-semibold">{{ __('Release Date') }}</label>
                <input type="date"
                       name="release_date"
                       id="release_date"
                       value="{{ old('release_date', $album->release_date) }}"
                       class="form-control @error('release_date') is-invalid @enderror"
                       required>
                @error('release_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Genre --}}
            <div class="mb-3">
                <label for="genre" class="form-label fw-semibold">{{ __('Genre') }}</label>
                <input type="text"
                       name="genre"
                       id="genre"
                       value="{{ old('genre', $album->genre) }}"
                       class="form-control @error('genre') is-invalid @enderror"
                       required>
                @error('genre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </form>

        {{-- Validation Errors Summary --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</x-layout>
