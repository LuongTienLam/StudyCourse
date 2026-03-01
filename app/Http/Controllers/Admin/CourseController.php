<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('admin.courses.show',compact($course));
    }

    public function create()
    {
        return view('admin.courses.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:courses',
            'total_time' => 'required',
            'url_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',
            'price' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('url_image');
        $image_path = 'uploads/image_course/' . time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/storage/uploads/image_course');

        $image->move($path ,$image_path);

        $course = Course::create([
            'admin_id' => Auth::guard('admin')->user()->id,
            'name' => $data['name'],
            'total_time' => $data['total_time'],
            'url_image' => $image_path,
            'price' => intval(join("",explode(",",$data['price']))),
            'description' => $data['description'],
        ]);

        Exam::create([
            'course_id' => $course->id,
            'name' => 'Mid-term test',
            'status' => 'Lock',
            'total_time' => '20',
        ]);

        Exam::create([
            'course_id' => $course->id,
            'name' => 'Final exam test',
            'status' => 'Lock',
            'total_time' => '20',
        ]);

        return redirect()->route('admin.course.index');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request,Course $course)
    {
        $data = $request->validate([
            'name' => 'required',
            'total_time' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if(isset($request->url_image))
        {
            // DELETE IMAGE EXIST
            if(File::exists(public_path('storage/' . $course->url_image))){

                File::delete(public_path('storage/' . $course->url_image));
            }

            // UPLOAD NEW IMAGE
            $image = $request->file('url_image');
            $image_path = 'uploads/image_course/' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/storage/uploads/image_course');

            $image->move($path ,$image_path);
        }
        else
        {
            $image_path = $course->url_image;
        }

        $course->name = $data['name'];
        $course->total_time = $data['total_time'];
        $course->url_image = $image_path;
        $course->price = $data['price'];
        $course->description = $data['description'];
        $course->save();

        return redirect()->route('admin.course.index');
    }

    public function destroy(Request $request,Course $course)
    {
        if(File::exists(public_path('storage/' . $course->url_image))){

            File::delete(public_path('storage/' . $course->url_image));
        }

        foreach($course->exams as $exam)
        {
            $exam->delete();
        }

        $course->delete();

        return redirect()->route('admin.course.index');
    }

}
