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

    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
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
                        <p><a href="{{ route('about') }}" class="text-dark">About Workeassy</a></p>
                        <p><a href="{{ route('gallery') }}" class="text-dark">Latest Media</a></p>
                        @if($options->isNotEmpty())
                            @foreach($options as $row)
                                <p><a href="{{ route('option', ['id' => base64_encode($row->id)]) }}" class="text-dark">{{ $row->title ?? '' }}</a></p>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                        <h6 class="text-uppercase fw-bold">Contact US</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                        <p>
                            <a href="//{{ _settings('FACEBOOK') }}" class="facebook text-center-align" >
                                <i class="fa fa-facebook-square fa-2x"></i>
                            </a> &nbsp; Facebook
                        </p>
                        <p>
                            <a href="//{{ _settings('INSTAGRAM') }}" class="instagram text-center-align">
                                <i class="fa fa-instagram fa-2x"></i>
                            </a> &nbsp; Instagram
                        </p>
                        <p>
                            <a href="//{{ _settings('YOUTUBE') }}" class="youtube text-center-align">
                                <i class="fa fa-youtube fa-2x"></i>
                            </a> &nbsp; Youtube
                        </p>
                        <p>
                            <a href="//{{ _settings('LINKEDIN') }}" class="linkedin text-center-align">
                                <i class="fa fa-linkedin-square fa-2x"></i>
                            </a> &nbsp; LinkedIn
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section id="topbar" class="d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <span>Copyright © {{ date('Y') }} {{ _settings('SITE_TITLE') }}</span>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="//{{ _settings('FACEBOOK') }}" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="//{{ _settings('INSTAGRAM') }}" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="//{{ _settings('YOUTUBE') }}" class="youtube"><i class="bi bi-youtube"></i></i></a>
                    <a href="//{{ _settings('LINKEDIN') }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
        </section> -->
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('front.layouts.scripts')
</body>
</html>