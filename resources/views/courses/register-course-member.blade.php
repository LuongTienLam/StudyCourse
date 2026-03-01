@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a href="#" class="title-link">
            <i class="fas fa-user-plus"></i>
            <h3 class="title">Register the course</h3>
        </a>
    </div>
    <form method="POST" action="{{ route('register-course-member.store',$course->id) }}">
        @csrf
        <div class="form-group">
            <label for="course">Select course:</label>

            <select name="course" id="course" style="margin: auto" class="form__input">
                <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="class">Select start time and schedule:</label>

            <select name="class" id="class" style="margin: auto" class="form__input">
                @foreach ($course->classes as $class)
                    <option value="{{ $class->id }}">{{ $class->start }} {{ $class->schedule }}</option>
                @endforeach
            </select>
        </div>

        @if(Session::has('message'))
            <div>
                <strong class="text-primary">{{ Session::get('message') }}</strong>
            </div>
        @endif

        <button type="submit" class="btn-default btn--success center__btn" style="margin-top: 20px;">Register</button>
    </form>
</div>
@endsection