
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

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
  {{-- <link href="../assets/demo/inputpeserta.css" rel="stylesheet" /> --}}
  <link href="{{url('assets/demo/inputpeserta.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      <div class="sidebar-wrapper">
      <ul class="nav" id="myNav">
          <li>
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./kriteria.php">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Kriteria</p>
            </a>
          </li>
          <li  class="active">
            <a href="./laporan.php">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Hasil Laporan</p>
            </a>
          </li>
          <li>
            <a href="./peserta.php">
              <i class="nc-icon nc-badge"></i>
              <p>Riwayat Peserta</p>
            </a>
          </li>
          <li>
            <a href="./seleksi.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Seleksi</p>
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
            <form>
              <div class="input-group no-border">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- start content-->
      <h1>Pengumpulan Laporan Akhir</h1>
      <main>
      <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <h2>Attempt Number</h2>
                        <h2 class="submission custom-background">Submission Status</h2>
                        <h2>Grade Status</h2>
                        <h2>Input Due Date</h2>
                        <h2 class="submission custom-background">Last Modified</h2>
                        <h2>Submission</h2>
                    </div>
                    <div class="col">
                        <p>This is attempt 1 (3 attempts allowed)</p>
                        <p class="submission custom-background">Submitted before overdue</p>
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input Nilai Akhir">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Input Due Date">
                      </div>
                        <p class="submission custom-background">-</p>
                        <p><button class="download-button" onclick="downloadFile('proposal')">Unduh Proposal</button> </p>
                    </div>
                </div>
      </div> 
      </main>
      <div class="button">
          <button type="button" class="btn1" data-bs-dismiss="modal">
            <a href="./laporan.php" class="btn1" onclick="goBack()">Kembali</a>
          </button>
          <button type="button" class="btn2">Submit Nilai</button>
      </div>
     
    
      <!--end content-->

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">PPSDM BPOM</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Unit Kerja</a></li>
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
  <script>
  function downloadFile(type) {
    // Gantilah URL berikut dengan URL sebenarnya untuk mengunduh file
    var downloadUrl = '';

    if (type === 'surat_pendukung') {
      downloadUrl = 'https://drive.google.com/file/d/1g-ZBPjE7aQbQf_qwAWLA9I9MjATnJ4DY/view?usp=drive_link';
    } else if (type === 'proposal') {
      downloadUrl = 'https://docs.google.com/document/d/1vGmxBzm6XclkqEpg4-xZtF4eG53aLe3V7QQPsll0b38/edit?usp=drive_link';
    }

    window.location.href = downloadUrl;
  }

  function goBack() {
        window.history.back();
    }
</script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>