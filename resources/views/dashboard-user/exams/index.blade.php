@extends('layouts.board')

@section('content')

<style>
    body {
        background: #f8fafc;
    }

    .course-container {
        padding: 20px;
    }

    .card-box {
        background: #fff;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.06);
    }

    .title {
        font-weight: 600;
        color: #1f2937;
    }

    .course-title {
        font-size: 18px;
        font-weight: 600;
        color: #4f46e5;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .course-title i {
        margin-right: 8px;
    }

    table {
        border-radius: 12px;
        overflow: hidden;
    }

    thead {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
    }

    th, td {
        text-align: center;
        vertical-align: middle !important;
        padding: 12px;
    }

    tr {
        transition: 0.2s;
    }

    tr:hover {
        background: #f1f5f9;
        transform: scale(1.01);
    }

    .score-box {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        display: inline-block;
        min-width: 70px;
    }

    .score-pass {
        background: #d1fae5;
        color: #059669;
    }

    .score-fail {
        background: #fee2e2;
        color: #dc2626;
    }

    .score-none {
        background: #f3f4f6;
        color: #6b7280;
        font-style: italic;
    }

    .btn-exam {
        background: linear-gradient(135deg, #3b82f6, #6366f1);
        border: none;
        border-radius: 8px;
        padding: 6px 14px;
        color: #fff;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-exam:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        opacity: 0.95;
    }
</style>

<div class="course-container">

    <!-- Header -->
    <div class="card-box text-center">
        <h4 class="title">
            👋 Hello, {{ Auth::guard('web')->user()->fullname }}
        </h4>
    </div>

    <!-- Course list -->
    @foreach (Auth::guard('web')->user()->classes as $class)
        <div class="card-box">

            <!-- Course name -->
            <div class="course-title">
                <i class="fas fa-graduation-cap text-gray-400"></i>
                {{ $class->course->name }}
            </div>

            <!-- Table -->
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>📄 Schedule</th>
                        <th>📊 Score</th>
                        <th>⚙ Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($class->course->exams as $exam)
                        @php
                            $scoreObj = $exam->scores
                                ->where('id', Auth::guard('web')->user()->id)
                                ->first();

                            $score = $scoreObj->pivot->score ?? null;
                        @endphp

                        <tr>
                            <td>{{ $exam->name }}</td>

                            <!-- Score -->
                            <td>
                                @if($score !== null)
                                    <span class="score-box {{ $score >= 5 ? 'score-pass' : 'score-fail' }}">
                                        {{ $score }}
                                    </span>
                                @else
                                    <span class="score-box score-none">No point</span>
                                @endif
                            </td>

                            <!-- Action -->
                            <td>
                                @if($score === null && $exam->status == 'UnLock')
                                    <a href="{{ route('student.exam.quiz',$exam->id) }}" class="btn btn-exam">
                                        🚀 Take exam
                                    </a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endforeach

</div>

@endsection