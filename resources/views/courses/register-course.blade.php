@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">

    <div class="form-container">

        <div class="form-heading">
            <a href="#" class="title-link">
                <i class="fas fa-user-plus"></i>
                <h3 class="title">Register the course</h3>
            </a>
        </div>
        @if ($errors->any())
    <div style="background:#ffe6e6;padding:10px;border-radius:6px;margin-bottom:15px;">
        <ul style="color:red;margin:0;padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('register-course.store', $course->id) }}">
            @csrf

            <div class="form-group">
                <label for="course">Select course</label>
                <select name="course" id="course" class="form__input">
                    <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="class">Select start time and schedule</label>
                <select name="class" id="class" class="form__input">
                    @foreach ($course->classes as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->start }} - {{ $class->schedule }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="form__input" placeholder="Enter your fullname">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form__input">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form__input" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="text" name="phone" id="phone" class="form__input" placeholder="Enter phone number">
            </div>

            @if(Session::has('message'))
                <div class="mt-3">
                    <strong class="text-primary">{{ Session::get('message') }}</strong>
                </div>
            @endif

            <button type="submit" class="center__btn mt-4">
                Register
            </button>

        </form>
    </div>

</div>
@endsection