@extends('front.layouts.app')

@section('meta')
@endsection

@section('title')
    LearnEasy Skill Development
@endsection

@section('styles')
@endsection

@section('content')
<main id="main">
    <section id="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 about-img mb-5 d-flex align-items-center">
                    <img src="{{ asset('frontend/img/learneasy/learneasy-logo.png') }}" alt="Learneasy" class="px-3">
                </div>
                <div class="col-lg-6 content pl-5 mb-5">
                    <h2 class="fw-bold">LearnEasy Skill Development Center</h2>
                    <p>
                        Learneasy Skill Development Center is a branch under the the umbrella of WorkEasy coworking space formed to impart knowledge and train people for the new age. It aims to improve skill sets in such a way that provides people the opportunity to grow and sustain in the ever changing society.
                        Through short skill development sessions to much longer and detailed workshops, LearnEasy aims to equip participants with the skills required to succeed in 2021.
                    </p>
                    <a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLScDcqlNUURFeGcRMlOK5zdxnjaUxXin_imm5eDvfawUpd7b2w/viewform">Enroll Now</a>
                </div>
            </div>
        </div>
        <div class="container mt-3" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 content pr-5 mb-5 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="fw-bold">Who is it for?</h2>
                    <p>This skill development center is for Aspiring Learners, Professionals, and for those who want to learn unique skills .</p>
                </div>
                <div class="col-lg-6 about-img mb-5 d-flex align-items-center">
                    <img src="{{ asset('frontend/img/learneasy/new-project.png') }}" alt="Learneasy" class="px-3">
                </div>
            </div>
        </div>
    </section>
    <section id="team">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-header">
                <h1 class="text-center">Our Teaching Team</h1>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="member">
                        <div class="pic">
                            <img src="{{ asset('frontend/img/learneasy/richa-bhagdev.jpg') }}" alt="Richa Bhagdev">
                        </div>
                        <div class="details">
                            <h4>Richa Bhagdev</h4>
                            <span>Personality Development Expert</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-12">
                    <p class="text-center">Mrs Richa Bhagdev is into education & skill development teaching since last 10 years and she is certified Google Trainer.</p>
                </div>
            </div>
        </div>
    </section>   
    <section class="p-0">
        <div class="my-5 py-5" style="background-color: #e1e1e1;" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-3 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('frontend/img/learneasy/event-poster.jpg') }}" alt="Event Poster">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-0">
        <div class="" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Master the Art of Body Language</h2>
                        <p>In this session you will learn the art of body language and here is  the overview of few modules we will be covering in the session:</p>
                    </div>
                    <div class="col-sm-12">
                        <ul>
                            <li>Module 1 : What is Alpha Behaviour</li>
                            <li>Module 2 : Approachable and Non- Approachable</li>
                            <li>Module 3 : Body language in Business/Professions</li>
                            <li>Module 4 :  Common mistakes</li>
                            <li>Module 5 :  Public Speaking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="p-0">
        <div class="my-5 py-5" style="background-color: #b9c5dd;" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mb-3 d-flex flex-column align-items-center justify-content-center">
                        <h1 class="text-center">Master the Art of Body Language</h1>
                    </div>
                </div>
                <div class="row pb-4" style="background-color: #8795b1;" >
                    <div class="col-sm-1 d-flex justify-content-center mt-3">
                        <i class='bx bxs-time bx-md'></i>
                    </div>
                    <div class="col-sm-11">
                        <h1 class="mt-2">Session Timing</h1>
                        <p class="m-0">Date : 31st January 2021</p>
                        <p class="m-0">Day : Sunday</p>
                        <p class="m-0">Time : 10:00 am to 5:00 pm</p>
                        <p class="m-0">Venue : WorkEasy Coworking Space</p>
                        <p class="m-0">Organisers : Learneasy Skill Development Center</p>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-sm-12">
                        <h4>We are glad to announce first module of Learneasy Skill Development Center , Body Language for Entrepreneurs, Professionals and Students’ This 7 hour Workshop will help you to learn everything about BODY LANGUAGE and its importance in our professional life. </h4>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-sm-6 mt-3">
                        <h4>For further details Contact us</h4>
                        <h5>Email Id : connect@workeasy.in</h5>
                        <h5>Call us : 99799 10101</h5>
                    </div>
                    <div class="col-sm-6">
                        <iframe src="{!! _settings('LOCATION') !!}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
@endsection