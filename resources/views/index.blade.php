<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klinik Sehat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">


    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">Klinik<span>Sehat</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="/service" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="/doctor" class="nav-link">Doctors</a></li>
                    <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>

                    @if (Auth::check())
                        <div class="dropdown mt-1">
                            <a class="btn" style="color: white" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Welcome, {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                                <li>
                                    <a href="/admin"><button style="background-color: white; border: none;margin-left: 17px;cursor: pointer;">Halaman Admin</button></a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal"
                                data-target="#modalRequest"><span>Login</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url('assets/images/bg_1.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <!-- Cek apakah ada pesan error dari session -->
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Pelayanan
                            Kesehatan Modern di Lingkungan yang Nyaman</h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Klinik Sehat
                            kami menyediakan layanan kesehatan terpadu dengan teknologi terbaru dan suasana yang
                            mendukung pemulihan pasien.</p>
                        <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a
                                href="{{ route('pasien.daftar') }}" class="btn btn-primary px-4 py-3">Pendaftaran
                                Pasien</a></p>
                    </div>
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url('assets/images/beranda2.jpg');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">
                    <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Dapatkan
                            Layanan Kesehatan Berkualitas untuk Kesejahteraan Anda</h1>
                        <p class="mb-4">Klinik Sehat kami berkomitmen untuk memberikan layanan kesehatan holistik
                            yang
                            sesuai dengan kebutuhan pasien, dari pencegahan hingga pengobatan.</p>
                        <p><a href="#" class="btn btn-primary px-4 py-3">Pendaftaran Pasien</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3 color-1 p-4">
                    <h3 class="mb-4">Emergency Cases</h3>
                    <p>Hubungi segera jika terjadi keadaan darurat melalui nomor berikut</p>
                    <span class="phone-number">+ (123) 456 7890</span>
                </div>
                <div class="col-md-3 color-2 p-4">
                    <h3 class="mb-4">Jam Buka</h3>
                    <p class="openinghours d-flex">
                        <span>Senin - Sabtu</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Pagi</span>
                        <span>08:00 - 13:00</span>
                    </p>
                    <p class="openinghours d-flex">
                        <span>Sore</span>
                        <span>16:00 - 21:00</span>
                    </p>
                </div>
                <div class="col-md-6 color-3 p-4">
                    <h3 class="mb-2">Pendaftaran Pasien</h3>
                    <form action="#" class="appointment-form">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Pelayanan</option>
                                            <option value="Pemeriksaan Kolestrol">Pemeriksaan Kolestrol</option>
                                            <option value="Pemeriksaan Gula darah">Pemeriksaan Gula darah</option>
                                            <option value="Pemeriksaan Tensi/jantung">Pemeriksaan Tensi/jantung
                                            </option>
                                            <option value="Pemeriksaan Hemogoblin">Pemeriksaan Hemogoblin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-user"></span></div>
                                    <input type="text" class="form-control" id="appointment_name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-paper-plane"></span></div>
                                    <input type="text" class="form-control" id="appointment_email"
                                        placeholder="Alamat">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" class="form-control appointment_time" placeholder="Time">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="icon"><span class="icon-phone2"></span></div>
                                    <input type="text" class="form-control" id="phone" placeholder="No.Telp">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Daftar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Layanan Pemeriksaan Klinik Sehat</h2>
                    <p>Kami menyediakan layanan kesehatan yang komprehensif untuk memastikan kesehatan dan kesejahteraan
                        Anda tetap terjaga.</p>
                    <a href="/service"><button
                            style="background-color: #52b7dc; padding: 10px 50px; color: white; border-radius: 5px; border: none;margin-top: 20px;cursor: pointer;">Layanan
                            Lainnya</button></a>
                </div>
            </div>
            <div class="row">
                @foreach ($kategori as $itemKategori)
                    <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block text-center">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <img src="{{ asset('upload/' . $itemKategori->gambar) }}"
                                    style="width: 80px; height: auto;" alt="">
                            </div>
                            <div class="media-body p-2 mt-3">
                                <h3 class="heading">{{ $itemKategori->nama }}</h3>
                                <p>{{ Str::words($itemKategori->deskripsi, 9, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-check fa-2xl" style="color: #52b7dc;"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Pemeriksaan Gula Darah</h3>
                <p>Untuk mendeteksi kadar glukosa dalam darah, penting untuk diagnosis diabetes.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-check fa-2xl" style="color: #52b7dc;"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Pemeriksaan Tensi/Jantung</h3>
                <p>Mengukur tekanan darah untuk mendeteksi hipertensi atau masalah jantung lainnya.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-check fa-2xl" style="color: #52b7dc;"></i>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Pemeriksaan Hemogoblin</h3>
                <p>Untuk mengevaluasi kadar hemoglobin dalam darah, penting untuk mendeteksi anemia.</p>
              </div>
            </div>
          </div> --}}
            </div>
        </div>
        <div class="container-wrap mt-5">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 img" style="background-image: url(assets/images/about-2.jpg);">
                </div>
                <div class="col-md-6 d-flex">
                    <div class="about-wrap">
                        <div class="heading-section heading-section-white mb-5 ftco-animate">
                            <h2 class="mb-2">Klinik Sehat dengan Pendekatan Personal</h2>
                            <p>Klinik Sehat kami memberikan perhatian khusus pada setiap pasien dengan layanan yang
                                disesuaikan untuk kebutuhan kesehatan Anda.</p>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Tenaga Medis Berpengalaman</h3>
                                <p>Didukung oleh tenaga medis profesional yang berpengalaman di berbagai bidang
                                    kesehatan, kami siap membantu menjaga kesehatan Anda dengan pelayanan terbaik.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Fasilitas Teknologi Canggih</h3>
                                <p>Klinik Sehat dilengkapi dengan fasilitas medis modern dan teknologi canggih untuk
                                    memastikan diagnosis yang akurat dan perawatan yang efektif.</p>
                            </div>
                        </div>
                        <div class="list-services d-flex ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-check2"></span>
                            </div>
                            <div class="text">
                                <h3>Klinik yang Nyaman</h3>
                                <p>Kami menyediakan lingkungan klinik yang nyaman dan bersih, dirancang untuk memberikan
                                    kenyamanan maksimal bagi pasien selama menjalani perawatan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Temui Dokter Umum Berpengalaman Kami</h2>
                    <p>Klinik Sehat kami didukung oleh tim dokter umum yang berpengalaman dan berdedikasi untuk
                        memberikan pelayanan kesehatan terbaik bagi pasien.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($dokter as $profil)
                    <div class="col-lg-3 col-md-6 d-flex mb-sm-4 ftco-animate">
                        <div class="staff">
                            <div class="img mb-4"
                                style="background-image: url({{ asset('pasien/foto/' . $profil->gambar) }});"></div>
                            <div class="info text-center">
                                <h3><a href="doctor-single.html">{{ $profil->nama }}</a></h3>
                                <span class="position">{{ $profil->jenis }}</span>
                                <div class="text">
                                    <p>{{ $profil->deskripsi }}</p>
                                    <ul class="ftco-social">
                                        <li class="ftco-animate"><a href="{{ $profil->twiter }}"><span
                                                    class="icon-twitter"></span></a></li>
                                        <li class="ftco-animate"><a href="{{ $profil->insta }}"><span
                                                    class="icon-facebook"></span></a></li>
                                        <li class="ftco-animate"><a href="{{ $profil->face }}"><span
                                                    class="icon-instagram"></span></a></li>
                                        <li class="ftco-animate"><a href="{{ $profil->google }}"><span
                                                    class="icon-google-plus"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url(assets/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-3 aside-stretch py-5">
                    <div class="heading-section heading-section-white ftco-animate pr-md-4">
                        <h2 class="mb-3">Pencapaian</h2>
                        <p>Klinik Sehat kami telah meraih berbagai pencapaian yang membanggakan dalam menyediakan
                            layanan kesehatan berkualitas bagi masyarakat.</p>
                    </div>
                </div>
                <div class="col-md-9 py-5 pl-md-5">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="20">0</strong>
                                    <span>Tahun Pengalaman</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="150">0</strong>
                                    <span>Dokter dan Tenaga Medis Terlatih</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="50000">0</strong>
                                    <span>Pasien Puas</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="1200">0</strong>
                                    <span>Pasien Per Tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-2">Blog Terbaru</h2>
                    <p>Dapatkan informasi dan tips kesehatan terbaru dari Klinik Sehat untuk menjaga kesehatan Anda dan
                        keluarga.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($blog as $post)
                    <div class="col-md-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="blog-single.html" class="block-20"
                                style="background-image: url({{ asset('pasien/foto/' . $post->gambar) }});"></a>
                            <div class="text d-flex py-4">
                                <div class="meta mb-3">
                                    <div>
                                        <a href="#">{{ $post->tglrilis }}</a>
                                    </div>
                                    <div>
                                        <a href="#">Admin</a>
                                    </div>
                                    <div>
                                        <a href="#" class="meta-chat">
                                            <span class="icon-chat"></span> 5
                                        </a>
                                    </div>
                                </div>
                                <div class="desc pl-3">
                                    <h3 class="heading">
                                        <a href="/detailblog">{{ $post->judul }}</a>
                                    </h3>
                                    <p>{{ Str::words($post->deskripsi, 10, '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">KlinikSehat.</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Features</a></li>
                            <li><a href="#" class="py-2 d-block">Projects</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 pr-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Recent Blog</h2>
                        @foreach ($blog as $post)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url({{ asset('pasien/foto/' . $post->gambar) }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="#">{{ $post->judul }}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                    class="icon-calendar"></span>{{ $post->tglrilis }}</a></div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                        <div><a href="#"><span class="icon-chat"></span></a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Office</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Gubeng
                                        Kertajaya VC No. 24 Surabaya</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">klinikesehat@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <!-- Modal -->
    <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRequestLabel">Login User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="multiStepForm" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Step 1 -->
                        <div class="step" id="step1">
                            <input type="email" name="email" placeholder="Email" class="form-control mb-3"
                                required>
                            <input type="password" name="password" placeholder="Password" class="form-control mb-3"
                                required>
                            <p>Belum Punya Akun ? <a href="" onclick="nextStep(2); return false;">Daftar
                                    Disini</a></p>
                            <button type="submit" class="btn btn-primary mb-3">Login</button>
                        </div>
                    </form>

                    <!-- Step 2 -->
                    <div class="step" id="step2" style="display:none;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="text" name="name" placeholder="name" class="form-control" required>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                            <input type="password" name="password" placeholder="Password" class="form-control"
                                required>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                class="form-control" required>
                            <p>Sudah Punya Akun ? <a href="" onclick="nextStep(1); return false;">Login
                                    Disini</a></p>
                            <button type="submit" class="btn btn-primary mb-3">Register</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        function nextStep(step) {
            // Hide all steps
            const steps = document.querySelectorAll('.step');
            steps.forEach((stepElement) => {
                stepElement.style.display = 'none';
            });

            // Show the selected step
            document.getElementById(`step${step}`).style.display = 'block';
        }
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.animateNumber.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/jquery.timepicker.min.js"></script>
    <script src="assets/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="assets/js/google-map.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
