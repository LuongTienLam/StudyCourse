@extends('admin.layouts.app')

@section('content')
<div class="form-container-admin" style="margin-top: -10px;">
   <div class="container-admin">

       <div class="form-heading">
           <a href="#" class="form-title-link">
               <i class="fas fa-user-circle fa-2x text-gray-300" id="icon-custom"></i>
               <h3 class="title">Login to Course Online Admin</h3>
           </a>
       </div>
       <form method="POST" action="{{ route('admin.excute.login') }}">
           @csrf
           <div class="form-group">
               <label for="email">Fullname :</label>
               <div class="form-input">
                   <i class="fas fa-user fa-sm fa-fw mr-2 " id="icon-custom"></i>
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
               
                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
               </div>
           </div>
           <div class="form-group">
               <label for="pwd">Password :</label>
               <div class="form-input">
                   <i class="fas fa-lock fa-sm fa-fw mr-2" id="icon-custom"></i>
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
   
                   @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                   
               </div>
           </div>
           @if(isset($error))
               <span>
                   <strong>{{ $error }}</strong>
               </span>
           @endif
           <div class="form-button">
               <button type="submit" class="btn__default btn--add center__btn-admin   ">Login</button>
           </div>
       </form>
   </div>
</div>
@endsection