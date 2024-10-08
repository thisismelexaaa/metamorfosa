<div id="sidebar-menu">
    <ul class="sidebar-links" id="simple-bar">
        <li class="back-btn">
            <a href="index.html">
                <img class="img-fluid" src="{{ asset('./assets/images/logo-icon.png') }}" alt="">
            </a>
            <div class="mobile-back text-end">
                <span>Back</span>
                <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
            </div>
        </li>
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title {{ request()->routeIs('dashboard.*') ? 'active' : '' }}"
                href="{{ route('dashboard.index') }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Beranda</span>
            </a>
        </li>
        <li class="my-2 sidebar-list">
            <span class="text-secondary"><i class="bi bi-speedometer2"></i> Master</span>
        </li>
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title {{ request()->routeIs('customers.*') ? 'active' : '' }}"
                href="{{ route('customers.index') }}">
                <i class="bi bi-people-fill"></i>
                <span>Pelanggan</span>
            </a>
        </li>
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title {{ request()->routeIs('konsultasi.*') ? 'active' : '' }}"
                href="{{ route('konsultasi.index') }}">
                <i class="bi bi-file-medical"></i>
                <span>Konsultasi</span>
            </a>
        </li>
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title {{ request()->routeIs('schedule.*') ? 'active' : '' }}"
                href="{{ route('schedule.index') }}">
                <i class="bi bi-calendar-week-fill"></i>
                <span>Jadwal</span>
            </a>
        </li>
    </ul>
</div>
