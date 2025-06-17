<x-layout title="Create Artist">
    <div class="container">
        <h2 class="mb-4">{{ __('Create New Artist') }}</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('artists.store') }}" class="card p-4 shadow-sm">
            @csrf

            {{-- User Select --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">{{ __('User') }}</label>
                <select name="user_id" id="user_id"
                        class="form-select @error('user_id') is-invalid @enderror"
                        required>
                    <option value="" disabled selected>{{ __('User') }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Stage Name --}}
            <div class="mb-3">
                <label for="stage_name" class="form-label">{{ __('Stage Name') }}</label>
                <input type="text" name="stage_name" id="stage_name"
                       class="form-control @error('stage_name') is-invalid @enderror"
                       value="{{ old('stage_name') }}" required>
                @error('stage_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bio --}}
            <div class="mb-3">
                <label for="bio" class="form-label">{{ __('Bio') }}</label>
                <textarea name="bio" id="bio" rows="4"
                          class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">
                {{ __('Create Artist') }}
            </button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>
