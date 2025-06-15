<x-layout>
    <x-slot name="title">{{ __('Register') }}</x-slot>

    <h2>{{ __('Create Account') }}</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>{{ __('Username') }}</label>
            <input name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>{{ __('Email') }}</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>{{ __('Password') }}</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>{{ __('Confirm Password') }}</label>
            <input name="password_confirmation" type="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">{{ __('Register') }}</button>
    </form>

    <div class="mt-3">
        <p>{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login here') }}</a>.</p>
    </div>
</x-layout>
