@extends('layouts.board')

@section('content')
<div class="course-heading">
    <a href="#" class="info-title" style=" font-size: 20px;">
        <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
        <h5 class="title">Hello: {{ Auth::guard('web')->user()->fullname }}</h5>
    </a>
    <a href="#" class="info-title" style=" font-size: 20px;">
        <h5 class="title">Course name: {{ $class->course->name }}</h5>
    </a>
</div>
<div class="learn-btn">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6 btn-center mt-30">
                <a href="{{ route('student.class.index') }}" class="btn btn-primary ">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
<div class="info-table-course">
    <table class="table table-st">
        <thead style="background-color: #4268D6; color: #fff;">
            <tr>
                <th>Exam name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class->course->exams as $exam)
            <tr>
                <td>{{ $exam->name }}</td>
                <td>{{$exam->scores->where('id',Auth::guard('web')->user()->id)->first()->pivot->score ?? 'No point'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>  
@endsection