<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CoursePaymentSuccessMail;

class PaymentController extends Controller
{
    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('payment.payment', compact('registration'));
    }

    // API check status (web sẽ tự gọi)
    public function checkStatus($id)
    {
        $registration = Registration::findOrFail($id);

        return response()->json([
            'payment_status' => $registration->payment_status
        ]);
    }

    // Trang điện thoại khi quét QR
    public function mobilePay($id)
    {
        $registration = Registration::findOrFail($id);
        return view('payment.mobile-pay', compact('registration'));
    }

    // Điện thoại bấm thanh toán
    public function mobileConfirm(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);

        if ($registration->payment_status != 'paid') {
            $registration->payment_status = 'paid';
            $registration->save();

            // gửi mail thông báo khóa học
            Mail::to($registration->email)->send(new CoursePaymentSuccessMail($registration));
        }

        return redirect()->back()->with('success', 'Thanh toán thành công!');
    }
    public function confirm(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);

        if ($registration->payment_status != 'paid') {
            return redirect()->back()->with('error', 'Chưa thanh toán!');
        }
        return redirect('/')->with('success', 'Thanh toán thành công!');
    }

    public function vnpay_payment(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        
        $vnp_Url = config('vnpay.url');
        $vnp_Returnurl = config('vnpay.return_url');
        $vnp_TmnCode = config('vnpay.tmn_code');
        $vnp_HashSecret = config('vnpay.hash_secret');

        $vnp_TxnRef = $registration->id . '_' . time(); 
        $vnp_OrderInfo = 'Thanh toan khoa hoc ' . $registration->course->name;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $registration->amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return redirect($vnp_Url);
    }

    public function vnpay_return(Request $request)
    {
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        
        $secureHash = hash_hmac('sha512', $hashData, config('vnpay.hash_secret'));
        
        if ($secureHash == $vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                $txnRef = $request->vnp_TxnRef;
                $id = explode('_', $txnRef)[0];
                $registration = Registration::find($id);
                
                if ($registration && $registration->payment_status != 'paid') {
                    $registration->payment_status = 'paid';
                    $registration->save();
                    
                    try {
                        Mail::to($registration->email)->send(new CoursePaymentSuccessMail($registration));
                    } catch (\Exception $e) {
                    }
                }
                
                return redirect('/')->with('success', 'Thanh toán qua VNPAY thành công!');
            } else {
                return redirect('/')->with('error', 'Thanh toán bị hủy hoặc có lỗi.');
            }
        } else {
            return redirect('/')->with('error', 'Chữ ký không hợp lệ.');
        }
    }
}