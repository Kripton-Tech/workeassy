<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.layouts.meta')
    
    <title>@yield('title') | {{ _settings('SITE_TITLE') }}</title>
    
    <link href="{{ _fevicon() }}" rel="icon">
    <link href="{{ _fevicon() }}" rel="apple-touch-icon">
    
    @include('front.layouts.styles')

    <style>
        footer p{
            padding: 0;
            margin: 0 0 10px 0;
        }

        .text-center-align{
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }

        .back-to-top{
            background-color:#e7c850;
        }
    </style>
    <style>
        #float .label-container{
            position:fixed;
            bottom:48px;
            right:105px;
            display:table;
            visibility: hidden;
        }

        #float .label-text{
            color:#FFF;
            background:rgba(51,51,51,0.5);
            display:table-cell;
            vertical-align:middle;
            padding:10px;
            border-radius:3px;
        }

        #float .label-arrow{
            display:table-cell;
            vertical-align:middle;
            color:#333;
            opacity:0.5;
        }

        #float .float{
            position: fixed;
            width: 40px;
            height: 40px;
            bottom: 65px;
            right: 16px;
            background-color:#e7c850;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
            z-index:1000;
            animation: bot-to-top 2s ease-out;
        }

        #float .float:hover{
            background-color:#51d8af;
        }

        #float ul{
            position:fixed;
            right:16px;
            padding-bottom:20px;
            bottom:80px;
            z-index:100;
        }

        #float ul li{
            list-style:none;
            margin-bottom:10px;
        }

        #float ul li a{
            background-color:#e7c850;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
            width:40px;
            height:40px;
            display:block;
        }

        #float ul li a:hover{
            background-color:#51d8af;
        }

        #float ul:hover{
            visibility:visible!important;
            opacity:1!important;
        }

        #float .my-float{
            font-size: 18px;
            margin-top: 12px;
        }

        #float a#menu-share + ul{
            visibility: hidden;
        }

        #float a#menu-share:hover + ul{
            visibility: visible;
            animation: scale-in 0.5s;
        }

        #float a#menu-share i{
            animation: rotate-in 0.5s;
        }

        #float a#menu-share:hover > i{
            animation: rotate-out 0.5s;
        }

        @keyframes bot-to-top {
            0%   {bottom:-40px}
            50%  {bottom:40px}
        }

        @keyframes scale-in {
            from {transform: scale(0);opacity: 0;}
            to {transform: scale(1);opacity: 1;}
        }

        @keyframes rotate-in {
            from {transform: rotate(0deg);}
            to {transform: rotate(360deg);}
        }

        @keyframes rotate-out {
            from {transform: rotate(360deg);}
            to {transform: rotate(0deg);}
        }
    </style>
    <style>
        .contact-cancel{
            background: #204D74;
            border: 0;
            border-radius: 3px;
            padding: 10px 30px;
            color: #fff;
            transition: 0.4s;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div id="logo">
                <a href="{{ route('home') }}"><img src="{{ _logo() }}" style="max-width: 224px;" alt="Logo"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    @php
                        $option_path = URL('uploads/workspace').'/';
                        $options = DB::table('workspaces')
                                        ->select('id', 'title', DB::Raw("CONCAT(SUBSTRING(".'description'.", 1, 100), '...') as description"),
                                                DB::Raw("CASE
                                                    WHEN ".'image'." != '' THEN CONCAT("."'".$option_path."'".", ".'image'.")
                                                    ELSE CONCAT("."'".$option_path."'".", 'default.png')
                                                END as image")
                                            )
                                        ->where(['status' => 'active'])
                                        ->get();
                    @endphp
                    <li class="dropdown"><a href="#"><span>Workspace +</span></a>
                        <ul>
                            @if($options->isNotEmpty())
                                @foreach($options as $row)
                                    <li><a href="{{ route('option', ['id' => base64_encode($row->id)]) }}">{{ $row->title ?? '' }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li><a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" href="{{ route('faq') }}">Faq's</a></li>
                    <li><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="nav-link {{ Request::is('learneasy') ? 'active' : '' }}" href="{{ route('learneasy') }}">LearnEasy</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    
    @yield('content')

    <footer class="text-center text-lg-start text-dark" style="background-color: #204d74; color:white !important;">
        <section class="p-0 pt-2">
            <div class="container text-center text-md-start mt-2">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                        <h6 class="text-uppercase fw-bold">About Company</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p><i class="bx bxs-home mr-3"></i>  {{ _settings('CONTACT_ADDRESS') }}</p>
                        <p><i class='bx bxs-envelope mr-3' ></i> {{ _settings('CONTACT_EMAIL') }}</p>
                        <p><i class='bx bxs-phone-call mr-3'></i> {{ _settings('CONTACT_NUMBER') }}</p>
                        <p><i class='bx bxs-phone-call mr-3'></i> {{ _settings('MAIN_CONTACT_NUMBER') }}</p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                        <h6 class="text-uppercase fw-bold">Useful Links</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p><a href="{{ route('about') }}" class="text-white">About Workeassy</a></p>
                        <p><a href="{{ route('gallery') }}" class="text-white">Latest Media</a></p>
                        @if($options->isNotEmpty())
                            @foreach($options as $row)
                                <p><a href="{{ route('option', ['id' => base64_encode($row->id)]) }}" class="text-white">{{ $row->title ?? '' }}</a></p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                        <h6 class="text-uppercase fw-bold">Contact US</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p>
                            <a href="//{{ _settings('FACEBOOK') }}" class="facebook text-center-align text-white">
                                <i class="fa fa-facebook-square fa-2x"></i> &nbsp; Facebook
                            </a>
                        </p>
                        <p>
                            <a href="//{{ _settings('INSTAGRAM') }}" class="instagram text-center-align text-white">
                                <i class="fa fa-instagram fa-2x"></i> &nbsp; Instagram
                            </a>
                        </p>
                        <p>
                            <a href="//{{ _settings('YOUTUBE') }}" class="youtube text-center-align text-white">
                                <i class="fa fa-youtube fa-2x"></i> &nbsp; Youtube
                            </a>
                        </p>
                        <p>
                            <a href="//{{ _settings('LINKEDIN') }}" class="linkedin text-center-align text-white">
                                <i class="fa fa-linkedin-square fa-2x"></i> &nbsp; LinkedIn
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="float">
        <a href="javascript:void(0)" class="float" id="menu-share">
            <i class="fa fa-share my-float"></i>
        </a>
        <ul>
            <li><a href="//api.whatsapp.com/send?phone={{ str_replace('-', '', str_replace(' ', '', str_replace('+', '', _settings('CONTACT_NUMBER')))) }}&text=Hi" target="_blank"><i class="fa fa-whatsapp my-float"></i></a></li>
            <li><a href="tel:{{ str_replace('-', '', str_replace(' ', '', _settings('CONTACT_NUMBER'))) }}"><i class="fa fa-phone my-float"></i></a></li>
            <li>
                <a data-bs-toggle="modal" data-bs-target="#contactusModel">
                    <i class="fa fa-envelope my-float"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="modal fade floatModel" id="contactusModel" tabindex="-1" aria-labelledby="contactusModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactusModelLabel">Contact US</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="form" id="contact">
                    <form action="{{ route('contactus') }}" method="post" role="form" class="php-email-form" name="contact" id="contact" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('POST')

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" id="name" class="form-control input" placeholder="Your Name">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" name="email" id="email" class="form-control input" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" name="subject" id="subject" class="form-control input" placeholder="Subject">
                            </div>
                            <div class="form-group mt-3">
                                <textarea name="message" id="message" class="form-control input" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="form-submit" type="submit" class="btn btn-primary">Send Message</button>
                            <button type="button" class="contact-cancel" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('front.layouts.scripts')
</body>
</html>