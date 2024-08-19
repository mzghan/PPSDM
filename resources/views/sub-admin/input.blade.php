<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Unit Kerja</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/inputUnit.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar">
      <div class="logo">
        <a class="simple-text logo-medium">
          <div class="logo-image-medium">
            <img src="../assets/img/logo-small.png">
          </div>
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
          <li class="active">
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

      <!-- Start Tabel Penilaian Akhir -->
      <div class="container">
      <h1>LEMBAR PENILAIAN <br>
                PRAKTIK KERJA LAPANGAN <br>
                PROGRAM PENDIDIKAN SMK <br>
                DI BADAN PENGAWAS OBAT DAN MAKANAN RI</h1>
        <main>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Rincian</th>
                <th scope="col">Nilai</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Kedisiplinan</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>A. Kehadiran dan Taat jadwal</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>B. Sikap kerja</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Kemampuan</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3"required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                  <th scope="row"></th>
                  <td>A. Penguasaan Materi</td>
                  <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                  <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                  <th scope="row"></th>
                  <td>B. Praktik Kerja</td>
                  <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                  <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                  <th scope="row"></th>
                  <td>C. Inisiatif dan Hubungan Kerja/<br>Komunikasi </td>
                  <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                  <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>D. Mengetik berbagai Naskah <br> Dokumen</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>E. Menggunakan Komputer/ <br> Internet/Telepon/ dan Alat <br> Kantor Lainnya</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td >F. Menyiapkan Adminstrasi Keuangan</td>
                <td><input type="text" class="form-control nilai-input" placeholder="Input Nilai" maxlength="3" required></td>
                <td><input type="text" class="form-control keterangan-input" placeholder="Input Keterangan" required></td>
              </tr>

              <form id="nilaiForm" action="{{ route('nilai.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ $laporan_akhir->user_id }}">
                 <tr>
                  <th scope="row"></th>
                  <td class="col-span-2">Nilai Rata-Rata</td>
                  <td><input type="text" name="nilai_rata_rata" class="form-control hasil-rata-rata" placeholder="Hasil Nilai Rata-Rata" readonly></td>
                          </tr>
                          </tbody>
                      </table>
                        
                    </div>
                    <div class="nilaiakhir">
                        <h5>Nilai :</h5>
                        <p>91-100 : Sangat Baik</p>
                        <p>76-90 : Baik</p>
                        <p>61-75 : Cukup</p>
                        <p> < 61 : Kurang</p>
                        <div class="form-group">Hasil Nilai</div>
                        <input type="text" id="hasil-nilai"  name="hasil_nilai"  class="form-control hasil-rata-rata" placeholder="Hasil Nilai Rata-Rata" readonly>

                        <div class="form-group">
                            <label>Kesan</label>
                            <textarea class="form-control textarea" name="kesan" placeholder="Isilah kesan peserta magang." required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Saran</label>
                            <textarea class="form-control textarea"  name="saran"  placeholder="Isilah saran untuk peserta magang." required></textarea>
                        </div>
                    </div>
                    
                    <div class="button">
                        @if($laporan_akhir->status_pengumpulan === 'sudah dikumpulkan')
                            <button type="button" class="btn2" onclick="submitDataAndRedirect()">Input Nilai</button>
                        @elseif($laporan_akhir->status === 'Laporan Diterima')
                            <button type="button" class="btn2" onclick="submitForm('{{ $laporan_akhir->user_id }}')">Verifikasi Laporan</button>
                        @elseif($laporan_akhir->status === 'Revisi')
                            <button type="button" class="btn2" onclick="submitForm('{{ $laporan_akhir->user_id }}')">Submit Revisi</button>
                        @else
                            <!-- Jika kondisi lainnya -->
                        @endif
                    </div>
                                       
                </form>
                    <!-- <div class="button">
                            <input type="submit" class="btn2" value="Submit" onclick="submitForm()">
                    </div> -->
              
    </div>
    <!-- End Content -->

            <!-- Footer -->
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
            <!-- End Footer -->
        </div>
        <!-- End Main Panel -->
    </div>

    <!-- Core JS Files -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script>
    function validateForm() {
        // Ambil semua elemen input dengan class 'nilai-input'
        var inputs = document.querySelectorAll('.nilai-input');

        // Iterasi melalui setiap elemen input
        for (var i = 0; i < inputs.length; i++) {
            var value = inputs[i].value;

            // Periksa apakah nilai yang dimasukkan adalah angka
            if (isNaN(value)) {
                alert("Kolom nilai harus diisi dengan angka.");
                return false; // Hentikan pengiriman formulir jika ada yang bukan angka
            }
        }

        // Ambil nilai-nilai input tambahan
        var nilai_rata_rata = document.getElementsByName("nilai_rata_rata")[0].value;
        var hasil_nilai = document.getElementsByName("hasil_nilai")[0].value;
        var kesan = document.getElementsByName("kesan")[0].value;
        var saran = document.getElementsByName("saran")[0].value;

        // Periksa apakah ada input yang kosong
        if (nilai_rata_rata === "" || hasil_nilai === "" || kesan === "" || saran === "") {
            // Tampilkan pesan error jika ada input yang kosong
            alert("Harap lengkapi semua field sebelum melanjutkan.");
            return false; // Hentikan pengiriman formulir
        } else {
            // Jika semua input telah diisi, lanjutkan dengan pengiriman data dan pengalihan halaman
            submitDataAndRedirect();
            return true; // Lanjutkan pengiriman formulir
        }
    }

    // Fungsi untuk mengirim data ke server dan kemudian melakukan redirect
    function submitDataAndRedirect() {
        // Ambil nilai-nilai yang ingin Anda kirim
        var nilai_rata_rata = document.getElementsByName("nilai_rata_rata")[0].value;
        var hasil_nilai = document.getElementsByName("hasil_nilai")[0].value;
        var kesan = document.getElementsByName("kesan")[0].value;
        var saran = document.getElementsByName("saran")[0].value;
        var user_id = "{{ $laporan_akhir->user_id }}"; // Ambil user_id dari PHP

        // Kirim data ke server menggunakan XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "{{ route('nilai.store') }}", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

        // Ketika respons diterima dari server
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Jika respons sukses, lakukan redirect ke halaman nilailaporan
                window.location.href = "{{ route('nilailaporan') }}?user_id=" + user_id;
            } else {
                // Jika terjadi kesalahan, tampilkan pesan kesalahan
                alert("Terjadi kesalahan saat menyimpan data.");
            }
        };

        // Ketika terjadi kesalahan saat mengirimkan permintaan
        xhr.onerror = function() {
            alert("Terjadi kesalahan saat menyimpan data.");
        };

        // Kirim data ke server dalam format JSON
        xhr.send(JSON.stringify({
            user_id: user_id,
            nilai_rata_rata: nilai_rata_rata,
            hasil_nilai: hasil_nilai,
            kesan: kesan,
            saran: saran
        }));
    }
