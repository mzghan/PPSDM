<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  {{-- Icon Home --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/img/ppsdm.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Badan POM - Pendaftaran Magang
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- CSS -->
  <link href="{{url('assets/demo/welcome.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="">
<nav id="navbar" class="navbar navbar-expand-lg navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:;">
              <img src="{{url('assets/img/logo-small.png') }}"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <p class="text-danger mb-0">Harap melakukan aktivasi alamat email terlebih dahulu <a href="{{ route('redirect.to.gmail') }}" class="custom-button font-semibold">aktivasi sekarang</a></p>

                        @else
                        <a href="{{ route('login') }}" class="custom-button font-semibold">Log in</a>

                        <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                        @endauth
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</nav>

      <!-- End Navbar -->
      <br><br>
      <!--start content-->
<div class="container px-4 mx-auto">

  <div class="p-6 m-20 bg-white rounded shadow">
      {!! $chart->container() !!}
  </div>

</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
<!--end chart-->
        <!--start carousel-->
        <br><br>
        <div class="carosel">
          <div id="custom-carousel" class="carousel slide">
              <div class="carousel-indicators">
              <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#custom-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="{{url('assets/img/1.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                  <img src="{{url('assets/img/2.png') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                  <img src="{{url('assets/img/3.png') }}" class="d-block w-100" alt="...">
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
  <!--end carousel-->

<!--start vidio-->
<div class="vidio">
  <h1>Video Tutorial Pendaftaran PKL/Magang/Penelitian</h1>
  <main>
  <div class="container text-left">
    <div class="row">
      <div class="col">
        <h2>Berikut ini merupakan tata cara pendaftaran pkl/magang dan penelitian di Pusat Pengembangan Sumber Daya Manusia Badan POM </h2>
      </div>
      <div class="col">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/dHSgqUW08U8?si=Bs9jh4Km2Q6p5Y-S" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</main>
</div>
<!--end vidio-->

    <footer class="bg-green-pastel text-center text-lg-start" >
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
   
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
// Ganti kode JavaScript dengan kode yang menetapkan kelas CSS "hide-navbar" ke gambar saja, bukan ke navbar
let lastScrollTop = 0;

window.addEventListener("scroll", function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    let navbar = document.getElementById("navbar"); // Menemukan elemen navbar
    let navbarImage = navbar.querySelector("img"); // Menemukan elemen gambar di dalam navbar

    if (currentScroll > lastScrollTop && currentScroll > 50) {
        navbarImage.classList.add("hide-navbar"); // Menambahkan kelas "hide-navbar" ke gambar
    } else {
        navbarImage.classList.remove("hide-navbar"); // Menghapus kelas "hide-navbar" dari gambar
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
}, false);

</script>
<style>
    .hide-navbar {
        transform: translateY(-200%);
        transition: transform 0.5s ease;
    }
</style>

      <script>
    $(document).ready(function() {
      // Javascript method's body can be found inurls/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
    document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('custom-carousel'), {
      interval: 1000, // Set the interval in milliseconds (2 seconds in this example)
      wrap: true // Allow looping
    });
  });
  </script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>

</html>
