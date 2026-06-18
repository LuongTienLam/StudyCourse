<?php

namespace App\Http\Controllers;

use App\Registration;
use App\Course;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'class_id' => 'nullable',
            'fullname' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $course = Course::findOrFail($request->course_id);

        $registration = Registration::create([
            'course_id' => $request->course_id,
            'class_id' => $request->class_id,
            'fullname' => $request->fullname,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'amount' => $course->price,
            'payment_status' => 'pending',
            'payment_note' => 'Chưa thanh toán',
        ]);

        return redirect()->route('payment.show', $registration->id);
    }
}