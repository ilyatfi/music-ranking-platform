<x-layout title="All Artists">
    <div class="container">

        <h2 class="mb-4">{{ __('All Artists') }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Add Artist Button --}}
        <div class="mb-3">
            <a href="{{ route('admin.artists.create') }}" class="btn btn-primary">
                + {{ __('Add Artist') }}
            </a>
        </div>

        {{-- Artists Table --}}
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Stage Name') }}</th>
                        <th scope="col">{{ __('User Name') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($artists as $artist)
                        <tr>
                            <td>{{ $artist->id }}</td>
                            <td>{{ $artist->stage_name }}</td>
                            <td>{{ $artist->user->username }}</td>
                            <td>
                                <form action="{{ route('admin.artists.destroy', $artist) }}"
                                      method="POST"
                                      onsubmit="return confirm('{{ __('Are you sure you want to delete this artist?') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center">{{ __('No artists found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
