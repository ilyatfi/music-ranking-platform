<x-layout title="Login">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username" >Username:</label>
        <input id="username" type="text" name="username" required value="{{ old('username') }}"><br>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required><br>

        <button type="submit">Login</button>
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
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</x-layout>