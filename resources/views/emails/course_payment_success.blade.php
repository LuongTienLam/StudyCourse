<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thanh toán thành công</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <h2>🎉 Thanh toán khóa học thành công!</h2>

    <p>Xin chào <b>{{ $registration->fullname }}</b>,</p>

    <p>Bạn đã thanh toán thành công khóa học:</p>

    <ul>
        <li><b>Khóa học:</b> {{ $registration->course->name ?? 'N/A' }}</li>
        <li><b>Lớp:</b> {{ $registration->classRoom->schedule ?? 'N/A' }}</li>
        <li><b>Ngày bắt đầu:</b> {{ $registration->classRoom->start ?? 'N/A' }}</li>
        <li><b>Số tiền:</b> {{ number_format($registration->amount) }} VNĐ</li>
        <li><b>Trạng thái:</b> {{ $registration->payment_status }}</li>
    </ul>

    <p>Cảm ơn bạn đã đăng ký khóa học tại <b>SKYLAB CODING</b>.</p>

    <p>Trân trọng,<br>
    SKYLAB CODING Team</p>
</body>
</html>