@extends('admin.layouts.app')

@section('content')
<div class="info-container ">
    <div class="info-heading">
        <a href="#" class="info-title" style="color: #ffb702;">
            <h5 class="title">Edit Manager</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #ffb702;">
    <form method="POST" action="{{ route('admin.manager.update', $admin->id) }}" style="font-size: 16px;margin-top: 20px;">
        @csrf
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="fullname"  value="{{ $admin->fullname }}" required autocomplete="fullname" autofocus>

            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"  value="{{ $admin->phone }}" required autocomplete="phone" autofocus>

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

        <button type="submit" class="btn__default btn--add center__btn">Update</button>
    </form>
</div>
@endsection