<x-layout title="Artists">
    <div class="container">
        <form method="GET" action="{{ route('artists.index') }}">
            <input type="text" name="search" placeholder="Search artists.." value="{{ $search }}">
            <button type="submit">Search</button>
        </form>

        <h2>Artists</h2>
        <ul>
            @foreach ($artists as $artist)
                <li>
                    <a href="{{ route('artists.show', $artist) }}">{{ $artist->stage_name }}</a>
                </li>
            @endforeach
        </ul>

        {{ $artists->links() }}
    </div>
</x-layout>