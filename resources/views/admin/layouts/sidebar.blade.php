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
                <li class="sidebar-item @route('admin.category*') selected @endroute">
                    <a class="sidebar-link @route('admin.category*') active @endroute" href="{{ route('admin.category') }}" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.blog*') selected @endroute">
                    <a class="sidebar-link @route('admin.blog*') active @endroute" href="{{ route('admin.blog') }}" aria-expanded="false">
                        <i class="fas fa-rss-square"></i>
                        <span class="hide-menu">Blogs</span>
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
                <li class="sidebar-item @route('admin.gallery*') selected @endroute @route('admin.galleries-category*') selected @endroute"> 
                    <a class="sidebar-link has-arrow @route('admin.gallery*') active @endroute" href="javascript:void(0)" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box feather-icon">
                            <path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path>
                            <polyline points="2.32 6.16 12 11 21.68 6.16"></polyline>
                            <line x1="12" y1="22.76" x2="12" y2="11"></line>
                        </svg>
                        <span class="hide-menu">Galleries</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item @route('admin.galleries-category*') active @endroute">
                            <a href="{{ route('admin.galleries-category') }}" class="sidebar-link">
                                <span class="hide-menu"> Categories </span>
                            </a>
                        </li>
                        <li class="sidebar-item @route('admin.gallery*') active @endroute">
                            <a href="{{ route('admin.gallery') }}" class="sidebar-link">
                                <span class="hide-menu"> Galleries </span>
                            </a>
                        </li>
                    </ul>
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
                <li class="sidebar-item @route('admin.faq*') selected @endroute">
                    <a class="sidebar-link @route('admin.faq*') active @endroute" href="{{ route('admin.faq') }}" aria-expanded="false">
                        <i class="fas fa-comment"></i>
                        <span class="hide-menu">Faqs</span>
                    </a>
                </li>
                <li class="sidebar-item @route('admin.testimonial*') selected @endroute">
                    <a class="sidebar-link @route('admin.testimonial*') active @endroute" href="{{ route('admin.testimonial') }}" aria-expanded="false">
                        <i class="fas fa-address-card"></i>
                        <span class="hide-menu">Testimonials</span>
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