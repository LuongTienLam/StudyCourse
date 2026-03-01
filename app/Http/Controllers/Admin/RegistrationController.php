<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registration;

class RegistrationController extends Controller
{
    public function index(Request $request)
{
    $query = Registration::query();

    //  filter theo status
    if ($request->status == 'paid') {
        $query->where('payment_status', 'paid');
    }

    if ($request->status == 'pending') {
        $query->where('payment_status', 'pending');
    }

    $registrations = $query->get();

    return view('admin.registrations.index', compact('registrations'));
}

    public function confirm($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->payment_status = 'paid';
        $registration->payment_note = 'Admin confirmed';
        $registration->save();

        return back()->with('success', 'Đã xác nhận thanh toán');
    }
}