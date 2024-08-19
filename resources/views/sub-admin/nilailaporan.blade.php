
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
  <script>
    // Menggunakan JavaScript vanilla
  document.getElementById('showModalBtn').addEventListener('click', function() {
    var myModal = new bootstrap.Modal(document.querySelector('.modal'));
    myModal.show();
  });
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')
    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()  
  })
  </script>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/modalUnit.css" rel="stylesheet" />
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
              <p>Kriteria</p>
            </a>
          </li>
          <li  class="active">
            <a href="./laporan">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Hasil Laporan</p>
            </a>
          </li>
          <li>
            <a href="./peserta">
              <i class="nc-icon nc-badge"></i>
              <p>Kehadiran Peserta</p>
            </a>
          </li>
          <li>
            <a href="./seleksi">
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
           
            <ul class="navbar-nav">
            <li class="logout">
                <a href="{{ url('/logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <!-- start penilaian akhir-->
      <h1>Pengumpulan Laporan Akhir</h1>
      <main>
        <div class="container text-left">
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                // Fungsi untuk mendapatkan nilai parameter dari URL
                function getParameterByName(name, url) {
                    if (!url) url = window.location.href;
                    name = name.replace(/[\[\]]/g, "\\$&");
                    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                        results = regex.exec(url);
                    if (!results) return null;
                    if (!results[2]) return '';
                    var decodedValue = decodeURIComponent(results[2].replace(/\+/g, " "));
                    console.log(name + ':', decodedValue); // Tambahkan ini untuk menampilkan nilai pada console
                    return decodedValue;
                }

                // Mendapatkan nilai rata-rata, kesan, dan saran dari URL
                var nilaiRataRata = getParameterByName('rata_rata');
                var kesan = getParameterByName('kesan');
                var saran = getParameterByName('saran');

                // Menampilkan nilai-nilai tersebut pada elemen HTML
                document.querySelector('.form-control.hasil-rata-rata').value = nilaiRataRata;
                document.querySelector('.textarea[placeholder="Isilah kesan peserta magang."]').value = kesan;
                document.querySelector('.textarea[placeholder="Isilah saran untuk peserta magang."]').value = saran;
            });
            </script>

<table>
    <tbody>
        <tr>
            <td>Hasil Nilai</td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control hasil_nilai" value="{{$laporan_akhir->hasil_nilai}}" placeholder="Hasil Nilai" readonly>
                </div>
            </td>
        </tr>
        <tr>
            <td>Waktu Tenggat Pengumpulan</td>
            <td>
              <p>
              @php
                  // Pisahkan tanggal mulai dan tanggal selesai
                  list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $laporan_akhir->durasi);

                  // Konversi tanggal mulai ke format Indonesia
                  Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                  $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                  // Konversi tanggal selesai ke format Indonesia
                  $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                  // Tampilkan hasil
                  echo "$tanggal_mulai - $tanggal_selesai";
              @endphp
              </p>           
            </td>
        </tr>
        <tr>
            <td>Kesan</td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control kesan" value="{{$laporan_akhir->kesan}}" placeholder="Isi Kesan" readonly>
                </div>
            </td>
        </tr>
        <tr>
            <td>Saran</td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control saran" value="{{$laporan_akhir->saran}}" placeholder="Isi saran" readonly>
                </div>
            </td>
        </tr>
        <tr>
            <td>Laporan Akhir Peserta</td>
            <td>
                <a href="{{ route('file.downloadNilai', ['filename' => $laporan_akhir->pengumpulan_laporan]) }}" class="btn btn-primary">Unduh Laporan Akhir</a>
            </td>
        </tr>
    </tbody>
</table>

      </main>
      <div class="button">
          @if($laporan_akhir->status !== 'Laporan Diterima')
              @if($laporan_akhir->status !== 'Revisi')
                  <button type="button" class="btn1" id="showModalBtn">Revisi Laporan</button>
              @else
                  <button type="button" class="btn1" disabled>Sedang direvisi</button>
              @endif
          @endif

          @if($laporan_akhir->status !== 'Laporan Diterima' && $laporan_akhir->status !== 'Revisi')
              <button type="button" class="btn2 terima-btn" data-id="{{ $laporan_akhir->id }}">Diteruskan ke PPSDM</button>
          @elseif($laporan_akhir->status === 'Laporan Diterima')
              <button type="button" class="btn2" disabled>Sudah diteruskan ke PPSDM</button>
          @endif
      </div>




      <!--end penilaian akhir-->
       <!-- start modal -->
        <div class="modal text-center" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Ajukan Perbaikan Laporan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan Apa yang harus diperbaiki</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>Revisi</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                      <button class="tolak-btn" data-id="{{ $laporan_akhir->id }}">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".terima-btn", function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('laporan.terima') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(".terima-btn[data-id='" + id + "']").text('Sudah diteruskan ke PPSDM').prop('disabled', true);
                        // Menampilkan pesan sukses
                        alert("Laporan akhir Diterima");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima laporan akhir: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima laporan akhir");
                  }
        });
    });
});
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terima-btn, .tolak-btn").click(function() {
        // Merefresh halaman
        location.reload();
        // Mengarahkan ke halaman ./seleksi setelah halaman direfresh
        window.location.href = './dashboard';
    });
</script>


<script>
  $(document).ready(function() {
    $(".tolak-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('laporan.revisi') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Revisi laporan berhasil diajukan");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak pendaftaran");
                }
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak pendaftaran");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terima-btn, .tolak-btn").click(function() {
            location.reload();
        });
});

</script>



<script>
    document.getElementById('submitNilaiBtn').addEventListener('click', function() {
        var laporanAkhirId = this.getAttribute('data-laporan-akhir-id');

        // Kirim permintaan AJAX untuk memperbarui nilai
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/update-nilai-status', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Tanggapan sukses, lakukan sesuatu jika diperlukan
                console.log('Nilai telah diperbarui');
            }
        };
        xhr.send(JSON.stringify({ laporan_akhir_id: laporanAkhirId }));
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.getElementById('showModalBtn').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();

        // Menambahkan event listener pada tombol close di dalam modal
        document.querySelector('#myModal .btn-close').addEventListener('click', function() {
            myModal.hide();
        });
    });
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
</body>

</html>