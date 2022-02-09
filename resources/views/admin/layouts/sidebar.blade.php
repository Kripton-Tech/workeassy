<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item {{ Request::is('dashboard*') ? 'selected' : '' }}"> 
                    <a class="sidebar-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('slider*') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ Request::is('slider*') ? 'active' : '' }}" href="{{ route('admin.slider') }}" aria-expanded="false">
                        <i class="fas fa-file-image"></i>
                        <span class="hide-menu">Sliders</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('toward*') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ Request::is('toward*') ? 'active' : '' }}" href="{{ route('admin.toward') }}" aria-expanded="false">
                        <i class="fas fa-handshake"></i>
                        <span class="hide-menu">Approch Towards</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('video*') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ Request::is('video*') ? 'active' : '' }}" href="{{ route('admin.video') }}" aria-expanded="false">
                        <i class="fas fa-play"></i>
                        <span class="hide-menu">Coworking Videos</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('contact*') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('admin.contact') }}" aria-expanded="false">
                        <i class="fas fa-id-card"></i>
                        <span class="hide-menu">Contact US</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('settings*') ? 'selected' : '' }}">
                    <a class="sidebar-link {{ Request::is('settings*') ? 'active' : '' }}" href="{{ route('admin.settings') }}" aria-expanded="false">
                        <i class="fas fa-sun"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>