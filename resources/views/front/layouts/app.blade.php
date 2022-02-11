<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.layouts.meta')
    
    <title>@yield('title') | {{ _settings('SITE_TITLE') }}</title>
    
    <link href="{{ _fevicon() }}" rel="icon">
    <link href="{{ _fevicon() }}" rel="apple-touch-icon">
    
    @include('front.layouts.styles')
</head>

<body>
    <!-- <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ _settings('CONTACT_EMAIL') }}">{{ _settings('CONTACT_EMAIL') }}</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ _settings('CONTACT_NUMBER') }}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="//{{ _settings('FACEBOOK') }}" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="//{{ _settings('INSTAGRAM') }}" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="//{{ _settings('LINKEDIN') }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section> -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div id="logo">
                <a href="{{ route('home') }}"><img src="{{ _logo() }}" style="max-width: 224px;" alt="Logo"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> -->
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
                    <li><a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                    <li><a class="nav-link scrollto {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    
    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="copyright">
                Copyright © {{ date('Y') }} . All Rights Reserved by <a href="" target="_blank">{{ _settings('SITE_TITLE') }}</a>
            </div>
            <div class="credits">
                Developed by <a href="#">{{ _settings('SITE_TITLE') }}</a>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('front.layouts.scripts')
</body>
</html>