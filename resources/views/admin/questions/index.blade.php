@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
    </div>
    <div class="justify-between">
        <div class="">
            <a href="{{ route('admin.question.add') }}"><button class="btn btn-primary">Add Question</button></a>
        </div>
        <div class="">
            <a href="{{ route('admin.question.import') }}"><button class="btn btn-success">Add Question With Excel Or CSV File</button></a>
        </div>
    </div>
    @foreach ($courses as $course)
    <div class="course-heading-title">
        <div class="row exam-title-color-class">
            <div class="container">
                <div class="col-sm-12 " style="text-align: center" ;>
                    <a href="" class="exam-title-class">
                        <i class="fab fa-vuejs"></i>
                        {{$course->name}}</a>
                </div>
            </div>
        </div>  
    </div>
    <div class="info-table-course">
        <table class="table table-st">
            <thead class="color__theme">
                <tr>
                    <th>Exam name</th>
                    <th>Number of easy question</th>
                    <th>Number of medium question</th>
                    <th>Number of hard question</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->exams as $exam)
                <tr>
                    <td>{{ $exam->name }}</td>
                    <td>{{ $exam->questions()->where('level','Easy')->get()->count() }}</td>
                    <td>{{ $exam->questions()->where('level','Medium')->get()->count() }}</td>
                    <td>{{ $exam->questions()->where('level','Hard')->get()->count() }}</td>
                    <td>
                        <a type="button" class="btn btn-warning" href="{{ route('admin.question.show.exam',$exam->id) }}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection