@extends('admin.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Import Question</div>
            <div class="card-body">
                @if (session('status'))
                    <div role="alert" class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.question.import.store') }}" enctype="multipart/form-data" style="font-size: 16px;margin-top: 20px;">
                    @csrf
                    <div class="form-group">
                        <label for="file">Question name: </label>
                        <input type="file" name="file" class="form-control" required required autofocus>
                    </div>
                    <button type="submit" class="btn__default btn--add center__btn">Add</button>
                </form>

                @if (isset($errors) && $errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection