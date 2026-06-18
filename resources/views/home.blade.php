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

<section class="course-section" id="about-us" style="padding: 60px 0; background-color: #fff; border-radius: 12px; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <div class="section-title">
        <h2>ABOUT US</h2>
        <div class="section-line"></div>
    </div>
    <div class="row align-items-center" style="padding: 0 30px;">
        <div class="col-md-6 mb-4">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="About Us" class="img-fluid rounded" style="box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
        </div>
        <div class="col-md-6 mb-4">
            <h3 style="color: #224abe; font-weight: 700; margin-bottom: 20px;">Empowering Your Coding Journey</h3>
            <p style="font-size: 16px; color: #555; line-height: 1.8;">At <strong>SKYLAB CODING</strong>, we believe that anyone can learn to code and build amazing things. We provide top-tier, industry-relevant courses designed by expert software engineers to help you kickstart or advance your tech career.</p>
            <p style="font-size: 16px; color: #555; line-height: 1.8;">Our interactive platform combines theory with practical, hands-on projects to ensure you have the real-world skills employers are looking for.</p>
            <div class="d-flex mt-4">
                <div class="mr-5 text-center">
                    <h4 style="color: #2f86eb; font-weight: bold; font-size: 28px;">10K+</h4>
                    <span style="color: #888; font-size: 14px;">Students</span>
                </div>
                <div class="mr-5 text-center">
                    <h4 style="color: #2f86eb; font-weight: bold; font-size: 28px;">50+</h4>
                    <span style="color: #888; font-size: 14px;">Courses</span>
                </div>
                <div class="text-center">
                    <h4 style="color: #2f86eb; font-weight: bold; font-size: 28px;">98%</h4>
                    <span style="color: #888; font-size: 14px;">Success Rate</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-section" id="news" style="padding: 60px 0; margin-bottom: 40px;">
    <div class="section-title">
        <h2>LATEST NEWS</h2>
        <div class="section-line"></div>
    </div>
    <div class="row">
        <!-- News Card 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="News 1" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span style="font-size: 12px; color: #2f86eb; font-weight: bold; text-transform: uppercase;">Technology</span>
                    <h5 class="card-title mt-2" style="font-weight: 600; color: #333;">The Future of Web Development in 2026</h5>
                    <p class="card-text" style="color: #666; font-size: 14px;">Discover the emerging frameworks, tools, and paradigms that will shape the web development landscape over the next year.</p>
                </div>
                <div class="card-footer bg-white border-0 pb-4 pt-0">
                    <a href="javascript:void(0)" style="color: #224abe; font-weight: 600; text-decoration: none;">Read More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
        <!-- News Card 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="News 2" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span style="font-size: 12px; color: #2f86eb; font-weight: bold; text-transform: uppercase;">Event</span>
                    <h5 class="card-title mt-2" style="font-weight: 600; color: #333;">Skylab Coding Hackathon 2026 Announced</h5>
                    <p class="card-text" style="color: #666; font-size: 14px;">Join our annual hackathon. Compete with top developers, build innovative solutions, and win amazing prizes and scholarships.</p>
                </div>
                <div class="card-footer bg-white border-0 pb-4 pt-0">
                    <a href="javascript:void(0)" style="color: #224abe; font-weight: 600; text-decoration: none;">Read More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
        <!-- News Card 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="News 3" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <span style="font-size: 12px; color: #2f86eb; font-weight: bold; text-transform: uppercase;">Student Success</span>
                    <h5 class="card-title mt-2" style="font-weight: 600; color: #333;">From Beginner to Tech Lead in 2 Years</h5>
                    <p class="card-text" style="color: #666; font-size: 14px;">Read the inspiring story of Alex, one of our alumni, who transformed his career through our intensive bootcamp programs.</p>
                </div>
                <div class="card-footer bg-white border-0 pb-4 pt-0">
                    <a href="javascript:void(0)" style="color: #224abe; font-weight: 600; text-decoration: none;">Read More <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-section" id="careers" style="padding: 60px 0; background-color: #f8f9fa; border-radius: 12px; box-shadow: inset 0 0 20px rgba(0,0,0,0.02); margin-bottom: 40px;">
    <div class="section-title">
        <h2>CAREERS</h2>
        <div class="section-line"></div>
    </div>
    
    <div class="row align-items-center" style="padding: 0 30px;">
        <div class="col-md-5 mb-4 text-center">
            <img src="/images/logo.png" alt="Join Skylab" class="img-fluid" style="max-width: 250px; opacity: 0.9;">
            <h4 class="mt-4" style="color: #333; font-weight: 600;">Build the Future With Us</h4>
            <p style="color: #666; font-size: 15px;">We're always looking for passionate educators, brilliant developers, and creative minds to join our mission of democratizing tech education.</p>
        </div>
        <div class="col-md-7 mb-4">
            <div class="list-group" style="box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 8px;">
                <div class="list-group-item d-flex justify-content-between align-items-center p-4 border-0 border-bottom">
                    <div>
                        <h5 style="color: #224abe; font-weight: 600; margin-bottom: 5px;">Senior Backend Instructor</h5>
                        <small style="color: #888;"><i class="fas fa-map-marker-alt mr-1"></i> Da Nang / Remote &nbsp;&bull;&nbsp; Full-time</small>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-outline-primary" style="border-radius: 50px; padding: 6px 20px; font-weight: 500;">Apply</a>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center p-4 border-0 border-bottom">
                    <div>
                        <h5 style="color: #224abe; font-weight: 600; margin-bottom: 5px;">ReactJS Developer</h5>
                        <small style="color: #888;"><i class="fas fa-map-marker-alt mr-1"></i> Hue &nbsp;&bull;&nbsp; Full-time</small>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-outline-primary" style="border-radius: 50px; padding: 6px 20px; font-weight: 500;">Apply</a>
                </div>
                <div class="list-group-item d-flex justify-content-between align-items-center p-4 border-0">
                    <div>
                        <h5 style="color: #224abe; font-weight: 600; margin-bottom: 5px;">Community Manager</h5>
                        <small style="color: #888;"><i class="fas fa-map-marker-alt mr-1"></i> Remote &nbsp;&bull;&nbsp; Part-time</small>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-outline-primary" style="border-radius: 50px; padding: 6px 20px; font-weight: 500;">Apply</a>
                </div>
            </div>
            <div class="text-right mt-3">
                <a href="javascript:void(0)" style="color: #555; text-decoration: underline; font-size: 14px;">View all open positions</a>
            </div>
        </div>
    </div>
</section>

@endsection