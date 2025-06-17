<x-layout title="Create Artist">
    <h2>{{ __('Create New Artist') }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('artists.store') }}" enctype="multipart/form-data">
        @csrf

        <label>User:</label>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>

        <label>Stage Name:</label>
        <input type="text" name="stage_name" required>

        
        <label for="profile_picture">Profile Picture</label>
        <input type="file" name="profile_picture">

        <label>Bio:</label>
        <textarea name="bio"></textarea>

        <button type="submit">{{ __('Create Artist') }}</button>
    </form>
</x-layout>