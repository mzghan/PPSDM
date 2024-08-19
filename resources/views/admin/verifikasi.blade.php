<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ppsdm.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administrator - Admin BPOM
  </title>
  <!-- JS POP UP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CLOSE JS POP UP -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/verifikasipeserta.css" rel="stylesheet" />
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
            <a href="./homepage">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./kualifikasi">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Lowongan
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
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropbtn">
              <i class="nc-icon nc-refresh-69 "></i>
              <p>Administrator
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
            <a class="navbar-brand" href="javascript:;">Verifikasi Admin</a>
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
                    <h3>Verifikasi Pendaftar</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Peserta Magang</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No.
                      </th>
                      <th>
                        Nama Lengkap
                      </th>
                      <th>
                        Jurusan
                      </th>
                      <th>
                        Universitas/Sekolah
                      </th>
                      <th class="text-center">
                        Verifikasi
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          1
                        </td>
                        <td>
                          Farsya Hawariyin
                        </td>
                        <td>
                          Kimia Murni
                        </td>
                        <td>
                          Universitas Sebelas Maret
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          2
                        </td>
                        <td>
                        Yusuf Ardiansyah
                        </td>
                        <td>
                        Kimia Murni
                        </td>
                        <td>
                        Universitas Gadjah Mada
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn1" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          3
                        </td>
                        <td>
                        Azmi Rihadatul Aisy
                        </td>
                        <td>
                        Kimia murni
                        </td>
                        <td>
                        Universitas Gadjah Mada
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn2" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          4
                        </td>
                        <td>
                        Armita Pratiwi Nur Kholissha
                        </td>
                        <td>
                        Kimia Murni
                        </td>
                        <td>
                        Universitas Gadjah Mada
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn3" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          5
                        </td>
                        <td>
                        Talitha Shabirah Aulia
                        </td>
                        <td>
                        Farmasi
                        </td>
                        <td>
                        Universitas Indonesia
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn4" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          6
                        </td>
                        <td>
                        Ivena Nathaniela Ballo
                        </td>
                        <td>
                        Gizi
                        </td>
                        <td>
                        Universitas Indonesia
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn5" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          7
                        </td>
                        <td>
                        Deas Maulidya Ashrini
                        </td>
                        <td>
                        Biologi
                        </td>
                        <td>
                        Univesitas Brawijaya
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn6" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          8
                        </td>
                        <td>
                        Ghani Rasyad Khalifa
                        </td>
                        <td>
                        Pendidikan Teknik Informatika dan Komputer
                        </td>
                        <td>
                        Universitas Negeri Jakarta
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn7" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          9
                        </td>
                        <td>
                        Ahmad Adam Ramadhan Yusuf
                        </td>
                        <td>
                        Pendidikan Teknik Informatika dan Komputer
                        </td>
                        <td>
                        Universitas Negeri Jakarta
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn8" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          10
                        </td>
                        <td>
                        Apriansyah Rachman
                        </td>
                        <td>
                        Pendidikan Teknik Informatika dan Komputer
                        </td>
                        <td>
                        Universitas Negeri Jakarta
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn9" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          11
                        </td>
                        <td>
                        David Rizky Andhika Surya
                        </td>
                        <td>
                        Pendidikan Teknik Informatika dan Komputer
                        </td>
                        <td>
                        Universitas Negeri Jakarta
                        </td>
                        <td class="text-right">
                        <button type="submit" class="btn btn-primary btn-round" id="showModalBtn10" data-bs-toggle="modal" data-bs-target="#myModal">Lihat Laporan</button>
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
      <!--end content-->
      <!-- Modal POP UP -->
      <div class="modal" tabindex="-1"id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" >Farmasi <br> Farsya Hawariyin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <box class="box">
                        <h2>Deskripsi Peserta :</h2>
                        <p>Email : farsyahawariyin@gmail.com</p>
                        <p>No. Telepon : 081234567890</p>
                        <p>NIK : 331263170090</p>
                        <p>NIM : 1512677523</p>
                      </box>
                      <box class="box">
                        <h2>Informasi Asal Instansi</h2>
                        <p>Universitas/Sekolah : Universitas Sebelas Maret</p>
                        <p>Alamat Universitas/Sekolah : Kentingan, Jl. Ir Sutami Kec. Jebres</p>
                        <p>Jurusan : Kimia Murni</p>
                        <p>Semester : 5</p>
                      </box>
                      <box class="box">
                        <h2>Laporan : </h2>
                        <p>Unduh Laporan :<button class="download-button" onclick="downloadFile('surat_pendukung')">Unduh Laporan Akhir</button></p>
                        <form class="row g-3">
                        <div class="col-md-12">
                            <label for="surat_pendukung">Input Sertifikat :</label><br>
                            <input type="file" name="surat_pendukung" id="surat_pendukung" class="" >
                        </div>
                        <div class="col-md-12">
                            <label for="inputDeskripsi" class="form-label">Deskripsi</label><br>
                            <input type="text" class="form-controldeskripsi" id="inputDeskripsi">
                        </div>
                      </box>           
                      <div class="modal-footer">
                        <button type="button" class="btn1" data-bs-dismiss="modal">Tolak</button>
                        <button type="button" class="btn2" data-bs-dismiss="modal">Terima</button>
                      </div>
                </div>
              </div>

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
      <script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>
      
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">PPSDM BPOM</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Admin</a></li>
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