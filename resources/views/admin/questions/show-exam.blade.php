@extends('admin.layouts.app')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('admin')->user()->fullname }}</h5>
        </a>
    </div>
    <div>{{ $exam->name }} | {{ $exam->course->name }}</div>

    <hr>
    <div class="question-list">
        <div class="question-item--easy">
            <span class="question-title--easy">Easy level</span>
            
            @foreach ($exam->questions()->where('level','Easy')->get() as $question)
                <div class="row">
                    <div class="col-sm-8">
                        <div class="question-text">
                       <strong> Câu hỏi:</strong> {{ $question->name }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ route('admin.question.edit',$question->id) }}"><button class="btn btn-primary">Update</button></a>
                        <a href="{{ route('admin.question.delete',$question->id) }}"><button class="btn btn-danger">Delete</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6">A: {{ $question->answer_1 }}</div>
                            <div class="col-6">B: {{ $question->answer_2 }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6">C: {{ $question->answer_3 }}</div>
                            <div class="col-6">D: {{ $question->answer_4 }}</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <strong>Answer right:</strong>  {{ $question->answer_right }}
                    </div>
                </div>
                <hr class="sidebar-divider my-0 easy">
            @endforeach
        </div>
    </div>

    <hr>
    <div class="question-list">
        <div class="question-item--hard">
    <span class="question-title--hard">Medium level</span>
    @foreach ($exam->questions()->where('level','Medium')->get() as $question)
        <div class="row">
            <div class="col-8">
               <strong> Câu hỏi:</strong> {{ $question->name }}
            </div>
            <div class="col-4">
                <a href="{{ route('admin.question.edit',$question->id) }}"><button class="btn btn-primary">Update</button></a>
                <a href="{{ route('admin.question.delete',$question->id) }}"><button class="btn btn-danger">Delete</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">A: {{ $question->answer_1 }}</div>
                    <div class="col-6">B: {{ $question->answer_2 }}</div>
                </div>
                <div class="row">
                    <div class="col-6">A: {{ $question->answer_3 }}</div>
                    <div class="col-6">B: {{ $question->answer_4 }}</div>
                </div>
            </div>
            <div class="col-4">
                <strong>Answer right:</strong>  {{ $question->answer_right }}
            </div>
        </div>
        <hr class="sidebar-divider my-0 hard">
    @endforeach
        </div>
    </div>
    <hr>
    <div class="question-list">
        <div class="question-item--tryhard">
    <span class="question-title--tryhard">Hard level</span>
    @foreach ($exam->questions()->where('level','Hard')->get() as $question)
        <div class="row">
            <div class="col-8">
               <strong> Câu hỏi:</strong> {{ $question->name }}
            </div>
            <div class="col-4">
                <a href="{{ route('admin.question.edit',$question->id) }}"><button class="btn btn-primary">Update</button></a>
                <a href="{{ route('admin.question.delete',$question->id) }}"><button class="btn btn-danger">Delete</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-6">A: {{ $question->answer_1 }}</div>
                    <div class="col-6">B: {{ $question->answer_2 }}</div>
                </div>
                <div class="row">
                    <div class="col-6">A: {{ $question->answer_3 }}</div>
                    <div class="col-6">B: {{ $question->answer_4 }}</div>
                </div>
            </div>
            <div class="col-4">
                <strong>Answer right:</strong>  {{ $question->answer_right }}
            </div>
        </div>
        <hr class="sidebar-divider my-0 tryhard">
    @endforeach
        </div>
    </div>
</div>
@endsection