</script>

<script>
    // Mendapatkan semua elemen input nilai
    var nilaiInputElements = document.querySelectorAll('.nilai-input');

    // Menambahkan event listener untuk setiap input
    nilaiInputElements.forEach(function(inputElement) {
        inputElement.addEventListener('input', function() {
            var value = this.value.trim(); // Menghapus spasi di awal dan akhir
            var numericValue = parseInt(value); // Mengonversi nilai ke tipe data numerik

            // Memeriksa apakah nilai dimulai dengan 0
            if (value.startsWith('0')) {
                this.value = '';
                return;
            }

            // Memeriksa apakah nilai bukan angka
            if (isNaN(numericValue)) {
                this.value = '';
                return;
            }

            // Memeriksa apakah nilai lebih dari 100
            if (numericValue > 100) {
                this.value = '100';
                return;
            }
        });
    });
</script>

<script>
    // Mendapatkan semua elemen input nilai
    var nilaiInputElements = document.querySelectorAll('.nilai-input');

    // Mendapatkan elemen input hasil rata-rata
    var hasilRataRataElement = document.querySelector('.hasil-rata-rata');
    var hasilNilaiElement = document.getElementById('hasil-nilai');

    // Menambahkan event listener untuk setiap input
    nilaiInputElements.forEach(function(inputElement) {
        inputElement.addEventListener('input', hitungRataRata);
    });

    // Fungsi untuk menghitung nilai rata-rata
    function hitungRataRata() {
        var totalNilai = 0;
        var jumlahInput = 0;

        // Loop melalui setiap elemen input nilai
        nilaiInputElements.forEach(function(inputElement) {
            var value = inputElement.value.trim(); // Menghapus spasi di awal dan akhir
            var numericValue = parseInt(value); // Mengonversi nilai ke tipe data numerik

            // Memeriksa apakah nilai bukan angka
            if (!isNaN(numericValue)) {
                totalNilai += numericValue;
                jumlahInput++;
            }
        });

        // Hitung nilai rata-rata
        var rataRata = (jumlahInput > 0) ? totalNilai / jumlahInput : 0;

        // Tampilkan nilai rata-rata pada elemen hasil
        if (jumlahInput === nilaiInputElements.length) {
            hasilRataRataElement.value = rataRata.toFixed(2); // Menampilkan 2 digit desimal
            konversiNilai();
        } else {
            hasilRataRataElement.value = ''; // Mengosongkan nilai rata-rata jika semua form belum diisi
            hasilNilaiElement.value = ''; // Mengosongkan hasil nilai jika semua form belum diisi
        }
    }

    // Fungsi untuk mengonversi nilai rata-rata menjadi kalimat
    function konversiNilai() {
        var hasilRataRata = parseFloat(hasilRataRataElement.value);
        var hasilNilai = '';

        if (hasilRataRata >= 91 && hasilRataRata <= 100) {
            hasilNilai = 'Sangat Baik';
        } else if (hasilRataRata >= 76 && hasilRataRata <= 90) {
            hasilNilai = 'Baik';
        } else if (hasilRataRata >= 61 && hasilRataRata <= 75) {
            hasilNilai = 'Cukup';
        } else {
            hasilNilai = 'Kurang';
        }

        // Menampilkan hasil nilai dalam input yang ditentukan
        hasilNilaiElement.value = hasilNilai;
    }
</script>


</main>
</body>
</html>