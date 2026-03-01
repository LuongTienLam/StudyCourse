@extends('layouts.board')

@section('content')

<style>
    .dashboard-title {
        font-size: 32px;
        font-weight: 700;
        color: #2d3748;
    }

    .dashboard-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.35s ease;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }

    .card-primary {
        background: linear-gradient(135deg, #4f46e5, #6366f1);
        color: white;
    }

    .card-success {
        background: linear-gradient(135deg, #10b981, #34d399);
        color: white;
    }

    .card-info {
        background: linear-gradient(135deg, #06b6d4, #38bdf8);
        color: white;
    }

    .card-warning {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        color: white;
    }

    .card-label {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        opacity: 0.9;
    }

    .card-value {
        font-size: 28px;
        font-weight: 700;
    }

    .course-card {
        border-radius: 18px;
        border: none;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    .progress {
        height: 14px;
        border-radius: 10px;
        background: #e5e7eb;
    }

    .progress-bar {
        border-radius: 10px;
    }

    .course-title {
        font-weight: 600;
        color: #374151;
    }
</style>

<div class="container-fluid">

    <div class="mb-4">
        <h1 class="dashboard-title">Dashboard</h1>
    </div>

    <div class="row">

        <!-- General Notification -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.notification.index') }}">
                <div class="card dashboard-card card-primary p-4">
                    <div class="card-label">General Notification</div>
                    <div class="card-value mt-3">{{ $note_generals->count() }}</div>
                    <small>Notifications</small>
                </div>
            </a>
        </div>

        <!-- Specific Notification -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.notification.index') }}">
                <div class="card dashboard-card card-success p-4">
                    <div class="card-label">Specific Notification</div>
                    <div class="card-value mt-3">{{ $note_privates->count() }}</div>
                    <small>Notifications</small>
                </div>
            </a>
        </div>

        <!-- Exams -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.exam.index') }}">
                <div class="card dashboard-card card-info p-4">
                    <div class="card-label">Total Exam</div>
                    <div class="card-value mt-3">{{ $percent_exam }}%</div>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-light" style="width: {{ $percent_exam }}%"></div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Classes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.class.index') }}">
                <div class="card dashboard-card card-warning p-4">
                    <div class="card-label">Classes</div>
                    <div class="card-value mt-3">
                        {{ Auth::guard('web')->user()->classes->count() }}
                    </div>
                    <small>Enrolled</small>
                </div>
            </a>
        </div>

    </div>

    <!-- Courses -->
    <div class="card course-card mt-4">
        <div class="card-header bg-white border-0 py-4">
            <h4 class="mb-0 font-weight-bold text-primary">Courses Progress</h4>
        </div>

        <div class="card-body">

            @foreach (Auth::guard('web')->user()->classes as $class)

                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="course-title">{{ $class->course->name }}</span>
                        <strong>{{ $class->percentExamComplete() }}%</strong>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-danger"
                            style="width: {{ $class->percentExamComplete() }}%">
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

</div>

@endsection