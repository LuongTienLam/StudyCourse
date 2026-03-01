@extends('layouts.app')

@section('content')
<div class="note-section">
    <div class="title-section">
        <div class="title-heading ">
            <a href="{{ route('home') }}" class="title-heading-a text-white">
                <i class="fas fa-home icon-padding"></i>
            </a>
        </div>
        
        <div class="title-heading ">
            <a href="@auth {{ route('register-course',$course->id) }} @else {{ route('register-course',$course->id) }} @endauth" class="title-heading-a " >
                <i class="fas fa-book-open m-right fa-sm fa-fw mr-2 text-gray-400"></i> Register now</a>
        </div>

        <div class="title-heading ">
            <a href="#" type="button" class="title-heading-a">
                <i class="fas fa-phone m-right fa-sm fa-fw mr-2 text-gray-400"></i>
                Support</a>
        </div>

        <div class="title-heading ">
            <a href="" class="title-heading-a">
                <i class="fab fa-vuejs"></i>
                Course price : $ {{ number_format($course->price, 2) }}
            </a>
        </div>
    </div>
 
    <div class="notification-success text-align">
        <div class="alert-noti">
            <h3>
                <a href="#" class="alert-title">
                    {{ $course->name }}
                </a>
            </h3>
        </div>
    </div>
    <div class="intro-course">
        <div class="desc-main">
            <p>{{ $course->description }}</p>
            <div class="img-paner">
                <img src="/storage/{{ $course->url_image }}" alt="" class="img-paner-item">
            </div>
            <div class="title-intro">
                <div class="intro-item">
                    <p class="head head--color"><i>IF YOU ARE:</i></p>
                    <p>
                        - Students majoring in IT, Telecom and are ignoring the lines of code<br>
                        - You have learned a lot of programming languages ​​but still haven't made any real projects<br>
                        - You studied well, got high marks, but looking at the code, you feel dizzy and can't code<br>
                        - You can program but want to learn it methodically and improve it with high difficulty and complex projects<br> </p>
                </div>
                <div class="intro-item">
                    <p class="head head--color"><i>IF YOU ARE:</i></p>
                    <p>
                        - Students looking for a reputable and quality programming training center to study?<br>
                        - Are you a tester, or want to change your career to IT?<br>
                        - Studied at many centers but not effective<br></p>
                </div>
                <div class="intro-item text-align">
                    <p class="head head--note">THEN THIS IS THE COURSE FOR YOU !!!</p>
                </div>
            </div>
        </div>

    </div>



    <div class="row">

    </div>



</div>

<div class="note-section">
    <div class="section-heading title--separate--md">
        <i class="fab fa-vuejs"></i>
        Course price and offers
    </div>
    <div class="row">
        <div class="col-sm-5 ">
            <h3 class="note-title m-left color-red">
                <i class="fas fa-coins"></i>
                How to pay course price?
            </h3>
            <ul class="note-list">
                <li class="note-item"><strong>Direct:</strong> Office at 154 Pham Nhu Xuong</li>
                <li class="note-item"><strong>Bank Transfer to Vietcombank:</strong> 004 1000 82 53</li>
                <li class="note-item"><strong>Transition content:</strong> yourname-phone-{{ $course->name }}</li>

            </ul>
        </div>
    </div>
 
</div>
@endsection