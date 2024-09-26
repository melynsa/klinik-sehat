<!DOCTYPE html>
<html lang="en">
  <head>
    <title>KlinikSehat</title>
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
  </head>
  <body>

	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Klinik<span>Sehat</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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
	          <li class="nav-item cta"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Make an Appointment</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.html">Home</a></span> <span>Services</span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Our Service Keeps you Smile</h1>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Pendaftaran Pasien</h2>
                    <p>Silakan isi detail di bawah ini untuk pendaftaran pasien di Klinik Sehat.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <form action="#" method="post" class="appointment">
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="nama">Nama Lengkap:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <div class="form-check">
                                <input type="radio" id="male" name="gender" value="Laki-laki" class="form-check-input" required>
                                <label for="male" class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="female" name="gender" value="Perempuan" class="form-check-input">
                                <label for="female" class="form-check-label">Perempuan</label>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="phone">Nomor Telepon/HP:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" required>
                        </div>

                        <!-- Alamat Lengkap -->
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap:</label>
                            <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                        </div>

                        <!-- Layanan yang Dibutuhkan -->
                        <div class="form-group">
                            <label for="layanan">Layanan yang Dibutuhkan:</label>
                            <select id="layanan" name="layanan" class="form-control" required>
                                <option value="">-- Pilih Layanan --</option>
                                <option value="Pemeriksaan Kolestrol">Pemeriksaan Kolestrol</option>
                                <option value="Pemeriksaan Gula darah">Pemeriksaan Gula darah</option>
                                <option value="Pemeriksaan Tensi/jantung">Pemeriksaan Tensi/jantung</option>
                                <option value="Pemeriksaan Hemogoblin">Pemeriksaan Hemogoblin</option>
                            </select>
                        </div>

                        <!-- Tanggal dan Waktu Kunjungan -->
                        <div class="form-group">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu_kunjungan">Waktu Kunjungan:</label>
                            <input type="time" id="waktu_kunjungan" name="waktu_kunjungan" class="form-control" required>
                        </div>

                        <!-- Jenis Pasien -->
                        <div class="form-group">
                            <label>Jenis Pasien:</label>
                            <div class="form-check">
                                <input type="radio" id="umum" name="jenis_pasien" value="Umum" class="form-check-input" required>
                                <label for="umum" class="form-check-label">Umum</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="bpjs" name="jenis_pasien" value="BPJS" class="form-check-input">
                                <label for="bpjs" class="form-check-label">BPJS</label>
                            </div>
                        </div>

                         <!-- Informasi UMUM (tampil jika UMUM dipilih) -->
                         <div id="umum-info" style="display: none;">
                            <div class="form-group">
                                <label for="nik">NIK:</label>
                                <input type="text" id="nik" name="nik" class="form-control">
                            </div>
                         </div>

                        <!-- Informasi BPJS (tampil jika BPJS dipilih) -->
                        <div id="bpjs-info" style="display: none;">
                            <div class="form-group">
                                <label for="bpjs_no">Nomor Kartu BPJS:</label>
                                <input type="text" id="bpjs_no" name="bpjs_no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="faskes">Faskes Tingkat Pertama:</label>
                                <select id="faskes" name="faskes" class="form-control">
                                    <option value="">-- Pilih Faskes --</option>
                                    <option value="Puskesmas A">Puskesmas A</option>
                                    <option value="Puskesmas B">Puskesmas B</option>
                                    <option value="Klinik C">Klinik C</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rujukan">Nomor Rujukan (Jika Ada):</label>
                                <input type="text" id="rujukan" name="rujukan" class="form-control">
                            </div>
                        </div>

                        <!-- Riwayat Kesehatan Singkat -->
                        <div class="form-group">
                            <label for="riwayat">Keluhan:</label required>
                            <textarea id="riwayat" name="riwayat" class="form-control"></textarea>
                        </div>


                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Script untuk menampilkan field informasi BPJS atau Umum berdasarkan pilihan
        document.addEventListener('DOMContentLoaded', function() {
            var bpjsRadio = document.getElementById('bpjs');
            var umumRadio = document.getElementById('umum');
            var bpjsInfo = document.getElementById('bpjs-info');
            var umumInfo = document.getElementById('umum-info');

            function toggleInfo() {
                if (bpjsRadio.checked) {
                    bpjsInfo.style.display = 'block';
                    umumInfo.style.display = 'none';
                } else if (umumRadio.checked) {
                    umumInfo.style.display = 'block';
                    bpjsInfo.style.display = 'none';
                }
            }

            // Menjalankan toggleInfo saat radio button diubah
            bpjsRadio.addEventListener('change', toggleInfo);
            umumRadio.addEventListener('change', toggleInfo);

            // Menjalankan toggleInfo saat halaman pertama kali dimuat
            toggleInfo();
        });
    </script>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Klinik Sehat.</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#">
            <div class="form-group">
              <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
              <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
            </div>
            <div class="form-group">
              <!-- <label for="appointment_email" class="text-black">Email</label> -->
              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_date" class="text-black">Date</label> -->
                  <input type="text" class="form-control appointment_date" placeholder="Date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="appointment_time" class="text-black">Time</label> -->
                  <input type="text" class="form-control appointment_time" placeholder="Time">
                </div>
              </div>
            </div>


            <div class="form-group">
              <!-- <label for="appointment_message" class="text-black">Message</label> -->
              <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Make an Appointment" class="btn btn-primary">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


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
