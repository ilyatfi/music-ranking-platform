<x-layout title="{{ __('Add Album') }}">
    <div class="container">
        <h2 class="mb-4">{{ __('Add New Album') }}</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('albums.store') }}" class="card p-4 shadow-sm">
            @csrf

            {{-- Album Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Album Name') }}</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Genre --}}
            <div class="mb-3">
                <label for="genre" class="form-label">{{ __('Genre') }}</label>
                <input type="text" name="genre" id="genre"
                       class="form-control @error('genre') is-invalid @enderror"
                       value="{{ old('genre') }}" required>
                @error('genre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Release Date --}}
            <div class="mb-3">
                <label for="release_date" class="form-label">{{ __('Release Date') }}</label>
                <input type="date" name="release_date" id="release_date"
                       class="form-control @error('release_date') is-invalid @enderror"
                       value="{{ old('release_date') }}" required>
                @error('release_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Add Album') }}</button>
        </form>
    </div>
</x-layout>
