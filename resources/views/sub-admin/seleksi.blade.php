
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
  <link href="../assets/demo/seleksiUnit.css" rel="stylesheet" />
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
          <li>
            <a href="./peserta">
              <i class="nc-icon nc-badge"></i>
              <p>Kehadiran</p>
            </a>
          </li>
          <li  class="active">
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
                    <h3>Daftar Posisi Pendaftar Peserta PKL/Magang</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pendaftaran Posisi Magang</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive"  style="overflow-x: hidden;">
                @php
                    $groupedData = [];

                    // Mengelompokkan data berdasarkan jenis pendaftaran
                    foreach($mandiris as $mandiri) {
                        $jenis = $mandiri->jenis;
                        if(!isset($groupedData[$jenis])) {
                            $groupedData[$jenis] = $mandiri;
                        }
                    }
                @endphp
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Jenis Pendaftaran
                      </th>
                      <th>
                        Jumlah Pendaftar
                      </th>
                      <th class="text-center">
                        Detail Pendaftar
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $uniquePostings = $postings->unique(function ($item) {
                          return $item->posisi . $item->jenis;
                      });
                  @endphp
                  
                  @foreach($uniquePostings as $posting)
                      <tr>
                          {{-- <td>{{ $loop->iteration }}</td> --}}
                          <td>{{ $posting->jenis }}</td>
                          <td class="angka">
                            {{ $postings->where('jenis', $posting->jenis)->count() }}
                          </td>
                          <td class="text-center">
                              <form action="{{ route('posisi.set', ['id' => $posting->id]) }}" method="GET">
                                  @csrf
                                  <button type="submit" class="btn2" data-posisi="{{ $posting->posisi }}" data-jenis="{{ $posting->jenis }}">Review Pendaftar</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                  
                  @foreach($groupedData as $mandiri)
                      <tr>
                          
                          {{-- Jenis Pendaftaran --}}
                          <td>{{ $mandiri->jenis }}</td>

                          <td class="angka">
                            {{ $mandiris->where('jenis', $mandiri->jenis)->count() }}
                          </td>
                          
                          {{-- Detail Pendaftar --}}
                          <td class="text-center">
                              <form action="{{ route('posisiM.set', ['id' => $mandiri->id]) }}" method="GET">
                                  @csrf
                                  <button type="submit" class="btn2">Review Pendaftar</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  
                  @foreach($wawancaras as $wawancara)
                      <tr>
                          {{-- <td>{{ $loop->iteration }}</td> --}}
                          <td>{{ $wawancara->jurusan }}</td>
                          <td>{{ $wawancara->jenis }}</td>
                          <td class="text-center">
                              <form action="{{ route('posisiW.set', ['id' => $wawancara->id]) }}" method="GET">
                                  @csrf
                                  <button type="submit" class="btn2">Review Pendaftar</button>
                              </form>
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
          $('#showModalBtn, #showModalBtn1, #showModalBtn2, #showModalBtn3, #showModalBtn4, #showModalBtn5, #showModalBtn6, #showModalBtn7, #showModalBtn8, #showModalBtn9, #showModalBtn10').click(function() {
            $('#myModal').modal('show');
          });
        });
      </script>
      
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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