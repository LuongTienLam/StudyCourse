@extends('admin.layouts.app')

@section('content')
<div class="info-container">
    <div class="info-heading">
        <a href="#" class="info-title">
            <i class="fas fa-user-circle" id="icon-padding"></i>
            <h5 class="title">Your infomation</h5>
        </a>
    </div>
    <hr class="sidebar-divider my-0" style="background-color: #4268D6;">
    <form method="POST" action="{{ route('admin.account.update-profile') }}">
        @csrf

        <div class="form-group">
            <label for="fullname">Fullname :</label>
            <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ Auth::guard('admin')->user()->fullname }}" required autocomplete="fullname" autofocus>
            
            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone number :</label>
            <input id="phone" type="tel" placeholder="0123456789" pattern="0[0-9]{9}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::guard('admin')->user()->phone }}" required autocomplete="phone" autofocus>
            
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if(Session::has('message'))
            <span>
                <strong class="text-primary">{{ Session::get('message') }}</strong>
            </span>
        @endif

        <button type="submit" class="btn__default btn--warn center__btn" style="margin-top: 20px;">Update</button>
    </form>
</div>

@endsection