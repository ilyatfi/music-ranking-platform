<x-layout title="My Albums">
    <div class="container">
        <h2 class="mb-4">🎶 {{ __('My Albums') }}</h2>

        {{-- Flash message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Album Button --}}
        <div class="mb-3">
            <a href="{{ route('albums.create') }}" class="btn btn-primary">
                + {{ __('Add Album') }}
            </a>
        </div>

        {{-- Albums Table --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($albums as $album)
                        <tr>
                            <td>
                                <a href="{{ route('albums.show', $album) }}" class="text-decoration-none text-dark">
                                    {{ $album->title }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('artist.albums.edit', $album) }}" class="btn btn-sm btn-outline-primary me-2">
                                    {{ __('Edit') }}
                                </a>

                                <form action="{{ route('artist.albums.destroy', $album) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('{{ __('Are you sure you want to delete this album?') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-muted text-center">{{ __('You have not added any albums.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
