<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="index.html"><img class="img-fluid for-light" src="{{ asset('assets/panel/images/logo/logo.png') }}"
                    alt="">
                <img class="img-fluid for-dark" src="{{ asset('assets/panel/images/logo/logo_dark.png') }}" alt="">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="index.html">
                <img class="img-fluid" src="{{ asset('./assets/images/logo-icon.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            @can('RoleAdmin')
                @include('components.panel.sidebar-component.sidebar-admin')
            @endcan
            @can('RoleStaff')
                @include('components.panel.sidebar-component.sidebar-staff')
            @endcan
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
