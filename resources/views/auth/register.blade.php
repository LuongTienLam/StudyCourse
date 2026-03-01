@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a class="title-link">
            <i class="fas fa-angle-double-down"></i>
            <h3 class="title">Register an Account</h3>
        </a>
    </div>
    @if ($errors->any())
    <div style="background: #ffe6e6; padding: 10px; border-radius: 6px; margin-bottom: 15px;">
        <ul style="color:red; margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="fullname" class="form__label">Full Name:</label>
            <div class="form-input">
                <i class="fas fa-id-card" id="icon-custom"></i>
                <input id="fullname" type="text" class="form__input @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="name" autofocus>
                @error('fullname')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

  
        <div class="form--group">
            <label for="email" class="form__label">Email:</label>
            <div class="form-input">
                <i class="fas fa-envelope" id="icon-custom"></i>
                <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

       
        <div class="form--group">
            <label for="phone" class="form__label">Phone:</label>
            <div class="form-input">
                <i class="fas fa-phone" id="icon-custom"></i>
                <input id="phone" type="text" class="form__input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div class="form--group">
            <label for="birthday" class="form__label">Birthday:</label>
            <div class="form-input">
                <i class="fas fa-calendar-alt" id="icon-custom"></i>
                <input id="birthday" type="date" class="form__input @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required>
                @error('birthday')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

      
        <div class="form--group">
            <label for="password" class="form__label">Password:</label>
            <div class="form-input">
                <i class="fas fa-lock" id="icon-custom"></i>
                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

      
        <div class="form--group">
            <label for="password-confirm" class="form__label">Confirm Password:</label>
            <div class="form-input">
                <i class="fas fa-lock" id="icon-custom"></i>
                <input id="password-confirm" type="password" class="form__input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-button">
            <button type="submit" class="btn-default btn--success">Register</button>
            <a href="{{ route('login') }}" class="btn-default btn--success ml-3 text-light">Back to Login</a>
        </div>
    </form>
</div>
@endsection