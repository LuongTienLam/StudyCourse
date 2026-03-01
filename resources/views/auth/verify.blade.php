@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow p-4" style="max-width:600px;margin:auto;border-radius:12px;">
        <h3 class="mb-3">Xác thực Email</h3>

        @if (session('resent'))
            <div class="alert alert-success">
                Link xác thực đã được gửi lại.
            </div>
        @endif

        <p>
            Bạn cần xác thực email trước khi sử dụng các chức năng quan trọng.
            Hãy kiểm tra hộp thư và nhấn vào link xác thực.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                Gửi lại email xác thực
            </button>
        </form>
    </div>
</div>
@endsection