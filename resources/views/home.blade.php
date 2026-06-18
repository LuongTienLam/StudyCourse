@extends('layouts.app')

@section('content')

<section class="course-section" id="course-section">
    <div class="section-title">
        <h2>COURSE</h2>
        <div class="section-line"></div>
    </div>

    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4 mb-4">
            <div class="course-card">
                <div class="course-icon">
                    <img src="/storage/{{$course->url_image}}" alt="{{$course->name}}">
                </div>

                <div class="course-body">
                    <div class="course-price">$ {{ number_format($course->price, 2) }}</div>

                    <h3 class="course-name">
                        <a href="{{ route('course.show',$course->id) }}">
                            {{ $course->name }}
                        </a>
                    </h3>

                    <div class="course-time">
                        / {{ $course->total_time }} Months
                    </div>

                    <p class="course-desc">
                        {{ $course->description }}
                    </p>

                    <div class="course-actions">
                        <a href="{{ route('course.show',$course->id) }}" class="btn-learn">LEARN MORE</a>

                        <a href="{{ route('register-course', $course->id) }}" class="btn-enroll">ENROLL</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="course-section" id="about-us">
    <div class="section-title">
        <h2>ABOUT US</h2>
        <div class="section-line"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center" style="padding: 40px 20px;">
            <p style="font-size: 18px; color: #555;">Welcome to Skylab Coding. We provide the best online courses for your career development.</p>
        </div>
    </div>
</section>

<section class="course-section" id="news">
    <div class="section-title">
        <h2>NEWS</h2>
        <div class="section-line"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center" style="padding: 40px 20px;">
            <p style="font-size: 18px; color: #555;">Stay tuned for our latest updates, events, and tech news.</p>
        </div>
    </div>
</section>

<section class="course-section" id="careers">
    <div class="section-title">
        <h2>CAREERS</h2>
        <div class="section-line"></div>
    </div>
    <div class="row">
        <div class="col-12 text-center" style="padding: 40px 20px;">
            <p style="font-size: 18px; color: #555;">Join our team! Check out the open positions below and apply today.</p>
        </div>
    </div>
</section>

@endsection