<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/fe') }}/css/utils.css" />
    <link rel="stylesheet" href="{{ asset('/fe') }}/css/main.css" />
    <link rel="stylesheet" href="{{ asset('/fe') }}/css/jumbotron.css" />
    <link rel="stylesheet" href="{{ asset('/fe') }}/css/services.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />

    <!-- icon -->
    <link rel="icon" href="{{ asset('/fe') }}/images/icon.jpeg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    @stack('styles')
</head>

<body>
    <header>
        <nav>
            <div class="navbar">
                <i class="bx bx-menu"></i>
                <div class="logo" style="display: flex; align-items: center">
                    <img src="{{ asset('/fe') }}/images/icon.jpeg" alt="Logo" srcset=""
                        style="
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin-right: 10px;
              "
                        class="mb-1" />
                    <a href="{{ url('/') }}">{{ config('app.name') }}</a>
                </div>
                <div class="nav-links">
                    <div class="sidebar-logo" style="align-items: center">
                        <img src="{{ asset('/fe') }}/images/icon.jpeg" alt="Logo"
                            style="width: 40px; height: 40px; border-radius: 50%" />
                        <span class="logo-name">{{ config('app.name') }}</span>
                        <i class="bx bx-x"></i>
                    </div>
                    <ul class="links">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li>
                            <a href="#">Seputar Lab</a>
                            <i class="bx bxs-chevron-down htmlcss-arrow arrow"></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                                <li><a href="#">Inventaris</a></li>
                                <li>
                                    <a href="#">Jadwal Penggunaan Lab</a>
                                </li>
                                <li><a href="#">Mentoring</a></li>
                                <li>
                                    <a href="#">Peminjaman Penelitian</a>
                                </li>
                                <li><a href="#">Topik TA</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Seputar Praktikum</a>
                            <i class="bx bxs-chevron-down js-arrow arrow"></i>
                            <ul class="js-sub-menu sub-menu">
                                <li><a href="#">Absensi</a></li>
                                <li><a href="#">Daftar Nilai</a></li>
                                <li><a href="#">Jadwal Praktikum</a></li>
                                <li><a href="#">Modul & Jobsheet</a></li>
                                <li><a href="#">Praktikum</a></li>
                            </ul>
                        </li>
                        @if (Auth::check())
                            <li>
                                <a href="#">{{ Auth::user()->name }}</a>
                                <i class="bx bxs-chevron-down htmlcss-arrow arrow"></i>
                                <ul class="htmlCss-sub-menu sub-menu">
                                    @if (Auth::user()->hasRole('mahasiswa'))
                                        <li><a href="{{ route('profile.edit') }}">Peminjaman</a></li>
                                    @endif
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="#">Login</a>
                                <i class="bx bxs-chevron-down htmlcss-arrow arrow"></i>
                                <ul class="htmlCss-sub-menu sub-menu">
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Registrasi</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copyright -->
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; 2025 {{ config('app.name') }} All rights reserved.
                </div>
                <!-- Menu -->
                <div class="col-md-6 text-center text-md-end">
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <a href="{{ url('/') }}" class="text-white text-decoration-none">Beranda</a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white text-decoration-none">Inventaris</a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white text-decoration-none">Absensi</a>
                        </li>
                        <li class="list-inline-item">|</li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white text-decoration-none">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/fe') }}/js/main.js"></script>
    <script src="{{ asset('/fe') }}/js/jumbotron.js"></script>
    @stack('scripts')
</body>

</html>
