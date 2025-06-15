<x-layout>
    <x-slot name="title">{{ $artist->stage_name }}</x-slot>

    <h2>{{ $artist->stage_name }}</h2>
    <p class="text-muted">{{ __('Artist Profile') }}</p>

    <h4 class="mt-4">{{ __('Albums') }}</h4>

    @forelse ($albums as $album)
        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">{{ $album->title }}</h5>
                    <small>{{ $album->release_date }} - {{ $album->reviews_count }} {{ __('reviews') }}, {{ number_format($album->ratings->avg('score'), 1) }}/10</small>
                </div>
                <a href="{{ route('albums.show', $album) }}" class="btn btn-sm btn-outline-primary">{{ __('View Album') }}</a>
            </div>
        </div>
    @empty
        <p>{{ __('No albums found for this artist.') }}</p>
    @endforelse
</x-layout>
