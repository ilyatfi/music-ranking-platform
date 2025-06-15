<x-layout title="{{ __('Add Album') }}">
    <div class="container">
        <h2>{{ __('Add New Album') }}</h2>

        <form method="POST" action="{{ route('albums.store') }}">
            @csrf

            <div>
                <label for="title">{{ __('Album Name') }}</label>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="genre">{{ __('Genre') }}</label>
                <input type="text" name="genre" value="{{ old('genre') }}" required>
            </div>

            <div>
                <label for="release_date">{{ __('Release Date') }}</label>
                <input type="date" name="release_date" value="{{ old('release_date') }}" required>
            </div>

            <button type="submit">{{ __('Add Album') }}</button>
        </form>
    </div>
</x-layout>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif