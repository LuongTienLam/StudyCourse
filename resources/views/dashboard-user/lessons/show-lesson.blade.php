@extends('layouts.board')

@section('content')
<div class="course-container">

    <!-- Nút quay lại -->
    <div class="learn-btn">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6 btn-center mt-30">
                    <a href="{{ route('student.lesson.show',$lesson->course->id) }}" class="btn btn-primary ">
                        <i class="fas fa-backward"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông tin course -->
    <div class="info-table-course">
        <table class="table table-st">
            <thead style="background-color: #4268D6; color: #fff;">
                <tr>
                    <th>Course name</th>
                    <th>Lesson</th>
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

    <!-- Mô tả -->
    <div class="notification-success text-align">
        <div class="alert-noti">
            <h3>
                <a class="alert-title">
                    {{ $lesson->description }}
                </a>
            </h3>
        </div>
    </div>

    <!-- Video -->
    <div class="info-table-course">
        {!! $lesson->link_video !!}
    </div>

    <!-- 🔥 PHẦN HIỂN THỊ CODE -->
    <div class="learn-desc mt-4">
        <h4>Example Code</h4>

        <pre id="lesson-code" style="
            background:#1e1e2f;
            color:#ffffff;
            padding:15px;
            border-radius:10px;
            overflow:auto;
            font-family: monospace;
            font-size:14px;
        ">
{!! nl2br(e($lesson->code_example)) !!}
        </pre>
    </div>

</div>
@endsection