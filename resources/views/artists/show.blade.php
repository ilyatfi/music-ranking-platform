<x-layout title="{{ $artist->stage_name }}">
    <div class="container">
        <h2>{{ $artist->stage_name }}</h2>
        <p>{{ $artist->bio }}</p>

        <h4>Albums</h4>
        <ul>
            @foreach ($albums as $album)
                <li>
                    <a href="{{ route('albums.show', $album) }}">
                        {{ $album->title }} ({{ $album->release_date }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>