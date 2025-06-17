<x-layout title="All Artists">
    <div class="container">
        <h2>{{ __('All Artists') }}</h2>
        
        @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif

        <div><a class="btn" href="{{ route('admin.artists.create') }}">{{ __('Add Artist') }}</a></div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('Stage Name') }}</th>
                    <th>{{ __('User Name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                    <tr>
                        <td>{{ $artist->id }}</td>
                        <td>{{ $artist->stage_name }}</td>
                        <td>{{ $artist->user->username }}</td>
                        <td>
                            <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" onsubmit="return confirm(`{{ __('Are you sure you want to delete this artist?') }}`)">
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
