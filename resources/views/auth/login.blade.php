<x-layout>
    <x-slot name="title">{{ __('Login') }}</x-slot>

    <h2>{{ __('Login') }}</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username">{{ __('Username') }}</label>
            <input id="username" type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
    </form>

    <div class="mt-3">
        <p>{{ __('Dont have an account?') }} <a href="{{ route('register') }}">{{ __('Register here') }}</a>.</p>
    </div>
</x-layout>
