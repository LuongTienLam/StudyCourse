@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <div class="login-card">

        <h2 class="login-title">Login</h2>
        <p class="login-subtitle">Welcome back! Please login to continue.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="login-group">
                <label for="email">Email</label>
                <div class="login-input">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email"
                        class="@error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                </div>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="login-group">
                <label for="password">Password</label>
                <div class="login-input">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password"
                        class="@error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                </div>

                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- BUTTON -->
            <button type="submit" class="login-btn-main">
                Login
            </button>

            <!-- LINKS -->
            <div class="login-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            </div>

        </form>
    </div>
</div>
@endsection