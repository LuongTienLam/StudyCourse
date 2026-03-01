@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
    </div>
    <div class="icon_sub">
        <a href="{{ route('admin.course.add') }}">
            <i class="fas fa-plus-circle fa-lg fa-fw mr-2 color__admin "></i>
        </a>
    </div>
    <div class="info-table-course">
        <table class="table table-st">
            <thead class="color__theme">
                <tr>
                    <th>Course name</th>
                    <th>Admin create</th>
                    <th>Total time</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->admin->fullname }}</td>
                    <td>{{ $course->total_time }}</td>
                    <td>$ {{ number_format($course->price, 2) }}</td>
                    <td><img width="120px" height="120px" src="/storage/{{ $course->url_image }}" alt=""></td>
                    <td>
                        <a type="button" class="btn btn-warning" href="{{ route('admin.course.edit', $course->id) }}">Edit</a>
                        <a type="submit" class="btn btn-danger" href="{{ route('admin.course.delete', $course->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection