@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <h5 class="title">Add general notification</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.notification.general.store') }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="class">Select class: </label>
            <select name="class" id="class" style="margin: auto" class="form-control">
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->course->name }} {{ $class->start }} {{ $class->schedule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title"  value="{{ old('title') }}" required autocomplete="title" autofocus>

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control @error('content') is-invalid @enderror" rows="6" id="content" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus required>
            </textarea>

            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Add</button>
    </form>
</div>
@endsection