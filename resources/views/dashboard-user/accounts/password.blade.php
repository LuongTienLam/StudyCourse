@extends('layouts.board')

@section('content')

<style>
    body {
        background: #f8fafc;
    }

    .info-container {
        max-width: 500px;
        margin: 40px auto;
    }

    .card-box {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }

    .info-title {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 20px;
        color: #1f2937;
        margin-bottom: 20px;
    }

    .info-title i {
        margin-right: 8px;
        font-size: 22px;
        color: #6366f1;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
        color: #374151;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 2px rgba(99,102,241,0.2);
    }

    .btn-update {
        width: 100%;
        margin-top: 20px;
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        border: none;
        border-radius: 10px;
        padding: 10px;
        color: #fff;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        opacity: 0.95;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
        padding: 10px;
        border-radius: 8px;
        margin-top: 10px;
        text-align: center;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        padding: 10px;
        border-radius: 8px;
        margin-top: 10px;
        text-align: center;
    }

    .invalid-feedback {
        font-size: 13px;
    }
</style>

<div class="info-container">
    <div class="card-box">

        <!-- Title -->
        <div class="info-title">
            <i class="fas fa-user-circle"></i>
            Your Information
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('student.account.update-password') }}">
            @csrf

            <!-- Old password -->
            <div class="form-group">
                <label for="old_password">🔒 Old password</label>
                <input id="old_password" type="password"
                    class="form-control @error('old_password') is-invalid @enderror"
                    name="old_password" required>

                @error('old_password')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- New password -->
            <div class="form-group">
                <label for="password">🆕 New password</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required>

                @error('password')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Confirm -->
            <div class="form-group">
                <label for="password_confirmation">✅ Confirm password</label>
                <input id="password_confirmation" type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" required>

                @error('password_confirmation')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Message -->
            @if(Session::has('message'))
                <div class="alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert-error">
                    {{ Session::get('error') }}
                </div>
            @endif

            <!-- Button -->
            <button type="submit" class="btn-update">
                🚀 Update Password
            </button>
        </form>

    </div>
</div>

@endsection