<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <title>Administrator - Admin BPOM</title>
 <!--     Fonts and icons     -->
 <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/seleksiadmin.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
      <div class="sidebar-wrapper" style="overflow-y: hidden;">
      <ul class="nav" id="myNav">
          <li>
            <a href="./homepage">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./kualifikasi">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Kriteria
              <!-- Tambahkan notifikasi di sini -->
              @if(Session::has('newKriteriaCount') && Session::get('newKriteriaCount') > 0)
              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newKriteriaCount') }}</span>
              @endif
              </p>
            </a>
          </li>
          <li>
            <a href="./administrator">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Laporan
                @if(Session::has('newLaporanAkhirCount') && Session::get('newLaporanAkhirCount') > 0)
                    <span class="badge badge-danger"  style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newLaporanAkhirCount') }}</span>
                @endif
            </p>
            </a>
          </li>
          <li class="active-dropdown">
            <a href="javascript:void(0);" class="dropbtn">
              <i class="nc-icon nc-refresh-69 "></i>
              <p>Lowongan
                <!-- Tambahkan notifikasi di sini -->
              @if(Session::has('newProccessCount') && Session::get('newProccessCount') > 0)
              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newProccessCount') }}</span>
              @endif
              </p>
            </a>
            <div class="dropdown-content">
              <a href="./pilihan">Administrator</a>
              <a href="./peserta">Data Peserta</a>
              <a href="./pegawai">Role Pegawai</a>
              <a href="./data">Input NIP</a>
            </div>
          </li>
          <li>
            <a href="./seleksiakhir">
              <i class="nc-icon nc-single-02"></i>
              <p>Seleksi
                @if(Session::has('newSeleksiCount') && Session::get('newSeleksiCount') > 0)
                <span class="badge badge-danger"  style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newSeleksiCount') }}</span>
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
            <a class="navbar-brand" href="javascript:;">Administrator</a>
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
      <!-- <div class="row">
        <div class="col-md-3">
         <div class="card card-user">
           <div class="image">
             <img src="../assets/img/damir-bosnjak.jpg" alt="...">
           </div>
           <div class="card-body">
             <div class="author">
               <a href="#">
                 <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                   <h5 class="title">Web Developer</h5>
               </a>
               <p class="description">
                 Apriansyah Rachman
               </p>
             </div>
             <p class="description text-center">
              Universitas Negeri Jakarta<br>
              S1 Pend. Teknik Informatika<br>
             </p>
             </div>
             <div class="row">
               <div class="update ml-auto mr-auto">
                 <button type="submit" class="btn btn-primary btn-round">Lihat Berkas</button>
              </div>
           </div>
         </div>
       </div>
     </div> -->
      <!--end content-->

            <!--start content-->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                    <button class="mandiri" onclick="navigateToPage()">PKL/Magang Mandiri</button>
                </div>
                {{-- <div class="col">
                  <button class="penelitian" onclick="navigateToPage1()">Penelitian/ Wawancara</button>
                </div> --}}
                <div class="col">
                  <button class="posting" onclick="navigateToPage2()">Pendaftar Via Lowongan</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Pendaftaran</h4>
                <p>*nama, status, jenis, universitas/sekolah, jurusan</p>
                {{-- search --}}
                <div class="row g-3 align-items-center">
                  <div class="col-auto">
                    <form action="pilihan" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                  </form>
                  </div>
                </div>
                {{-- end --}}
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text">
                      <th>
                        No.
                      </th>
                      <th>
                        Nama Lengkap
                      </th>
                      <th>
                        Unit Kerja
                      </th>
                      <th>
                        Universitas/Sekolah
                      </th>
                      <th>
                        Jurusan
                      </th>
                      <th>
                        Waktu PKL/Magang
                      </th>
                      <th>
                        Status Pendaftaran
                      </th>
                      <th class="text-center">
                        Berkas
                      </th>
                    </thead>

                      <!-- POP UP for $posting -->
                      @foreach($postings as $posting)
                    <div class="user-data" data-user_id="{{ $posting->user_id }}">
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $posting->name }}</td>
                                <td>{{ $posting->unit }}</td>
                                <td>{{ $posting->universitas_sekolah }}</td>
                                <td>{{ $posting->jurusan }}</td>
                                <td>
                                  @php
                                      // Pisahkan tanggal mulai dan tanggal selesai
                                      list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $posting->durasi);

                                      // Konversi tanggal mulai ke format Indonesia
                                      Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                      $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                      // Konversi tanggal selesai ke format Indonesia
                                      $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                      // Tampilkan hasil
                                      echo "$tanggal_mulai - $tanggal_selesai";
                                  @endphp
                                </td>
                                <td><div class="status">
                                @if($posting->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @else
                                    <p class="development2">{{ $posting->status }}</p>
                                @endif</td>
                                <td class="text-right">
                                    <button class="btn btn-primary btn-round showModalBtn2" data-bs-toggle="modal" data-bs-target="#myModal2{{ $loop->iteration }}">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                  @endforeach

                  <!--modal utama posting-->
                  @foreach($postings as $posting)
                      <div div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $posting->jurusan }} <br> {{ $posting->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="grid-container">
                                            <div class="box">
                                              <h2>Kontak Personal</h2>
                                              <p>Email : {{ $posting->email }} </p>
                                              <p>No. Telepon : {{ $posting->phone }} </p>
                                              <p>NIK : {{ $posting->nik }} </p>
                                              <p>NIM : {{ $posting->nim }} </p>
                                            </div>
                                            <div class="box">
                                              <h2>Informasi Asal Universitas/Sekolah</h2>
                                              <p>Tingkatan : {{ $posting->tingkatan}}</p>
                                              <p>Universitas/Sekolah : {{ $posting->universitas_sekolah }}</p>
                                              {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah}}</p> --}}
                                              <p>Jurusan : {{ $posting->jurusan }}</p>
                                            </div>
                                            <div class="box" style="height: 200px; overflow-y: auto;">
                                                <h2>Informasi Diri</h2>
                                                <p> <strong>Tujuan Magang</strong>  :<br> {{ $posting->tujuan_magang}}</p> <br>
                                                <p> <strong>Ilmu yang dicari</strong> : <br> {{ $posting->ilmu_yang_dicari}}</p> <br>
                                                <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $posting->output_setelah_magang}}</p>
                                            </div>
                                            <div class="box">
                                                <h2>Informasi Pendukung </h2>
                                                <p>Posisi yang dipilih: {{ $posting->posisi }}</p>
                                                <p>Waktu  Mulai s.d Selesai : {{ $posting->durasi }}</p>
                                                <p>Surat Pendukung : <a href="{{ route('file.download', ['filename' => $posting->surat_pendukung]) }}">Unduh Surat Pendukung</a> </p>
                                                <p>Proposal : <a href="{{ route('file.download', ['filename' => $posting->proposal]) }}">Undu Proposal</a> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak1{{ $loop->iteration }}">Tolak</button>
                                        <button type="button" class="btn2" data-bs-toggle="modal" id="showModalForward1{{ $loop->iteration }}">Pilih Unit Kerja</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
                                <!-- FOOTER -->
    <br><br><br><br><br>
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
      {{-- dropdown --}}
<script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>
<script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('.active-dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>
       <!-- Script untuk menampilkan modal -->
       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#showModalBtn2').click(function() {
            $('#myModal2').modal('show');
          });
        });
      </script>
      <!-- JS Jumper Halaman -->
      <script>
        function navigateToPage() {
        window.location.href = 'mandiri';
        }

        function navigateToPage1() {
        window.location.href = 'penelitian';
        }

        function navigateToPage2() {
        window.location.href = 'posting';
        }
      </script>
<script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>
      <!-- End Jumper Halaman -->
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