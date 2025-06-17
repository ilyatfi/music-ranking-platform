<x-layout title="My Albums">
    <div class="container">
        <h2>My Albums</h2>

        @if(session('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        <a class="dropdown-item" href="{{ route('albums.create') }}">{{ __('Add Album') }}</a>

        <table>
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($albums as $album)
                    <tr>
                        <td><a href="{{ route('albums.show', $album) }}">{{ $album->title }}</a></td>
                        <td>
                            <a href="{{ route('artist.albums.edit', $album) }}">{{ __('Edit') }}</a>
                            <form action="{{ route('artist.albums.destroy', $album) }}" method="POST" style="display:inline-block" onsubmit="return confirm(`{{ __('Are you sure?') }}`)">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
