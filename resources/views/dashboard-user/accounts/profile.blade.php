@extends('layouts.board')

@section('content')

<style>
    body {
        background: #f8fafc;
    }

    .info-container {
        max-width: 600px;
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
        font-size: 20px;
        font-weight: 600;
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

    .avatar-preview {
        text-align: center;
        margin-top: 10px;
    }

    .avatar-preview img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #e5e7eb;
        transition: 0.3s;
    }

    .avatar-preview img:hover {
        transform: scale(1.05);
    }

    .btn-update {
        width: 100%;
        margin-top: 20px;
        background: linear-gradient(135deg, #f59e0b, #f97316);
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

        <form method="POST" action="{{ route('student.account.update-profile') }}" enctype="multipart/form-data">
            @csrf

            <!-- Fullname -->
            <div class="form-group">
                <label for="fullname">👤 Fullname</label>
                <input id="fullname" type="text"
                    class="form-control @error('fullname') is-invalid @enderror"
                    name="fullname"
                    value="{{ Auth::guard('web')->user()->fullname }}" required>

                @error('fullname')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Birthday -->
            <div class="form-group">
                <label for="birthday">🎂 Birthday</label>
                <input id="birthday" type="date"
                    class="form-control @error('birthday') is-invalid @enderror"
                    name="birthday"
                    value="{{ Auth::guard('web')->user()->birthday }}" required>

                @error('birthday')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">📱 Phone number</label>
                <input id="phone" type="tel"
                    placeholder="0123456789"
                    pattern="0[0-9]{9}"
                    class="form-control @error('phone') is-invalid @enderror"
                    name="phone"
                    value="{{ Auth::guard('web')->user()->phone }}" required>

                @error('phone')
                    <span class="invalid-feedback d-block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Avatar -->
            <div class="form-group">
                <label for="url_avatar">🖼 Avatar</label>
                <input type="file"
                    name="url_avatar"
                    class="form-control @error('url_avatar') is-invalid @enderror"
                    id="imgInp">

                <div class="avatar-preview">
                    <img id="previewImg"
                         src="{{ Auth::guard('web')->user()->url_avatar }}"
                         alt="avatar">
                </div>

                @error('url_avatar')
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

            <!-- Button -->
            <button type="submit" class="btn-update">
                🚀 Update Profile
            </button>
        </form>

    </div>
</div>

<!-- Preview ảnh -->
<script>
    document.getElementById("imgInp").onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            document.getElementById("previewImg").src = URL.createObjectURL(file);
        }
    };
</script>

@endsection