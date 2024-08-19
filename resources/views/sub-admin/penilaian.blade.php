
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Unit Kerja
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/template.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar">
      <div class="logo">
        <a class="simple-text logo-medium">
          <div class="logo-image-medium">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
      </div>
      <div class="sidebar-wrapper"  style="overflow-y: hidden;">
      <ul class="nav" id="myNav">
          <li>
            <a href="./dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./kriteria">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Lowongan</p>
            </a>
          </li>
          <li>
            <a href="./laporan">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Hasil Laporan
                @if(Session::has('newLaporanCount') && Session::get('newLaporanCount') > 0)
                <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newLaporanCount') }}</span>
              @endif
              </p>
            </a>
          </li>
          <li class="active">
            <a href="./peserta">
              <i class="nc-icon nc-badge"></i>
              <p>Kehadiran</p>
            </a>
          </li>
          <li>
            <a href="./seleksi">
              <i class="nc-icon nc-single-02"></i>
              <p>Seleksi
                @if(Session::has('newSeleksiUnitCount') && Session::get('newSeleksiUnitCount') > 0)
                    <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newSeleksiCount') }}</span>
                @endif
            </p>
            </a>
          </li>
        </ul>
      <div class="hero">
                <a class="hero">
                    <div class="hero-image-medium">
                    <img src="../assets/img/hero.png">
                    </div>
          <!-- <p>CT</p> -->
                </a>
                </div>
            <div class="hero">
          </div>
      </div>
    </div>
    <div class="main-panel">
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
            <a class="navbar-brand" href="javascript:;">Unit Kerja</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <ul class="navbar-nav">
            <li class="logout">
                <a href="{{ url('/logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!--start notifikasi-->
      <!--<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Notifications</h5>
                <p class="card-category">Handcrafted by our friend <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a></p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card card-plain">
                      <div class="card-header">
                        <h5 class="card-title">Notifications Style</h5>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-info">
                          <span>This is a plain notification</span>
                        </div>
                        <div class="alert alert-info alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>This is a notification with close button.</span>
                        </div>
                        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                          <span data-notify="message">This is a notification with close button and icon.</span>
                        </div>
                        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-chart-pie-36"></span>
                          <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card card-plain">
                      <div class="card-header">
                        <h5 class="card-title">Notification states</h5>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-primary alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Primary - </b> This is a regular notification made with ".alert-primary"</span>
                        </div>
                        <div class="alert alert-info alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Info - </b> This is a regular notification made with ".alert-info"</span>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span><b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        -->
        <!-- end notifikasi-->

      <!--start content-->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Daftar Peserta Magang yang Lolos</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama
                      </th>
                      <th>
                        Jurusan
                      </th>
                      <th>
                        Instansi
                      </th>
                      <th>
                        Waktu
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Apriansyah Rachman
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          David Rizky Andhika Surya
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Ghani Rasyad Khalifa
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Ahmad Adam Ramadhan
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Ervira Mumtaza
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Gavan Satria Hastoro
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Neyla Rahmadani
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Fildza Cipta Salwa
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Rivaldo Ridho Siputro
                        </td>
                        <td>
                          Pen. Teknik Informatika
                        </td>
                        <td>
                          Universitas Negeri Jakarta
                        </td>
                        <td>
                          18 Des 23 - 19 Apr 24
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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
      <!--end content-->

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.instagram.com/ghanirk_" target="_blank">Fullstack Developer</a></li>
                <li><a href="https://www.instagram.com/aprirchmn" target="_blank">Fullstack Develepor</a></li>
                <li><a href="https://www.instagram.com/darizas26" target="_blank">UI/UX Designer</a></li>
                <li><a href="https://www.instagram.com/aadamry" target="_blank">Database Administrator</a></li>
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
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>