@extends('layouts.board')

@section('content')

<style>
    .course-heading {
        margin-bottom: 20px;
    }

    .title {
        font-weight: 600;
        color: #333;
    }

    .info-table-course {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    table {
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
    }

    th, td {
        text-align: center;
        vertical-align: middle !important;
    }

    tr:hover {
        background: #f1f5f9;
        transition: 0.2s;
    }

    .btn-custom {
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 14px;
        margin: 2px;
        transition: 0.3s;
    }

    .btn-lesson {
        background: #3b82f6;
        color: #fff;
    }

    .btn-score {
        background: #10b981;
        color: #fff;
    }

    .btn-custom:hover {
        transform: scale(1.05);
        opacity: 0.9;
    }
</style>

<div class="course-heading">
    <h4 class="title">
        <i class="fas fa-graduation-cap mr-2"></i>
        Xin chào, {{ Auth::guard('web')->user()->fullname }} 👋
    </h4>
</div>

<div class="info-table-course">
    <table class="table">
        <thead>
            <tr>
                <th>Course name</th>
                <th>Schedule</th>
                <th>Start time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Auth::guard('web')->user()->classes as $class)
            <tr>
                <td><strong>{{ $class->course->name }}</strong></td>
                <td>{{ $class->schedule }}</td>
                <td>{{ $class->start }}</td>
                <td>
                    <a class="btn btn-custom btn-lesson"
                       href="{{ route('student.lesson.show',$class->course->id) }}">
                        📘 Lessons
                    </a>

                    <a class="btn btn-custom btn-score"
                       href="{{ route('student.class.show',$class->id) }}">
                        📊 Score
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection