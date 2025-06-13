<x-layout title="Register">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="username" >Username:</label>
        <input id="username" type="text" name="username" required value="{{ old('username') }}"><br>

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required value="{{ old('email') }}"><br>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required value="{{ old('password') }}"><br>

        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required><br>

        <button type="submit">Register</button>
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
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</x-layout>