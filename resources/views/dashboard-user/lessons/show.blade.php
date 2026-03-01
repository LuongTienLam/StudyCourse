@extends('layouts.board')

@section('content')
<div class="course-heading">
    <a href="#" class="info-title" style=" font-size: 20px;">
        <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
        <h5 class="title">Hello: {{ Auth::guard('web')->user()->fullname }}</h5>
    </a>
</div>
<div class="course-container">
    <div class="learn-btn">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6 btn-center mt-30">
                    <a href="{{ route('student.class.index') }}" class="btn btn-primary ">
                        <i class="fas fa-backward"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="info-table-course">
        <div class="exam-container">
            <div class="exam-item">
                <div class="container-fluid">
                    <div class="row exam-title-color">
                        <div class="col-sm-6">
                            <a href="" class="exam-title">
                                <i class="fab fa-vuejs"></i>
                                {{ $course->name }}</a>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                    @foreach ($lessons as $lesson)
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4  ">
                                    <a href="{{ route('student.lesson.show-lesson',$lesson->id) }}"
                                        class=" btn--exam exam-item exam-item--separate icon--separate">
                                        <i class="far fa-play-circle"></i>
                                        Lesson {{ $loop->index + 1 }}
                                    </a>
                                </div>
                                <div class="col-sm-6">{{ $lesson->title }}</div>
                                <div class="col-sm-2"><i
                                    class="fas fa-graduation-cap fa-sm fa-fw mr-2 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection