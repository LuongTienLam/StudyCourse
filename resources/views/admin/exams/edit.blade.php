@extends('admin.layouts.app')

@section('content')
<div class="info-container ">
    <div class="info-heading">
        <a href="#" class="info-title" style="color: #ffb702;">
            <h5 class="title">Edit exam</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #ffb702;">
    <form method="POST" action="{{ route('admin.exam.update', $exam->id) }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="name">Exam name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  value="{{ $exam->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="total_time">Total time:</label>
            <div class="row">
                <div class="col-3">
                    <input type="number" name="total_time" class="form-control @error('total_time') is-invalid @enderror" id="total_time"  value="{{ $exam->total_time }}" required autocomplete="total_time" autofocus>
                </div>
                <div class="col-9">
                    <span><strong>Minute</strong></span>
                </div>
            </div>

            @error('total_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Update</button>
    </form>
</div>
@endsection