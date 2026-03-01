@extends('layouts.board')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('web')->user()->fullname }}</h5>
        </a>
    </div>
    <div class="info-table-course">
        <div id="minute" style="display: none">{{ $exam->total_time }}</div>
        <table class="table table-st">
            <thead style="background-color: #4268D6; color: #fff;">
                <tr>
                    <th>Course name</th>
                    <th>Exam name</th>
                    <th>Your score</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $exam->course->name }}</td>
                    <td>{{ $exam->name }}</td>
                    <th>{{ $countCorrectAnswer }}</th>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ route('student.exam.index') }}"><button class="btn btn-primary mt-5">Back</button></a>
</div>
@endsection