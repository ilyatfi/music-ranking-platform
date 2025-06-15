<x-layout>
    <x-slot name="title">{{ __('Artists') }}</x-slot>

    {{-- Featured Artists --}}
    <div class="mb-5">
        @foreach ($artists->take(2) as $artist)
            <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center mb-4">
                    <div class="rounded-circle me-3" style="width: 100px; height: 100px; background-color: #eee;"></div>
                    <div class="flex-grow-1 border p-3">
                        <strong>{{ $artist->stage_name }}</strong><br>
                        <small class="text-muted">{{ $artist->bio }}</small>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Artist Grid --}}
    <div class="d-flex justify-content-start flex-wrap gap-5 mb-5">
        @foreach ($artists->slice(2, 8) as $artist)
            <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-center text-dark">
                <div class="rounded-circle mx-auto border" style="width: 100px; height: 100px; background-color: #f0f0f0;"></div>
                <div class="mt-3 small">{{ $artist->stage_name }}</div>
            </a>
        @endforeach
    </div>
</x-layout>
