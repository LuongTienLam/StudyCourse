@extends('admin.layouts.app')

@section('content')
<div class="info-container ">
    <div class="info-heading">
        <a href="#" class="info-title" style="color: #ffb702;">
            <h5 class="title">Edit class</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #ffb702;">
    <form method="POST" action="{{ route('admin.class.update', $class->id) }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="schedule">Lịch học</label>
            <select name="schedule" id="schedule" style="margin: auto" class="form-control">
                <option value="Evening 2-4-6" {{ $class->schedule == 'Evening 2-4-6' ? 'selected' : '' }}>Evening 2-4-6</option>
                <option value="Evening 3-5-7" {{ $class->schedule == 'Evening 3-5-7' ? 'selected' : '' }}>Evening 3-5-7</option>
                <option value="Morning 2-4-6" {{ $class->schedule == 'Morning 2-4-6' ? 'selected' : '' }}>Morning 2-4-6</option>
                <option value="Morning 3-5-7" {{ $class->schedule == 'Morning 3-5-7' ? 'selected' : '' }}>Morning 3-5-7</option>
                <option value="Afternoon 2-4-6" {{ $class->schedule == 'Afternoon 2-4-6' ? 'selected' : '' }}>Afternoon 2-4-6</option>
                <option value="Afternoon 3-5-7" {{ $class->schedule == 'Afternoon 3-5-7' ? 'selected' : '' }}>Afternoon 3-5-7</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start">Start course :</label>
            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" id="start"  value="{{ $class->start }}" required autocomplete="start" autofocus>

            @error('start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="course">Select course :</label>
            <select name="course" id="course" style="margin: auto" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $class->course->id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Update</button>
    </form>
</div>
@endsection