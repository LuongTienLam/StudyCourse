@extends('layouts.app')

@section('content')
<div style="max-width: 1100px; margin: 50px auto; display: flex; gap: 40px;">

    {{-- 🔵 BÊN TRÁI --}}
    <div style="flex:1; background:#f8f9fa; padding:35px; border-radius:12px;">

        <h2 style="margin-bottom:25px; font-size:28px;">Thông tin thanh toán</h2>

        <p style="font-size:18px;"><strong>Khóa học:</strong> {{ $registration->course->name ?? 'N/A' }}</p>
        <p style="font-size:18px;"><strong>Họ tên:</strong> {{ $registration->fullname }}</p>
        <p style="font-size:18px;"><strong>Email:</strong> {{ $registration->email }}</p>
        <p style="font-size:18px;"><strong>SĐT:</strong> {{ $registration->phone }}</p>

        <hr style="margin:20px 0;">

        <h3 style="color:green; font-size:24px;">
             {{ number_format($registration->amount) }} VND
        </h3>

        {{--  ẢNH KHÓA HỌC --}}
        <div style="margin-top:30px;">
            <img 
                src="/storage/{{ $registration->course->url_image ?? '' }}" 
                style="width:100%; border-radius:10px; object-fit:cover;"
            >
        </div>
    </div>
    @if($registration->payment_status == 'paid')
            <h2 style="color: green; text-align:center;">✅ Thanh toán thành công</h2>
        @else
            <h2 style="color: orange; text-align:center;">⏳ Đang chờ thanh toán...</h2>
        @endif

    {{-- 🟢 BÊN PHẢI --}}
    <div style="flex:1; text-align:center; background:white; padding:35px; border-radius:12px; box-shadow:0 0 15px rgba(0,0,0,0.1);">

        <h3 style="font-size:24px;">Thanh toán Online an toàn</h3>
        <p style="color: gray; margin-bottom: 20px;">Hỗ trợ thanh toán qua thẻ ATM nội địa, Visa/Mastercard, VNPay QR.</p>

        {{-- BUTTONS --}}
        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <form method="POST" action="{{ route('payment.vnpay', $registration->id) }}">
                @csrf
                <button style="padding:14px 30px; font-size:16px; background:#005baa; color:white; border:none; border-radius:6px; cursor:pointer; font-weight:bold;">
                    Thanh toán qua VNPAY
                </button>
            </form>
        </div>

        {{-- STATUS --}}
        @if($registration->payment_status == 'paid')
            <p style="color:green; font-size:18px; margin-top:15px;">✅ Thanh toán thành công</p>
        @else
            <p style="color:red; font-size:18px; margin-top:15px;">❌ Chưa thanh toán</p>
        @endif

    </div>
    <script>
let isPaid = "{{ $registration->payment_status }}" === "paid";

if (!isPaid) {
    let interval = setInterval(function() {
        fetch("{{ route('payment.status', $registration->id) }}")
            .then(res => res.json())
            .then(data => {
                if (data.payment_status === "paid") {
                    clearInterval(interval); // dừng check
                    location.reload();       // reload 1 lần
                }
            });
    }, 2000);
}
</script>
</div>
@endsection