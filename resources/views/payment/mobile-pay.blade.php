@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div style="max-width:500px;margin:auto;background:white;padding:25px;border-radius:12px;box-shadow:0 4px 12px rgba(0,0,0,0.15)">
        <h3>Thanh toán khóa học</h3>

        <p><b>Họ tên:</b> {{ $registration->fullname }}</p>
        <p><b>Email:</b> {{ $registration->email }}</p>
        <p><b>Số tiền:</b> {{ number_format($registration->amount) }} VNĐ</p>

        @if(session('success'))
            <div style="background:#d4edda;padding:10px;border-radius:6px;color:green;margin-bottom:10px;">
                {{ session('success') }}
            </div>
        @endif

        @if($registration->payment_status == 'paid')
            <h4 style="color:green;">✅ Đã thanh toán</h4>
        @else
            <form method="POST" action="{{ route('mobile.pay.confirm', $registration->id) }}">
                @csrf
                <button type="submit" style="width:100%;padding:12px;background:#0a2a47;color:white;border:none;border-radius:8px;font-weight:bold;">
                    Xác nhận thanh toán
                </button>
            </form>
        @endif
    </div>
</div>
@endsection