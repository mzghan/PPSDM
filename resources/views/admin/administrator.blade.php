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
      <div class="sidebar-wrapper" style="overflow-y: hidden;">
      <!-- Menu -->
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
        <li class="active">
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
      <!-- End Navbar -->


            <!--start content-->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                    <h3>Daftar Hasil Laporan</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Laporan Peserta</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No.
                      </th>
                      <th>
                        Nama Lengkap
                      </th>
                      <th>
                        Jurusan/Posisi
                      </th>
                      <th>
                        Unit Kerja
                      </th>
                      <th>
                        Tingkatan
                      </th>
                      <th class="text-center">
                        Laporan Akhir
                      </th>
                    </thead>
                    <tbody>
                      @if($laporan_akhirs->isEmpty())
                          <tr>
                              <td colspan="6">Belum ada laporan peserta yang dikumpulkan</td>
                          </tr>
                      @else
                          @foreach($laporan_akhirs as $laporan_akhir)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $laporan_akhir->name }}</td>
                                  <td>{{ $laporan_akhir->posisi }}</td>
                                  <td>{{ str_replace(['[', ']', '"'], '', $laporan_akhir->unit) }}</td>
                                  <td>{{ $laporan_akhir->tingkatan }}</td>
                                  <td class="text-center">
                                      <div class="update ml-auto mr-auto">
                                          <button type="button" class="btn-show-modal2" data-target="{{ $loop->iteration }}">Lihat Status Laporan</button>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                      @endif
                  </tbody>

                  </table>
                </div>
              </div>
            </div>
            @foreach($laporan_akhirs as $laporan_akhir)
    <div class="row">
        <div class="col-md-3">
            <!-- Start modal -->
            <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $laporan_akhir->posisi }}<br> {{ $laporan_akhir->name }}</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="grid-container">
                                <div class="box">
                                    <h2>Kontak Personal</h2>
                                    <p>Email : {{ $laporan_akhir->email }}</p>
                                    <p>No. Telepon : {{ $laporan_akhir->phone }}</p>
                                    <p>NIK : {{ $laporan_akhir->nik }}</p>
                                    <p>NIM : {{ $laporan_akhir->nim }}</p>
                                    <p>Jurusan : {{ $laporan_akhir->jurusan }}</p>
                                    <p>Tingkatan : {{ $laporan_akhir->tingkatan }}</p>
                                </div>
                                <div class="box">
                                    <h2>Nilai Akhir Magang</h2>
                                    <p>Nilai Rata-Rata : {{ $laporan_akhir->nilai_rata_rata }}</p>
                                    <p>Hasil Nilai : {{ $laporan_akhir->hasil_nilai }}</p>
                                    <p>Kesan: {{ $laporan_akhir->kesan }}</p>
                                    <p>Saran : {{ $laporan_akhir->saran }}</p>
                                    <p>Laporan Akhir : <a href="{{ route('file.download', ['filename' => $laporan_akhir->pengumpulan_laporan]) }}" class="btn btn-primary">Unduh Laporan Akhir</a></p>
                                </div>
                                <div class="box">
                                    <h2>Input Nomor Sertifikat</h2>
                                    <label for="berkas">Nomor Sertifikat</label><br>
                                    @if($laporan_akhir->nomor_sertifikat)
                                        <input type="text" name="nomor_sertifikat" class="text" value="{{ $laporan_akhir->nomor_sertifikat }}" disabled>
                                        <input type="hidden" name="nomor_sertifikat" value="{{ $laporan_akhir->nomor_sertifikat }}">
                                        <script>
                                            $(document).ready(function() {
                                                $(".terimaK-btn").hide(); // Sembunyikan tombol Terima
                                            });
                                        </script>
                                    @else
                                        <input type="text" name="nomor_sertifikat" class="text">
                                        <div class="modal-footer">
                                            <button class="btn btn-primary terimaK-btn" data-id="{{ $laporan_akhir->user_id }}">Submit</button>
                                        </div>
                                    @endif
                                </div>
                                <div class="box">
                                    <h2>Hasil Survei Kinerja PIC</h2>
                                    <p>{{ $laporan_akhir->pegawai }}</p>
                                    <!-- Button survei terkait dengan modal yang sesuai -->
                                    <button type="button"class="btn-show-modal" data-target="{{ $loop->iteration }}">Survey</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

            <!-- Modal evaluasi -->
            <div class="modal" tabindex="-1" id="myModal{{$loop->iteration}}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Evaluasi Tenaga Kerja <br> {{ $laporan_akhir->pegawai }} </h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($laporan_akhirs->isEmpty())
                                <p>Belum ada laporan peserta yang dikumpulkan</p>
                            @else
                                <table id="evaluasi-table" class="table">
                                    <thead>
                                        <p class="table-caption ml-3">Hasil survey 1 (sangat kurang) - 2 (Kurang) - 3 (Netral) - 4 (Baik) - 5 (Sangat Baik)</p>
                                        <tr>
                                            <th>No.</th>
                                            <th>Evaluasi</th>
                                            <th>Penilaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="number">1</td>
                                            <td>Penguasaan dan pemahaman materi yang disampaikan kepada peserta yang disampaikan dalam Praktik Kerja Lapangan</td>
                                            <td>
                                                @if (isset($evaluasis[$laporan_akhir->user_id]))
                                                    {{ $evaluasis[$laporan_akhir->user_id]->nilai1 ?? 'N/A' }}
                                                @else
                                                    Belum dinilai
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">2</td>
                                            <td>Interaksi fasilitator / pembimbing dengan peserta Praktik Kerja Lapangan</td>
                                            <td>
                                            @if (isset($evaluasis[$laporan_akhir->user_id]))
                                                {{ $evaluasis[$laporan_akhir->user_id]->nilai2 ?? 'N/A' }}
                                            @else
                                              Belum dinilai
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">3</td>
                                            <td>Suasana pembelajaran yang diciptakan oleh fasilitator / pembimbing selama Praktik Kerja Lapangan</td>
                                            <td>
                                            @if (isset($evaluasis[$laporan_akhir->user_id]))
                                                {{ $evaluasis[$laporan_akhir->user_id]->nilai3 ?? 'N/A' }}
                                            @else
                                              Belum dinilai
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">4</td>
                                            <td>Kesesuaian dan kebermanfaatan materi yang diberikan oleh widyaiswara/ narasumber/ fasilitator</td>
                                            <td>
                                            @if (isset($evaluasis[$laporan_akhir->user_id]))
                                                {{ $evaluasis[$laporan_akhir->user_id]->nilai4 ?? 'N/A' }}
                                            @else
                                              Belum dinilai
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="number">5</td>
                                            <td>Pemberian motivasi oleh widyaiswara/ narasumber/ fasilitator kepada peserta</td>
                                            <td>
                                            @if (isset($evaluasis[$laporan_akhir->user_id]))
                                                {{ $evaluasis[$laporan_akhir->user_id]->nilai5 ?? 'N/A' }}
                                            @else
                                              Belum dinilai
                                            @endif
                                            </td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td><label for="saran">Adakah saran/masukan terkait fasilitator / pembimbing selama pelaksanaan Praktik Kerja Lapangan? ya/tidak? </label></td>
                                          <td>
                                          @if (isset($evaluasis[$laporan_akhir->user_id]))
                                              {{ $evaluasis[$laporan_akhir->user_id]->saran ?? 'N/A' }}
                                          @else
                                            Belum dinilai
                                          @endif
                                          </td>
                                      </tr>
                                      <tr>
                                          <td></td>
                                          <td><label for="masukan">Jika Ya, masukan apa yang dapat saudara/i usulkan? </label></td>
                                          <td>
                                          @if (isset($evaluasis[$laporan_akhir->user_id]))
                                              {{ $evaluasis[$laporan_akhir->user_id]->masukan ?? 'N/A' }}
                                          @else
                                            Belum dinilai
                                          @endif
                                          </td>
                                      </tr>
                                
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal evaluasi -->
        </div>
    </div>
