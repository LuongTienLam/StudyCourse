@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
    </div>
    <div>Fullname: {{ $user->fullname }}</div>
    <div>Email: {{ $user->email }}</div>
    <div>Phone number: {{ $user->phone }}</div>

    <hr>

    <div>Classes</div>  
    @foreach ($user->classes as $class)
        <h4><strong>Course name: {{ $class->course->name }}</strong></h4>
        <p>Schedule: {{ $class->schedule }}</p>
        <p>Start: {{ $class->start }}</p>
    @endforeach
</div>
@endsection