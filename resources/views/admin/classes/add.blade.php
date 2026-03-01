@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <h5 class="title">Add class</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.class.store') }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="schedule">Schedule: </label>
            <select name="schedule" id="schedule" style="margin: auto" class="form-control">
                <option value="Evening 2-4-6">Evening 2-4-6</option>
                <option value="Evening 3-5-7" selected="selected">Evening 3-5-7</option>
                <option value="Morning 2-4-6">Morning 2-4-6</option>
                <option value="Morning 3-5-7">Morning 3-5-7</option>
                <option value="Afternoon 2-4-6">Afternoon 2-4-6</option>
                <option value="Afternoon 3-5-7">Afternoon 3-5-7</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start">Start course :</label>
            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" id="start"  value="{{ old('start') }}" required autocomplete="start" autofocus>

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
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Add</button>
    </form>
</div>
@endsection