@endforeach
  <!-- FOOTER -->
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
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        const showModalButtons = document.querySelectorAll('.btn-show-modal');

        showModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const targetId = button.getAttribute('data-target');
                const modal = document.getElementById('myModal' + targetId);
                const modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
            });
        });
    });
</script>

<script>
  // Dapatkan tombol untuk menampilkan modal
const showModalButton = document.querySelector('.showModalBtn1');

// Dapatkan modal yang akan ditampilkan
const modal = document.getElementById('myModal1');

// Tambahkan event listener untuk menampilkan modal saat tombol diklik
showModalButton.addEventListener('click', function() {
    // Munculkan modal
    modal.style.display = 'block';
});

// Tambahkan event listener untuk menyembunyikan modal saat tombol close di klik
modal.querySelector('.btn-close').addEventListener('click', function() {
    // Sembunyikan modal
    modal.style.display = 'none';
});

// Tambahkan event listener untuk menyembunyikan modal saat area di luar modal diklik
window.addEventListener('click', function(event) {
    // Periksa apakah area yang diklik adalah area di luar modal
    if (event.target === modal) {
        // Sembunyikan modal
        modal.style.display = 'none';
    }
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
            var userId = $(this).data('id'); // Mengambil data-id sebagai atribut
            var nomorSertifikat = $(this).closest('.modal-content').find('input[name="nomor_sertifikat"]').val(); // Mengambil nilai input dengan name="nomor_sertifikat"

            // Permintaan Ajax untuk menyimpan nomor sertifikat
            $.ajax({
                type: "POST",
                url: "{{ route('simpan.sertifikat') }}", // Sesuaikan dengan nama route yang Anda gunakan
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId, // Menggunakan user_id sebagai atribut
                    nomor_sertifikat: nomorSertifikat
                },
                success: function(response) {
                    if (response.success) {
                        // Menampilkan pesan sukses
                        alert("Nomor sertifikat berhasil disimpan");
                        location.reload(); // Merefresh halaman setelah sukses
                    } else {
                        // Menampilkan pesan gagal
                        alert(response.message);
                    }
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
</body>

</html>