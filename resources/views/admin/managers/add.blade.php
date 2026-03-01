@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <h5 class="title">Add Manager</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.manager.store') }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname"  value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>

            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="emal" name="email" class="form-control @error('email') is-invalid @enderror" id="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"  value="{{ old('password') }}" required autocomplete="password" autofocus>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"  value="{{ old('phone') }}" required autocomplete="phone" autofocus>

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" style="margin: auto" class="form-control">
                <option value="Admin">Admin</option>
                <option value="Manager" selected="selected">Manager</option>
            </select>
        </div>

        <button type="submit" class="btn__default btn--add center__btn">Add</button>
    </form>
</div>
@endsection