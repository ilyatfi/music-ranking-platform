<x-layout title="Edit Album">
    <div class="container">
        <h2>{{ __('Edit Album') }}: {{ $album->title }}</h2>

        <form action="{{ route('artist.albums.update', $album) }}" method="POST">
            @csrf
            @method('PUT')

            <label>{{ __('Title') }}</label>
            <input type="text" name="title" value="{{ old('title', $album->title) }}" required>

            <label>{{ __('Release Date') }}</label>
            <input type="date" name="release_date" value="{{ old('release_date', $album->release_date) }}" required>

            <label>{{ __('Genre') }}</label>
            <input type="text" name="genre" value="{{ old('genre', $album->genre) }}" required>

            <button type="submit">{{ __('Update') }}</button>
        </form>
    </div>
</x-layout>
