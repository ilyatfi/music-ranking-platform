<x-layout title="Create Artist">
    <h2>{{ __('Create New Artist') }}</h2>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('artists.store') }}">
        @csrf

        <label>User:</label>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>

        <label>Stage Name:</label>
        <input type="text" name="stage_name" required>

        <label>Bio:</label>
        <textarea name="bio"></textarea>

        <button type="submit">{{ __('Create Artist') }}</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>