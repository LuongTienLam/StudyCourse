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
        <a href="{{ route('admin.lesson.add') }}">
            <i class="fas fa-plus-circle fa-lg fa-fw mr-2 color__admin "></i>
        </a>

    </div>
    <div class="info-table-course">
        <table class="table table-st">
            <thead class="color__theme">
                <tr>
                    <th>
                    <th>Course name</th>
                    <th>Title</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                <tr>
                    <td></td>
                    <td>{{ $lesson->course->name }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>
                        <div class="td-flex">
                        <a type="button" class="btn btn-warning mrl" href="{{ route('admin.lesson.edit', $lesson->id) }}">Edit</a>
                        <a type="button" class="btn btn-primary  " href="{{ route('admin.lesson.show', $lesson->id) }}">Detail</a>
                        <a type="submit" href="{{ route('admin.lesson.delete', $lesson->id) }}" class="btn btn-danger mrl">Delete</a></td>
                        </div>
                    </td>
                
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection