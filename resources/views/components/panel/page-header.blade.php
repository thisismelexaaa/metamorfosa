<div class="page-header">
    <div class="header-wrapper row m-0 justify-content-between">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.html">
                    <img class="img-fluid" src="../assets/images/logo/logo.png" alt="">
                </a>
            </div>
            <div class="toggle-sidebar">
                <div class="status_toggle sidebar-toggle d-flex">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z"
                                    stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z"
                                    stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z"
                                    stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z"
                                    stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="{{ request()->routeIs('finance.*') ? '' : 'd-none' }}">
                    <form action="{{ route('finance.index') }}" method="get">
                        @csrf <!-- Ensure you include CSRF token if using Laravel -->
                        <div class="d-flex gap-1">
                            <select name="tahun" id="tahun" class="form-select select2" aria-label="Select Year">
                            </select>
                            <select name="bulan" id="bulan" class="form-select select2" aria-label="Select Month">
                            </select>
                            <button type="submit" class="btn btn-primary w-100">Change</button>
                        </div>
                    </form>
                </li>
                <li class="maximize">
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path d="M2.99609 8.71995C3.56609 5.23995 5.28609 3.51995 8.76609 2.94995"
                                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M8.76616 20.99C5.28616 20.41 3.56616 18.7 2.99616 15.22L2.99516 15.224C2.87416 14.504 2.80516 13.694 2.78516 12.804"
                                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M21.2446 12.804C21.2246 13.694 21.1546 14.504 21.0346 15.224L21.0366 15.22C20.4656 18.7 18.7456 20.41 15.2656 20.99"
                                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M15.2661 2.94995C18.7461 3.51995 20.4661 5.23995 21.0361 8.71995"
                                        stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
                    <div class="media profile-media">
                        <img src="{{ asset('assets/panel/profile_images/1725325783_Zahrina Nurpurianii.jpg') }}"
                            alt="Profile Image" width="24" height="24" style="border-radius: 50%;">
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('setting-account.index') }}">
                                <i data-feather="settings"></i>
                                <span>Pengaturan Akun</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="logoout()">Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    @method('POST')
</form>

<script>
    function logoout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }

    document.addEventListener("DOMContentLoaded", () => {
        $('.select2').select2({
            theme: "bootstrap-5",
            placeholder: "Pilih",
            minimumResultsForSearch: Infinity
        });
    })
</script>
