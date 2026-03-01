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
        <a href="{{ route('admin.class.add') }}">
            <i class="fas fa-plus-circle fa-lg fa-fw mr-2 color__admin "></i>
        </a>

    </div>
    <div class="info-table-course">
        <table class="table table-st">
            <thead class="color__theme">
                <tr>
                    <th>Course</th>
                    <th>Schedule</th>
                    <th>Start course</th>
                    <th>Number of students</th>
                    <th></th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->course->name }}</td>
                    <td>{{ $class->schedule }}</td>
                    <td>{{ $class->start }}</td>
                    <td>{{ $class->users->count() }}</td>
                    <td>
                        <a type="button" class="btn btn-warning" href="{{ route('admin.class.edit', $class->id) }}">Edit</a>
                        <a type="submit" href="{{ route('admin.class.delete', $class->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection