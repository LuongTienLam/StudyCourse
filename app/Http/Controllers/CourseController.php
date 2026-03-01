<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

public function create(Request $request, Course $course)
{
    $data = $request->validate([
        'course' => 'required',
        'class' => 'required',
        'fullname' => 'required|max:255',
        'birthday' => 'required',
        'phone' => 'required',
        'email' => 'required|email|max:255',
    ]);

    $user = User::where('email', $data['email'])->first();

    if (!$user) {
        $user = User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'url_avatar' => 'https://ui-avatars.com/api/?name=' . $data['fullname'],
            'password' => '',
            'status' => 'Waiting'
        ]);
    }

        // nếu đã có registration của lớp này
    $existingRegistration = \App\Registration::where('email', $data['email'])
        ->where('course_id', $course->id)
        ->where('class_id', $data['class'])
        ->orderBy('id', 'desc')
        ->first();

    if ($existingRegistration) {
        if ($existingRegistration->payment_status == 'paid') {
            return redirect()->back()->with('message', 'Bạn đã đăng ký và thanh toán lớp này rồi!');
        } else {
            // chưa thanh toán -> quay lại trang payment
            return redirect('/payment/' . $existingRegistration->id)
                ->with('message', 'Bạn đã đăng ký lớp này nhưng chưa thanh toán. Vui lòng thanh toán để hoàn tất.');
        }
    }

    //  attach class không bị lỗi trùng
    $user->classes()->syncWithoutDetaching([$data['class']]);

    // tạo registration
    $registration = \App\Registration::create([
        'course_id' => $course->id,
        'class_id' => $data['class'],
        'fullname' => $data['fullname'],
        'birthday' => $data['birthday'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'amount' => $course->price ?? 1000000,
        'payment_status' => 'pending',
    ]);

    // chuyển sang payment
    return redirect('/payment/' . $registration->id);
}

    public function showFormRegisterCourse(Course $course)
    {
        return view('courses.register-course',compact('course'));
    }

    public function showCourse(Course $course)
    {
        return view('courses.show-course',compact('course'));
    }

    public function showFormRegisterCourseForMember(Course $course)
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('register-course',$course->id);
        }   

        return view('courses.register-course-member',compact('course'));
    }

    public function createForMember(Request $request,Course $course)
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('register-course',$course->id);
        }   

        $data = $request->validate([
            'course' => 'required',
            'class' => 'required',
        ]);
        
        $classStudents = Auth::guard('web')->user()->classes;


        foreach($classStudents as $class)
        {
            if($class->id == $data['class'])
            {
                $request->session()->flash('message', 'You have already registered for this course, Please choose another course !');

                return redirect()->route('register-course-member',$course->id);
            }
        }

        Auth::guard('web')->user()->classes()->attach($data['class']);

        $request->session()->flash('message', 'Successful registration !');

        return redirect()->route('register-course-member',$course->id);
    }
}
