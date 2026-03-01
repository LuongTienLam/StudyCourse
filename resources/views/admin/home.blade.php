@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- TOP STATS -->
    <div class="row">

        <!-- USERS -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <a href="/admin/students" style="text-decoration:none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            USERS
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-500">
                            {{ $users->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- COURSES -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <a href="/admin/courses" style="text-decoration:none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            COURSES
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-500">
                            {{ $courses->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- CLASSES -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <a href="/admin/classes" style="text-decoration:none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            CLASSES
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-500">
                            {{ $classes->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- LESSONS -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <a href="/admin/lessons" style="text-decoration:none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            LESSONS
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-500">
                            {{ $lessons->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- ADMIN / MANAGER -->
    <div class="row justify-content-around">

        <div class="col-md-6 mb-4 text-align-center">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body text-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        ADMINS
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-500">
                        {{ $admins->count() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4 text-align-center">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body text-center">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        MANAGERS
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-500">
                        {{ $managers->count() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- PAYMENT STATS -->
    <div class="row justify-content-around">

        <!-- REGISTRATIONS -->
        <div class="col-md-4 mb-4 text-align-center">
            <a href="/admin/registrations" style="text-decoration:none;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            REGISTRATIONS
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $registrations->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- PAID -->
        <div class="col-md-4 mb-4 text-align-center">
            <a href="/admin/registrations?status=paid" style="text-decoration:none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            PAID
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $paid->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- PENDING -->
        <div class="col-md-4 mb-4 text-align-center">
            <a href="/admin/registrations?status=pending" style="text-decoration:none;">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body text-center">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            PENDING
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $pending->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>
@endsection