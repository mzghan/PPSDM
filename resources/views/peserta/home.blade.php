<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  {{-- <link href="../assets/demo/homepeserta.css" rel="stylesheet" /> --}}
  <link href="{{url('assets/demo/homepeserta.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"><img src="../assets/img/logo-small.png"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <button class="btn5"><a href="home">Beranda</a></button>
                <button class="btn6">
                  <a href="hasil" style="position: relative;">
                      Hasil Pendaftaran
                      @if(Session::has('newPostingCount_' . auth()->user()->id) && Session::get('newPostingCount_' . auth()->user()->id) > 0)
                          <span id="badgeNotifPosting" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                              {{ Session::get('newPostingCount_' . auth()->user()->id) }}
                          </span>
                      @endif
                  
                      @if(Session::has('newMandiriCount_' . auth()->user()->id) && Session::get('newMandiriCount_' . auth()->user()->id) > 0)
                          <span id="badgeNotifMandiri" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                              {{ Session::get('newMandiriCount_' . auth()->user()->id) }}
                          </span>
                      @endif
                  
                      @if(Session::has('newWawancaraCount_' . auth()->user()->id) && Session::get('newWawancaraCount_' . auth()->user()->id) > 0)
                          <span id="badgeNotifWawancara" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                              {{ Session::get('newWawancaraCount_' . auth()->user()->id) }}
                          </span>
                      @endif
                  </a>
              </button>     
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
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
      <!-- End Navbar -->
     <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-body ml-8">
                <canvas id="chartEmail"></canvas>
                <canvas id=chartHours width="3500" height="905"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> UNJ
                  <i class="fa fa-circle text-warning"></i> UI
                  <i class="fa fa-circle text-danger"></i> UB
                  <i class="fa fa-circle text-gray"></i> Lainnya
                </div>
                <hr>
                <div class="stats">
                  <i class="fa"></i> Riwayat Pendaftar terakhir
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Grafik permintaan pkl/magang Unit Kerja</h5>
                <p class="card-category">Berikut merupakan pendataan Unit Kerja</p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="800" height="200"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Menerima
                  <i class="fa fa-circle text-warning"></i> Menolak
                </div>
                <hr />
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end chart-->

        <!--start carousel-->
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
  <!--end carousel-->

<!--Start posisi-->
<div class="posisi">
  <h1>Posisi yang sedang dibuka</h1>
  <div class="container text-center">
      <div class="row">
          <!-- Content 1 -->
          @foreach($table as $key => $data)
          <div class="col-md-3 mr-5"> <a href="apply">
            <div class="cardii">
              <div class="text">
                  <h2>{{$data->posisi}}</h2>
                  <h3>{{$data->tingkatan}}</h3>
                  <p>{{$data->jurusan}}</p>
              </div>
          </div>
        </a>
      </div>
      @endforeach
          <!--end content-->
      </div>
  </div>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</div>

<!--end posisi-->

<!--end content-->

           <!-- End CONTENT -->
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">PPSDM BPOM</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">User</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by PKL PTIK UNJ
              </span>
            </div>
          </div>
        </div>
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
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    showPage(1);

    $('.pagination li.page-item a:contains("Next")').on('click', function(e) {
      e.preventDefault();
      showPage(currentPage + 1);
    });

    $('.pagination li.page-item a:contains("Previous")').on('click', function(e) {
      e.preventDefault();
      showPage(currentPage - 1);
    });

    $('.pagination li.page-item:not(:first-child, :last-child) a').on('click', function(e) {
      e.preventDefault();
      showPage(parseInt($(this).text()));
    });

    function showPage(page) {
      $('.pagination li.page-item').removeClass('active');
      $('.pagination li.page-item a:contains(' + page + ')').parent().addClass('active');
      $('.cardii').hide();
      
      if (page === 1) {
        for (let i = 1; i <= 9; i++) {
          $('.cardii:nth-child(' + i + ')').show();
        }
        $('.page2').removeClass('d-block').addClass('d-none');
      } else if (page === 2) {
        for (let i = 10; i <= 12; i++) {
          $('.cardii.page2:nth-child(' + (i - 9) + ')').show();
        }
        $('.page2').removeClass('d-none').addClass('d-block');
      }

      currentPage = page;
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
