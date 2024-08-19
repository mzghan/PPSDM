<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ppsdm.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Laporan - Admin BPOM
  </title>
  <!-- JS POP UP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CLOSE POP UP -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/seleksiadmin.css" rel="stylesheet" />
      <style>
        html, body {
            overflow-x: hidden; /* Menghilangkan scroll bar horizontal */
        }
    </style>
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
          <li class="active-dropdown">
            <a href="javascript:void(0);" class="dropbtn">
              <i class="nc-icon nc-refresh-69 "></i>
              <p>Input NIP
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
            <a class="navbar-brand" href="javascript:;">Laporan Akhir Peserta</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
            
            </form>
            <ul class="navbar-nav">
            <li class="logout">
                <a href="{{ url('/logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                    <h3>Data Administrasi Sertifikat</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Input Nomor Sertifikat</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                  <form action="{{ route('store.data') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table">
                            <thead class="text-primary">
                                <th>No.</th>
                                <th>Kepala Unit</th>
                                <th>NIP</th>
                                <th>Tanda Tangan</th>
                                <th class="text-center">Submit</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="form-group">
                                        <input type="text" name="kepala_unit[]" value="{{ old('kepala_unit') }}" class="magang" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                        <input type="text" name="nip[]" value="{{ old('nip') }}" class="magang" required>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="form-group file-wrapper">
                                          <label for="tanda_tangan">Pilih File</label>
                                          <input type="file" class="form-control @error('tanda_tangan') is-invalid @enderror" name="tanda_tangan[]" id="tanda_tangan" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" required>
                                          @error('tanda_tangan')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                          </span>
                                          @enderror
                                      </div>
                                      <div class="mt-3"><img src="" id="output" width="300"></div>
                                    </td>
                                    <td class="text-right">
                                        <button type="submit" class="btn btn-primary btn-round">Input Data</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end content-->
       <!--content baru-->
       <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="places-buttons">
                          <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                              <h4 class="card-title">
                                Riwayat Data Administrasi
                              </h4>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                                  <div class="table-responsive" style="overflow-x: hidden;" >
                                    <table class="table">
                                      <thead class=" text-primary">
                                      <th>No.</th>
                                      <th>Kepala Unit</th>
                                      <th>NIP</th>
                                      <th>Tanda Tangan</th>

                                      </thead>
                                     <tbody>
                                     @foreach($data_intis as $data_inti)
                                          <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $data_inti->kepala_unit }}</td>
                                              <td>{{ $data_inti->nip }}</td>
                                              <td><img src="{{asset($data_inti->tanda_tangan)}}" width="100" alt="tanda_tangan"></td>
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
                     </div>
                   </div>
              <!-- FOOTER -->
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
      <!--end content baru-->
            </div>
          </div>
        </div>
        <!--END CONTENT-->

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

 <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalButtons = document.querySelectorAll('.btn-show-modal2');

        showModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const targetId = button.getAttribute('data-target');
                const modal = document.getElementById('myModal2' + targetId);
                const modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
            });
        });
    });
</script>


  <!-- JS Jumper Halaman -->
  <script>
        function navigateToPage() {
        window.location.href = 'logbook.php';
        }

        function navigateToPage1() {
        window.location.href = 'verifikasi.php';
        }
  </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pastikan Anda telah memuat jQuery -->
<script>
    $(document).ready(function() {
        $(".terimaK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut
            var nomor_sertifikat = $('input[name="nomor_sertifikat"]').val(); // Mengambil nilai input dengan name="nomor_sertifikat"

            // Permintaan Ajax untuk menyimpan nomor sertifikat
            $.ajax({
                type: "POST",
                url: "{{ route('simpan.sertifikat') }}", // Sesuaikan dengan nama route yang Anda gunakan
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: id, // Menggunakan user_id sebagai atribut
                    nomor_sertifikat: nomor_sertifikat
                },
                success: function(response) {
                    // Menampilkan pesan sukses
                    alert("Nomor sertifikat berhasil disimpan");
                    location.reload(); // Merefresh halaman setelah sukses
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat memasukkan nomor sertifikat");
                }
            });
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

  <!-- End Jumper Halaman -->
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
  <script>
    $(document).ready(function() {
      demo.initGoogleMaps();
    });
  </script>
  {{-- Data putih --}}
  <script>
    // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
    var dropdowns = document.querySelectorAll('.active-dropdown');
    dropdowns.forEach(function(dropdown) {
      dropdown.addEventListener('click', function() {
        this.classList.toggle('active');
      });
    });
  </script>
</body>

</html>