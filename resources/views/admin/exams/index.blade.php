@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
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
                <div class="info-table-course">
                    <table class="table table-st">
                        <thead class="color__theme">
                            <tr>
                                <th>Exam name</th>
                               
                                <th>Exam status</th>
                               
                                
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->exams as $exam)
                            <tr>
                                <td>{{ $exam->name }}</td>
                                
                                <td class="text-align-center">
                                    <div class="btn--default">
                                       <a type="button" class="btn btn-primary mr10" href="{{ route('admin.exam.update',$exam->id) }}">Edit</a>
                                       <a type="button" class="btn @if($exam->status == 'UnLock') btn-success @else btn-dark @endif" href="{{ route('admin.exam.update.status',$exam->id) }}">@if($exam->status == 'UnLock') Activated @else Inactivated @endif</a>
                                    </div>     
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    
    @endforeach
</div>
@endsection