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

    @php
        $otherRows = intdiv($artists->count()-3,6) * 6;
    @endphp

    {{-- Artist Grid --}}
    @if($artists->count() > 8)
        @foreach (range(0, $otherRows) as $i)
            <div class="d-flex justify-content-between flex-wrap px-3">
                @foreach ($artists->slice(2 + $otherRows*6, 6) as $artist)
                    <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-center text-dark artist-item">
                        <div class="rounded-circle mx-auto border" style="width: 100px; height: 100px; background-color: #f0f0f0;"></div>
                        <div class="mt-3 h6">{{ $artist->stage_name }}</div>
                    </a>
                @endforeach
            </div>
        @endforeach
    @endif
    @if($artists->count() > 2)
        <div class="d-flex justify-content-between flex-wrap px-3">
            @foreach ($artists->slice(2 + $otherRows, 6) as $artist)
                <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none text-center text-dark artist-item">
                    <div class="rounded-circle mx-auto border" style="width: 100px; height: 100px; background-color: #f0f0f0;"></div>
                    <div class="mt-3 h6">{{ $artist->stage_name }}</div>
                </a>
            @endforeach
        </div>
    @endif

</x-layout>
