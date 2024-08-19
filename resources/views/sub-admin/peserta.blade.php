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
  <link href="../assets/demo/logbook.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/footers/footer-2/assets/css/footer-2.css">
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
        <!-- Menu -->
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
        <!--end menu-->
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
            <a class="navbar-brand" href="javascript:;">{{$unit}}</a>
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
      </nav>
      <!-- End Navbar -->

      <!--start content-->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                    <h3>Daftar Kehadiran Peserta PKL/Magang</h3>
                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Kehadiran Peserta PKL/Magang</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                  <table class="table" id="tabelKehadiran">
                    <thead class="text-primary">
                      <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal</th>
                        <th>Presensi</th>
                        <th>Jam Hadir</th>
                        <th class="text-center">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kehadirans as $kehadiran)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kehadiran->name }}</td>
                        <td class="tanggal">{{ $kehadiran->tanggal }}</td>
                        <td>{{ $kehadiran->presensi }}</td>
                        <td>{{ $kehadiran->created_at }}</td>
                        <td class="text-center">
                          <button type="button" class="btn btn-primary btn-round showModalBtn" data-bs-toggle="modal" data-bs-target="#myModal{{ $loop->iteration }}">Lihat</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end content-->
            <!-- Modal POP UP -->
            @foreach($kehadirans as $kehadiran)
            <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Logbook <br> {{$kehadiran->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <box class="box">
                            <h2>Deskripsi :</h2>
                            <p>{{$kehadiran->keterangan}}</p>
                        </box>
                    </div>
                </div>
            </div>
            @endforeach

      <!-- JS Unduh File -->
      <script>
          function downloadFile(type) {
            // Gantilah URL berikut dengan URL sebenarnya untuk mengunduh file
            var downloadUrl = '';

            if (type === 'surat_pendukung') {
              downloadUrl = 'https://drive.google.com/file/d/1g_nSd-9N3dy400RMXFfJvQjwcaRWujOp/view?usp=sharing';
            } else if (type === 'proposal') {
              downloadUrl = 'https://docs.google.com/document/d/1vGmxBzm6XclkqEpg4-xZtF4eG53aLe3V7QQPsll0b38/edit?usp=drive_link';
            }

            window.location.href = downloadUrl;
          }
      </script>

      <!-- Script untuk menampilkan modal -->
        <script>
          $(document).ready(function() {
              $('.showModalBtn').click(function() {
                  var targetModalId = $(this).data('bs-target');
                  $(targetModalId).modal('show');
              });
          });
      </script>
      {{-- Close Modal --}}

        {{-- sesuai tanggal --}}
        <script>
          document.getElementById('tanggal').addEventListener('change', function() {
            var selectedDate = this.value;
            var tableRows = document.querySelectorAll('#tabelKehadiran tbody tr');
        
            tableRows.forEach(function(row) {
              var rowDate = row.querySelector('.tanggal').innerText;
              if (rowDate === selectedDate) {
                row.style.display = '';
              } else {
                row.style.display = 'none';
              }
            });
          });
        </script>
        {{-- Close --}}
        <br><br><br><br><br><br><br><br><br><br>
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
<!-- Script jQuery dan Bootstrap JS POP UP -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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