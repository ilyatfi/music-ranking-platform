<x-layout title="Admin">
    <div class="container">
        <h2 class="mb-4">{{ __('Moderate Reviews') }}</h2>

        @forelse ($reviews as $review)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="mb-1">
                                <strong>{{ $review->user->username }}</strong>
                                {{ __('on') }}
                                <em>
                                    <a href="{{ route('albums.show', $review->album) }}" class="text-decoration-none text-dark">
                                        {{ $review->album->title }}
                                    </a>
                                </em>
                            </h6>
                            <p class="mb-2">{{ $review->content }}</p>
                        </div>
                        <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('{{ __('Are you sure you want to delete this review?') }}')">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                {{ __('There are no reviews to moderate.')}}
            </div>
        @endforelse
    </div>
</x-layout>
