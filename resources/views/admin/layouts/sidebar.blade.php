<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item @route('admin.dashboard*') selected @endroute"> 
                    <a class="sidebar-link @route('admin.dashboard*') active @endroute" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.workspace*') selected @endroute">
                    <a class="sidebar-link @route('admin.workspace*') active @endroute" href="{{ route('admin.workspace') }}" aria-expanded="false">
                        <i class="fas fa-briefcase"></i>
                        <span class="hide-menu">Workspaces</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.slider*') selected @endroute">
                    <a class="sidebar-link @route('admin.slider*') active @endroute" href="{{ route('admin.slider') }}" aria-expanded="false">
                        <i class="fas fa-file-image"></i>
                        <span class="hide-menu">Sliders</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.gallery*') selected @endroute">
                    <a class="sidebar-link @route('admin.gallery*') active @endroute" href="{{ route('admin.gallery') }}" aria-expanded="false">
                        <i class="fas fa-camera"></i>
                        <span class="hide-menu">Galleries</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.toward*') selected @endroute">
                    <a class="sidebar-link @route('admin.toward*') active @endroute" href="{{ route('admin.toward') }}" aria-expanded="false">
                        <i class="fas fa-handshake"></i>
                        <span class="hide-menu">Approch Towards</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.about*') selected @endroute">
                    <a class="sidebar-link @route('admin.about*') active @endroute" href="{{ route('admin.about') }}" aria-expanded="false">
                        <i class="fas fa-exclamation"></i>
                        <span class="hide-menu">About Sections</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.blog*') selected @endroute">
                    <a class="sidebar-link @route('admin.blog*') active @endroute" href="{{ route('admin.blog') }}" aria-expanded="false">
                        <i class="fas fa-comment"></i>
                        <span class="hide-menu">Blogs</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.contact*') selected @endroute">
                    <a class="sidebar-link @route('admin.contact*') active @endroute" href="{{ route('admin.contact') }}" aria-expanded="false">
                        <i class="fas fa-id-card"></i>
                        <span class="hide-menu">Contact US</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.settings*') selected @endroute">
                    <a class="sidebar-link @route('admin.settings*') active @endroute" href="{{ route('admin.settings') }}" aria-expanded="false">
                        <i class="fas fa-sun"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>