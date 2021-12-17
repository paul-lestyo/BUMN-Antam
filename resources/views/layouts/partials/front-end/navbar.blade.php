<nav class="navbar navbar-expand-lg navbar-light">
    <a href="{{ route('home') }}">
        <img style="margin-right: 0.75rem;max-height:40px;"
            src="{{ secure_asset('dist/img/BUMNAntamLogo.png') }}" alt="" />
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
        aria-labelledby="targetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white border-0">
                <div class="modal-header border-0" style="padding: 2rem; padding-bottom: 0">
                    <a class="modal-title" id="targetModalLabel">
                        <img style="margin-top: 0.5rem;max-height:40px;"
                            src="{{ secure_asset('dist/img/BUMNAntamLogo.png') }}"
                            alt="" />
                    </a>
                    <button type="button" class="close btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem; padding-top: 0; padding-bottom: 0">
                    <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                        <li class="nav-item {{ Request::is('/')?'active':'' }} position-relative">
                            <a class="nav-lin " style="color: #243142;" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item position-relative {{ Request::is('about')?'active':'' }}">
                            <a class="nav-link" href="{{ route('about') }}">About Us</a>
                        </li>
                        <li class="nav-item position-relative {{ Request::is('article*')?'active':'' }}">
                            <a class="nav-link" href="{{ route('article') }}">Article</a>
                        </li>
                        <li class="nav-item position-relative {{ Request::is('contact')?'active':'' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                        {{-- <li class="nav-item position-relative">
                            <a class="nav-link" data-bs-toggle="collapse" href="#collapse" role="button"
                                aria-expanded="false" aria-controls="collapse">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.85 1.69346C3.5304 1.69346 1.65 3.57386 1.65 5.89346C1.65 8.21305 3.5304 10.0935 5.85 10.0935C8.1696 10.0935 10.05 8.21305 10.05 5.89346C10.05 3.57386 8.1696 1.69346 5.85 1.69346ZM0.25 5.89346C0.25 2.80066 2.75721 0.293457 5.85 0.293457C8.94279 0.293457 11.45 2.80066 11.45 5.89346C11.45 8.98625 8.94279 11.4935 5.85 11.4935C2.75721 11.4935 0.25 8.98625 0.25 5.89346Z"
                                        fill="#8B9CAF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.85503 8.89848C9.12839 8.62512 9.57161 8.62512 9.84497 8.89848L14.045 13.0985C14.3183 13.3718 14.3183 13.8151 14.045 14.0884C13.7716 14.3618 13.3284 14.3618 13.055 14.0884L8.85503 9.88843C8.58166 9.61506 8.58166 9.17185 8.85503 8.89848Z"
                                        fill="#8B9CAF" />
                                </svg>
                            </a>
                            <form method class="collapse position-absolute form center-search border-0" id="collapse">
                                <div class="d-flex">
                                    <input type="text" class="rounded-full border-0 focus:outline-none"
                                        placeholder="Search" />
                                    <button class="btn" type="button">
                                        <svg style="width: 20px; height: 20px" data-bs-toggle="collapse"
                                            href="#collapse" role="button" aria-expanded="false"
                                            aria-controls="collapse" fill="none" stroke="#273B56" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </li> --}}
                    </ul>
                </div>
                <div class="modal-footer border-0" style="padding: 2rem; padding-top: 0.75rem">
                    @auth
                    <a href="{{ route(auth()->user()->role_id == 2?'admin.dashboard':'pegawai.dashboard') }}" class="btn btn-default btn-no-fill px-3">Dashboard</a> |
                    <a href="{{ route('logout') }}" class="btn btn-default btn-no-fill">Log Out</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-default btn-no-fill">Sign In</a>
                    @endauth
                    {{-- <button class="btn btn-fill text-white">Register</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo">
        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            <li class="nav-item {{ Request::is('/')?'active':'' }} position-relative">
                <a class="nav-link" style="color: #243142;" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item position-relative {{ Request::is('about')?'active':'' }}">
                <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item position-relative {{ Request::is('article*')?'active':'' }}">
                <a class="nav-link" href="{{ route('article') }}">Article</a>
            </li>
            <li class="nav-item position-relative {{ Request::is('contact')?'active':'' }}">
                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
            </li>
            {{-- <li class="nav-item my-auto">
                <a class="nav-link" data-bs-toggle="collapse" href="#collapse" role="button" aria-expanded="false"
                    aria-controls="collapse">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.85 1.69346C3.5304 1.69346 1.65 3.57386 1.65 5.89346C1.65 8.21305 3.5304 10.0935 5.85 10.0935C8.1696 10.0935 10.05 8.21305 10.05 5.89346C10.05 3.57386 8.1696 1.69346 5.85 1.69346ZM0.25 5.89346C0.25 2.80066 2.75721 0.293457 5.85 0.293457C8.94279 0.293457 11.45 2.80066 11.45 5.89346C11.45 8.98625 8.94279 11.4935 5.85 11.4935C2.75721 11.4935 0.25 8.98625 0.25 5.89346Z"
                            fill="#8B9CAF" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.85503 8.89848C9.12839 8.62512 9.57161 8.62512 9.84497 8.89848L14.045 13.0985C14.3183 13.3718 14.3183 13.8151 14.045 14.0884C13.7716 14.3618 13.3284 14.3618 13.055 14.0884L8.85503 9.88843C8.58166 9.61506 8.58166 9.17185 8.85503 8.89848Z"
                            fill="#8B9CAF" />
                    </svg>
                </a>
                <form class="collapse position-absolute form center-search border-0" id="collapse">
                    <div class="d-flex">
                        <input type="text" class="rounded-full border-0 focus:outline-none" placeholder="Search" />
                        <button class="btn" type="button">
                            <svg style="width: 20px; height: 20px" data-bs-toggle="collapse" href="#collapse"
                                role="button" aria-expanded="false" aria-controls="collapse" fill="none"
                                stroke="#273B56" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
            </li> --}}
        </ul>
        @auth
        <a href="{{ route(auth()->user()->role_id == 2?'admin.dashboard':'pegawai.dashboard') }}" class="btn btn-default btn-no-fill px-3">Dashboard</a> |
        <a href="{{ route('logout') }}" class="btn btn-default btn-no-fill px-3">Log Out</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-default btn-no-fill">Sign In</a>
        @endauth
        {{-- <button class="btn btn-fill text-white">Register</button> --}}
    </div>
</nav>
<div class="hr">
    <hr style="border-color: #F4F4F4;background-color: #F4F4F4;opacity: 1;margin: 0 !important;" />
</div>
