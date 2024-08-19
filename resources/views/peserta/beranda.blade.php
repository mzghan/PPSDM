<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Icon Home --}}
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <title>Badan POM - Pendaftaran Magang</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    {{-- <link href="../assets/demo/berandapeserta.css" rel="stylesheet" /> --}}
    <link href="{{url('assets/demo/berandapeserta.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <a class="navbar-brand" href="javascript:;"><img src="../assets/img/logo-small.png"></a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        <form>
                            <div class="input-group no-border">
                                <button class="btn5"><a href="beranda">Beranda</a></button>
                                <div class="dropdown">
                                  <button class="btn6">Magang</button>
                                  <ul class="dropdown-menu">
                                      <li><a href="tatatertib">Tata Tertib PKL/Magang</a></li>
                                      <li><a href="absensi">Absensi</a></li>
                                      <li><a href="assignment">Tugas Akhir</a></li>
                                      <li><a href="sertifikat">Sertifikat</a></li>
                                  </ul>
                                </div>
                            </div>
                          </form>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<!--start content-->
        <!--start content-->
<div class="moving-container">
    <div class="moving-text">
        @if (!empty($unit))
        <h1>
            Saat ini Anda sedang magang di Unit {{ str_replace(['[', ']', '"'], '', $unit) }}
            dengan Periode Magang 
            @php
                // Pisahkan tanggal mulai dan tanggal selesai
                list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $durasi);

                // Konversi tanggal mulai ke format Indonesia
                Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                // Konversi tanggal selesai ke format Indonesia
                $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                // Tampilkan hasil
                echo "$tanggal_mulai - $tanggal_selesai";
            @endphp
        </h1>

@php
function konversiTanggal($durasi) {
    // Pisahkan tanggal mulai dan tanggal selesai
    list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $durasi);

    // Konversi tanggal mulai
    $tanggal_mulai = konversiTanggalKeFormatIndonesia($tanggal_mulai);

    // Konversi tanggal selesai
    $tanggal_selesai = konversiTanggalKeFormatIndonesia($tanggal_selesai);

    // Tampilkan hasil
    return "$tanggal_mulai - $tanggal_selesai";
}

function konversiTanggalKeFormatIndonesia($tanggal) {
    // Konversi format tanggal
    $dateObj = \DateTime::createFromFormat('m/d/Y', $tanggal);
    return $dateObj->format('d F Y');
}
@endphp

        @else
            <h1>Anda belum menjadi peserta magang aktif.</h1>
        @endif
    </div>
</div>
<div class="container px-4 mx-auto">
    <!--start carousel-->
    

    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>
  
  </div>
  
  <script src="{{ $chart->cdn() }}"></script>
  
  {{ $chart->script() }}
  <!--end chart-->
        <!--end chart-->

        

        <div class="carosel">
            <div id="custom-carousel" class="carousel slide">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/3.png" class="d-block w-100" alt="...">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#custom-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#custom-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
<br>
<footer class="bg-green-pastel  text-center text-lg-start" >
    <!-- Grid container -->
    <div class="container p-4" >
    <!--Grid row-->
    <div class="container ml-5">
    <div class="row justify-content-center"> <!-- Menengahkan baris -->
    <!--Grid column-->
    <div class="col-lg-6 col-md-12 mb-12 mb-md-0">
      <h5 class="text-uppercase">Hubungi Kami</h5>
      <p>
        PPSDM POM Gd. Batik Lantai 5 BPOM Jl. Percetakan Negara No.23, <br> Johar Baru, Kec. Johar Baru, Jakarta Pusat, 10560
      </p>
      <ul>
        <li>ppsdm.pom@gmail.com / ppsdm@pom.go.id</li>
        <li>021-4264094</li>
        <li>+62 811-1530-553</li>
      </ul>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 ">
      <h5 class="text-uppercase" style="color: black;">Kontak developer</h5> <!-- Menyesuaikan warna dan garis bawah -->
      <p>
        Hubungi kami lebih lanjut
      </p>
      <ul>
        <li><a href="https://www.instagram.com/ghanirk_" target="_blank" style="color: black;">Fullstack Developer</a></li>
        <li><a href="https://www.instagram.com/aprirchmn" target="_blank" style="color: black;">Fullstack Developer</a></li>
        <li><a href="https://www.instagram.com/darizas26" target="_blank" style="color: black;">UI/UX Designer</a></li>
        <li><a href="https://www.instagram.com/aadamry_" target="_blank" style="color: black;">Database Administrator</a></li>
      </ul>
    </div>
    <!--Grid column-->
    </div>
    </div>

    <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a href="https://www.instagram.com/unj_official/" target="_blank" style="color: black;">PKL PTIK UNJ 2023</a></a>
    </div>
    <!-- Copyright -->
    </footer> 

    </div>
  </div>
    <!--end carousel-->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
        // Mengatur lebar teks berdasarkan panjang teks aktual
        window.onload = function() {
            var movingText = document.querySelector('.moving-text');
            var textWidth = movingText.offsetWidth;
            movingText.style.width = textWidth + 'px';
        }
    </script>
  <!-- JS Jumper Halaman -->
    <script>
        function navigateToPage() {
        window.location.href = 'magang';
        }

        function navigateToPage1() {
        window.location.href = 'wawancara';
        }

        function navigateToPage2() {
        window.location.href = 'posisi';
        }
    </script>
    <!-- End Jumper Halaman -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
    document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('custom-carousel'), {
      interval: 1000, // Set the interval in milliseconds (2 seconds in this example)
      wrap: true // Allow looping
    });
  });
  </script>
        <!--end vidio-->
        </main>
<!--end content-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


