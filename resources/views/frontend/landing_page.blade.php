@extends('frontend.main')
@section('title', 'Beranda')

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
                    <div class="single-service">
                        <img src="{{ asset($room->foto) }}" alt="{{ $room->name }}" data-toggle="modal"
                            data-target="#videoModal" class="img-fluid video-thumbnail"
                            data-video="{{ $room->link_stream }}"
                            data-name="{{ $room->name }}">
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

    <section class="section-services">
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
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services1.png">
                            </span>
                            <h3 class="title">PEMDAS</h3>
                            <p class="description">Pemrograman Dasar</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services2.png">
                            </span>
                            <h3 class="title">ORKOM</h3>
                            <p class="description">Organisasi & Arsitektur Komputer</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services3.png">
                            </span>
                            <h3 class="title">PRC</h3>
                            <p class="description">Pemrograman Robot Cerdas</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services4.png">
                            </span>
                            <h3 class="title">JARKOM</h3>
                            <p class="description">Jaringan Komputer</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services5.png">
                            </span>
                            <h3 class="title">REKWEB</h3>
                            <p class="description">Rekayasa Web</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services6.png">
                            </span>
                            <h3 class="title">JST</h3>
                            <p class="description">Jaringan Syaraf Tiruan</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services7.png">
                            </span>
                            <h3 class="title">BASDAT</h3>
                            <p class="description">Basis Data</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services8.png">
                            </span>
                            <h3 class="title">PBD</h3>
                            <p class="description">Pemrograman Basis Data</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
                <!-- Single Service -->
                <div class="col-md-6 col-lg-4">
                    <div class="single-service">
                        <div class="content">
                            <span class="icon" style="background-color: transparent;">
                                <img class="img-responsive" src="{{ asset('/fe') }}/images/services/services9.png">
                            </span>
                            <h3 class="title">PBO</h3>
                            <p class="description">Pemrograman Berorientasi Objek</p>

                        </div>
                        <span class="circle-before"></span>
                    </div>
                </div>
                <!-- / End Single Service -->
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const thumbnails = document.querySelectorAll('.video-thumbnail');
            const modalVideo = document.getElementById('modalVideo');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', () => {
                    const videoSrc = thumbnail.dataset.video;
                    const videoName = thumbnail.dataset.name;

                    document.getElementById('videoModalLabel').textContent = `Monitoring ${videoName}`;
                    modalVideo.src = videoSrc;
                });
            });

            const videoModal = document.getElementById('videoModal');
            videoModal.addEventListener('hidden.bs.modal', () => {
                modalVideo.src = "";
            });
        });
    </script>
@endpush
