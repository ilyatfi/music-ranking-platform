<x-layout>
    <x-slot name="title">{{ __('Artists') }}</x-slot>

    {{-- Featured Artists --}}
    <div class="mb-5">
        @foreach ($artists->take(2) as $artist)
            <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center mb-4">
                    <div class="rounded-circle me-3" style="width: 100px; height: 100px; background-color: #eee;"></div>
                    <div class="flex-grow-1 border p-3">
                        <strong class="h5 fw-bold">{{ $artist->stage_name }}</strong><br>
                        <small class="text-muted fs-6">{{ $artist->bio }}</small>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Artist Grid --}}
    <div class="row">
        @foreach ($artists->slice(2) as $artist)
            <div class="col-6 col-md-4 col-lg-2 mb-4 text-center">
                <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-dark artist-item">
                    <div class="rounded-circle mx-auto border" style="width: 100px; height: 100px; background-color: #f0f0f0;"></div>
                    <div class="mt-3 h6">{{ $artist->stage_name }}</div>
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
