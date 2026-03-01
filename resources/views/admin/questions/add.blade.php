@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <h5 class="title">Add question</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.question.store') }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="name">Question name: </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  value="{{ old('name') }}" required autocomplete="name" required autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer_1">Answer 1: </label>
            <input type="text" name="answer_1" class="form-control @error('answer_1') is-invalid @enderror" id="answer_1"  value="{{ old('answer_1') }}" required autocomplete="answer_1" required autofocus>

            @error('answer_1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer_2">Answer 2: </label>
            <input type="text" name="answer_2" class="form-control @error('answer_2') is-invalid @enderror" id="answer_2"  value="{{ old('answer_2') }}" required autocomplete="answer_2" required autofocus>

            @error('answer_2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer_3">Answer 3: </label>
            <input type="text" name="answer_3" class="form-control @error('answer_3') is-invalid @enderror" id="answer_3"  value="{{ old('answer_3') }}" required autocomplete="answer_3" required autofocus>

            @error('answer_3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer_4">Answer 4: </label>
            <input type="text" name="answer_4" class="form-control @error('answer_4') is-invalid @enderror" id="answer_4"  value="{{ old('answer_4') }}" required autocomplete="answer_4" required autofocus>

            @error('answer_4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer_right">Answer right: </label>
            <select name="answer_right" id="answer_right" style="margin: auto" class="form-control">
                <option value="answer_1">Answer 1</option>
                <option value="answer_2">Answer 2</option>
                <option value="answer_3">Answer 3</option>
                <option value="answer_4">Answer 4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="course">Select course: </label>
            <select name="course" id="course" style="margin: auto" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exam">Exam name: </label>
            <select name="exam" id="exam" style="margin: auto" class="form-control">
                <option value="Mid-term test">Mid-term test</option>
                <option value="Final exam test">Final exam test</option>
            </select>
        </div>
        <div class="form-group">
            <label for="level">Level: </label>
            <select name="level" id="level" style="margin: auto" class="form-control">
                <option value="Easy">Easy</option>
                <option value="Medium">Medium</option>
                <option value="Hard">Hard</option>
            </select>
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Add</button>
    </form>
</div>
@endsection