<form method="POST" action="{{ route('ratings.store', $album) }}">
    @csrf
    <div>
        <label>Rating (1-10):</label>
        <input type="number" name="score" min="1" max="10" required>
    </div>
    <button type="submit">Submit</button>
</form>
@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif