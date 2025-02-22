@extends('frontend.main')
@section('title', 'Beranda')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/materialize') }}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ asset('/materialize') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ asset('/materialize') }}/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet"
        href="{{ asset('/materialize') }}/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
@endpush

@section('content')
    <section class="hero-slider hero-style">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ asset('/fe') }}/images/slider/bg1.jpg">
                        <div class="container">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2 class="whitefont">
                                    Sistem Praktikum Jurusan Pendidikan Teknik Elektro
                                </h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p class="whitefont">
                                    Dapatkan informasi mengenai kegiatan praktikum yang
                                    diselenggarakan program studi Sistem Praktikum Jurusan
                                    Pendidikan Teknik Elektro
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="#" class="theme-btn-s2">Menuju Halaman</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slide-inner -->
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ asset('/fe') }}/images/slider/bg2.jpg">
                        <div class="container">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2 class="whitefont">
                                    Monitoring Laboratoum Sistem praktikum jurusan pendidikan Teknik Elektro
                                </h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p class="whitefont">
                                    Lihat keadaan Laboratorium secara langsung melalui video streaming
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="#" class="theme-btn-s2">Menuju Halaman</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slide-inner -->
                </div>
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ asset('/fe') }}/images/slider/bg3.jpg">
                        <div class="container">
                            <div data-swiper-parallax="300" class="slide-title">
                                <h2 class="whitefont">
                                    Absensi Sistem praktikum jurusan pendidikan Teknik Elektro
                                </h2>
                            </div>
                            <div data-swiper-parallax="400" class="slide-text">
                                <p class="whitefont">
                                    Cek kehadiran praktikum yang sedang atau yang telah dilaksanakan
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <div data-swiper-parallax="500" class="slide-btns">
                                <a href="#" class="theme-btn-s2">Menuju Halaman</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slide-inner -->
                </div>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="section-services">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="header-section">
                        <h2 class="title">Fitur</h2>
                        <p class="description">
                            Berikut beberapa fitur yang dapat diakses melalui website Laboratorium Sistem praktikum
                            jurusan pendidikan Teknik Elektro
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fa fa-bullhorn"></i>
                            </span>
                            <h3 class="title">Info Praktikum</h3>
                            <p class="description">Informasi mengenai peserta praktikum,absensi, nilai, dll.</p>
                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fa fa-comments"></i>
                            </span>
                            <h3 class="title">Topik TA</h3>
                            <p class="description">Informasi judul TA yang dapat dijadikan referensi</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fab fa-artstation"></i>
                            </span>
                            <h3 class="title">Arsip & Dokumentasi</h3>
                            <p class="description">Download file yang berkaitan dengan laboratorium dan praktikum
                            </p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fa fa-leaf"></i>
                            </span>
                            <h3 class="title">Inventaris</h3>
                            <p class="description">Melihat data invertaris laboratorium</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fa fa-cogs"></i>
                            </span>
                            <h3 class="title">Peminjaman Alat</h3>
                            <p class="description">Melakukan peminjaman peralatan laboratorium</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon">
                                <i class="fa fa-heart"></i>
                            </span>
                            <h3 class="title">Dan Lain-lain</h3>
                            <p class="description">Masih ada fitur lain yang dapat diakses</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
            </div>
        </div>
    </section>

    <section class="section-services bg-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="header-section">
                        <h2 class="title">Praktikum</h2>
                        <p class="description">
                            Informasi kegiatan Sistem praktikum jurusan pendidikan Teknik Elektro
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($practicalItems as $practicalItem)
                    <div class="col-md-6 col-lg-4">
                        <div class="single-service">
                            <div class="content">
                                <span class="icon" style="background-color: transparent;">
                                    <img class="img-responsive" width="80" height="80" src="{{ asset(str_replace('public/', 'storage/', $practicalItem->logo)) }}">
                                </span>
                                <h3 class="title">{{$practicalItem->name}}</h3>
                                <p class="description">{{$practicalItem->description}}</p>

                            </div>
                            <span class="circle-before"></span>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center">
                            Belum ada data praktikum
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-services">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8">
                    <div class="header-section">
                        <h2 class="title">Monitoring</h2>
                        <p class="description">
                            Menampilkan secara langsung keadaan ruangan Laboratorium Sistem praktikum jurusan
                            pendidikan Teknik Elektro
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center gap-3">
                @foreach ($rooms as $room)
                    <div class="single-service" style="cursor: pointer;">
                        <img src="{{ asset($room->foto) }}" alt="{{ $room->name }}" data-toggle="modal"
                            data-target="#videoModal" class="img-fluid video-thumbnail"
                            data-video="{{ $room->link_stream }}" data-name="{{ $room->name }}">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Monitoring Laboratorium</h5>
                    </div>
                    <div class="modal-body">
                        <div class="ratio ratio-16x9">
                            <iframe id="modalVideo" src="" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen height="500px" width="100%">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="inventaris" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inventaris</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $inventoryDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jadwal-lab" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jadwal Penggunaan Lab</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $practicalDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mentoring" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mentoring</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $mentoringDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="peminjaman-penelitian" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peminjaman Penelitian</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $borrowDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="topik-ta" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Topik TA</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $topicDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="absensi" tabindex="-1" aria-labelledby="absensiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="absensiLabel">Absensi</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $attendanceDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="daftar-nilai" tabindex="-1" aria-labelledby="daftar-nilaiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="daftar-nilaiLabel">Daftar Nilai</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $practicalValueDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jadwal-praktikum" tabindex="-1" aria-labelledby="jadwal-praktikumLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jadwal-praktikumLabel">Jadwal Praktikum</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $practicalScheduleDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modul-jobsheet" tabindex="-1" aria-labelledby="modul-jobsheetLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modul-jobsheetLabel">Modul & Jobsheet</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $moduleDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="praktikum" tabindex="-1" aria-labelledby="praktikumLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="praktikumLabel">Praktikum</h5>
                    <button type="button" class="btn btn-transparent btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        {!! $practicalDataDataTable->html()->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Pilih Login</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Admin</h5>
                                        <p class="card-text">Login sebagai Admin</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Mahasiswa</h5>
                                        <p class="card-text">Login sebagai Mahasiswa</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Asisten Lab</h5>
                                        <p class="card-text">Login sebagai Asisten Lab</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Dosen</h5>
                                        <p class="card-text">Login sebagai Dosen</p>
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/materialize') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modalVideo = document.getElementById('modalVideo');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', () => {
                    const videoSrc = thumbnail.dataset.video;
                    const videoName = thumbnail.dataset.name;

                    document.getElementById('videoModalLabel').textContent =
                        `Monitoring ${videoName}`;
                    modalVideo.src = videoSrc;
                });
            });

            const videoModal = document.getElementById('videoModal');
            videoModal.addEventListener('hidden.bs.modal', () => {
                modalVideo.src = "";
            });
        });
    </script>

    {!! $inventoryDataTable->html()->scripts() !!}
    {!! $practicalDataTable->html()->scripts() !!}
    {!! $mentoringDataTable->html()->scripts() !!}
    {!! $borrowDataTable->html()->scripts() !!}
    {!! $topicDataTable->html()->scripts() !!}
    {!! $practicalValueDataTable->html()->scripts() !!}
    {!! $practicalScheduleDataTable->html()->scripts() !!}
    {!! $practicalDataDataTable->html()->scripts() !!}
    {!! $moduleDataTable->html()->scripts() !!}
    {!! $attendanceDataTable->html()->scripts() !!}
@endpush
