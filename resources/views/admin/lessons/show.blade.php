@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="learn-btn">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6 btn-center mt-30">
                    <a href="{{ route('admin.lesson.index') }}" class="btn btn-primary ">
                        <i class="fas fa-backward"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="info-table-course">
        <table class="table table-st">
            <thead style="background-color: #4268D6; color: #fff;">
                <tr>
                    <th>Course name</th>
                    <th>Lesson title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $lesson->course->name }}</td>
                    <td>{{ $lesson->title }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="notification-success text-align">
        <div class="alert-noti">
            <h3>
                <a class="alert-title">
                    {{ $lesson->description }}
                </a>
            </h3>
        </div>
    </div>
    <div class="info-table-course">
        {!! $lesson->link_video !!}
    </div>
    <div class="learn-desc">

    </div>

</div>
@endsection