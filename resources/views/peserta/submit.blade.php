<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
  {{-- <link href="../assets/demo/submitpeserta.css" rel="stylesheet" /> --}}
  <link href="{{url('assets/demo/submitpeserta.css') }}" rel="stylesheet" />
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
                <button class="btn5"><a href="#">Beranda</a></button>
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
                <button class="btn7"><a href="#">Penilaian Magang</a></button>
              <button class="btn3">Log Out</button>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
            
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
            </ul>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- start content-->
      <div class="back">
        <button type="button" class="back" data-bs-dismiss="modal">
          <a href="./beranda.php" class="btn7" onclick="goBack()">
            <img src="../assets/img/7.png" alt="">
          </a>
        </button>
      </div>
      <h1>Pengumpulan Laporan Akhir</h1>
      <main>
      <div class="container text-left">
                <div class="row">
                    <div class="col">
                        <h2>Attempt Number</h2>
                        <h2 class="submission custom-background">Submission Status</h2>
                        <h2>Grading Status</h2>
                        <h2>Due Date</h2>
                        <h2 class="submission custom-background">Last Modified</h2>
                        <h2>Submission</h2>
                    </div>
                    <div class="col">
                        <p>This is attempt 1 (3 attempts allowed)</p>
                        <p class="submission custom-background">Submitted before overdue</p>
                        <p>Not Graded</p>
                        <p>Kamis, 14 September 2023, 22:00</p>
                        <p class="submission custom-background">-</p>
                        <div class="form-group">
                          <label for="surat_pendukung"><button>Choose File </button></label><br>
                          <input type="file" name="surat_pendukung" id="surat_pendukung" class="file" >
                        </div>
                    </div>
                </div>
      </div> 
      </main>
      <div class="button">
          <button type="button" class="btn1" data-bs-dismiss="modal">
            <a href="./beranda.php" class="btn1" onclick="goBack()">Kembali</a>
          </button>
          <button type="button" class="btn2">Submit</button>
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