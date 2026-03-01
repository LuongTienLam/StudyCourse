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

    .card-box {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }

    .btn-back {
        border-radius: 8px;
        padding: 6px 16px;
        background: #6366f1;
        color: #fff;
        transition: 0.3s;
    }

    .btn-back:hover {
        transform: scale(1.05);
        opacity: 0.9;
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

    .score-pass {
        color: #10b981;
        font-weight: bold;
    }

    .score-fail {
        color: #ef4444;
        font-weight: bold;
    }
</style>

<!-- Header -->
<div class="course-heading card-box">
    <h4 class="title">
        👋 Xin chào, {{ Auth::guard('web')->user()->fullname }}
    </h4>

    <h5 class="mt-2">
        📘 Khóa học: <strong>{{ $class->course->name }}</strong>
    </h5>
</div>

<!-- Back button -->
<div class="mb-3">
    <a href="{{ route('student.class.index') }}" class="btn btn-back">
        ⬅ Quay lại
    </a>
</div>

<!-- Table -->
<div class="card-box">
    <table class="table">
        <thead>
            <tr>
                <th>Exam name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class->course->exams as $exam)
            @php
                $scoreObj = $exam->scores->where('id', Auth::guard('web')->user()->id)->first();
                $score = $scoreObj->pivot->score ?? null;
            @endphp

            <tr>
                <td><strong>{{ $exam->name }}</strong></td>
                <td>
                    @if($score !== null)
                        <span class="{{ $score >= 5 ? 'score-pass' : 'score-fail' }}">
                            {{ $score }}
                        </span>
                    @else
                        <span style="color: gray;">Chưa có điểm</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection