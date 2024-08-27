<div class="container">
    <div class="site-navigation">
        <a href="index.html" class="logo m-0 float-left">{{ env('APP_NAME') }}<span class="text-primary">.</span></a>

        <ul class="js-clone-nav d-none d-lg-inline-block site-menu float-left">
            <li class="active"><a href="#home-section" class="nav-link">Beranda</a></li>
            {{-- <li class="has-children">
                <a href="#" class="nav-link">Dropdown</a>
                <ul class="dropdown">
                    <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                    <li><a href="elements.html" class="nav-link">Elements</a></li>
                    <li class="has-children">
                        <a href="#">Menu Two</a>
                        <ul class="dropdown">
                            <li><a href="#" class="nav-link">Sub Menu One</a></li>
                            <li><a href="#" class="nav-link">Sub Menu Two</a></li>
                            <li><a href="#" class="nav-link">Sub Menu Three</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="nav-link">Menu Three</a></li>
                </ul>
            </li> --}}
            <li><a href="#about-section" class="nav-link">Tentang</a></li>
            <li><a href="#aktivitas-section" class="nav-link">Aktivitas</a></li>
            <li><a href="#layanan-section" class="nav-link">Layanan</a></li>
            <li><a href="#klien-section" class="nav-link">Klien</a></li>
        </ul>

        @if (Route::has('login'))
            @auth
                <ul class="js-clone-nav d-none mt-1 d-lg-inline-block site-menu float-right">
                    <li class="cta-button-outline">
                        <a href="{{ route('dashboard.index') }}">Dahsboard</a>
                    </li>
                </ul>
            @else
                <ul class="js-clone-nav d-none mt-1 d-lg-inline-block site-menu float-right">
                    <li class="cta-button-outline">
                        <a href="{{ route('login') }}">Sign in</a>
                    </li>
                    {{-- <li class="cta-primary">
                        <a href="{{ route('register') }}">Register</a>
                    </li> --}}
                </ul>
            @endauth
        @endif

        <a href="#"
            class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block dark d-lg-none"
            data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>

    </div>
</div>
