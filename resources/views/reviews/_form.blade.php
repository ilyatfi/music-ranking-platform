<form method="POST" action="{{ route('reviews.store', $album) }}">
    @csrf
    <div>
        <label>Review:</label>
        <textarea name="content" required></textarea>
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