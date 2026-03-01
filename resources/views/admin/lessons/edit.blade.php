@extends('admin.layouts.app')

@section('content')
<div class="info-container ">
    <div class="info-heading">
        <a href="#" class="info-title" style="color: #ffb702;">
            <h5 class="title">Edit Lesson</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #ffb702;">
    <form method="POST" action="{{ route('admin.lesson.update', $lesson->id) }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"  value="{{ $lesson->title }}" required autocomplete="title" autofocus>

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="6" id="description" name="description" required autocomplete="description" autofocus required>{{ $lesson->description }}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="link_video">Link video:</label>
            <input type="text" name="link_video" class="form-control @error('link_video') is-invalid @enderror" id="link_video"  value="{{ $lesson->link_video }}" required autocomplete="link_video" autofocus>

            @error('link_video')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="course">Select course: </label>
            <select name="course" id="course" style="margin: auto" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $lesson->course->id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Update</button>
    </form>
</div>
@endsection