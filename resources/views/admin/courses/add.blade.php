@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <h5 class="title">Add course</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.course.store') }}" enctype="multipart/form-data" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="name">Course name: </label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"  value="{{ old('name') }}" required autocomplete="name" required autofocus>

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
                    <input type="number" name="total_time" class="form-control @error('total_time') is-invalid @enderror" id="total_time"  value="{{ old('total_time') }}" required autocomplete="total_time" autofocus>
                </div>
                <div class="col-9">
                    <span><strong>Month</strong></span>
                </div>
            </div>

            @error('total_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="url_image">Image:</label>
            <input type="file" name="url_image" class="form-control @error('url_image') is-invalid @enderror" id="imgInp"  required>
            <div></div>
            <img id="blah" src="" alt="your image" class="d-none" style="max-width: 200px; max-height: 100px;"/>

            @error('url_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"  value="{{ old('price') }}" required autocomplete="price" autofocus required>

            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="6" id="description" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus required>
            </textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn__default btn--add center__btn">Add</button>
    </form>
</div>
@endsection