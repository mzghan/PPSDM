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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
  <link href="../assets/demo/posisi.css" rel="stylesheet" />
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
          <li class="active">
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
          <li >
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
      {{-- Mulai --}}
      <!--start content-->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                    <h3>Daftar Laporan Akhir Peserta PKL/Magang</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Status Laporan Akhir Peserta</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No.
                      </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        Jurusan/Posisi
                      </th>
                      <th>
                        Instansi
                      </th>
                      <th>
                        Tingkatan
                      </th>
                      <th>
                        Waktu Tenggat
                      </th>
                      <th>
                        Nilai
                      </th>
                    </thead>
                    <tbody>
                    @foreach($laporan_akhirs as $laporan_akhir)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $laporan_akhir->name }}</td>
                          <td>{{ $laporan_akhir->posisi }}</td>
                          <td>{{ $laporan_akhir->universitas_sekolah }}</td>
                          <td>{{ $laporan_akhir->tingkatan }}</td>
                          <td>
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
                                </td>
                          <td class="text-center">
                            <div class="update ml-auto mr-auto">
                            <button type="button" class="btn-show-modal2" data-target="{{ $loop->iteration }}" data-status="{{ $laporan_akhir->status_pengumpulan }}">Lihat Status Laporan</button>
                            </div>
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
      {{-- End --}}
      @foreach($laporan_akhirs as $laporan_akhir)
    <div class="row">
        <div class="col-md-3">
            <!--start modal-->
            <div class="modal" tabindex="-1"id="myModal2{{ $loop->iteration }}sudah-dikumpulkan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" >{{ $laporan_akhir->posisi }}<br> {{ $laporan_akhir->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <h2>Status Laporan Akhir</h2>
                                    @if($laporan_akhir && $laporan_akhir->status === 'Laporan Diterima')
                                        <h2>Sudah dinilai</h2>
                                    @else
                                        <p>Tenggat Pengumpulan :{{ $laporan_akhir->waktu_selesai }}</p>
                                        <p>Peserta mengumpulkan Pada : {{$laporan_akhir->updated_at}}</p> 
                                    @endif
                                </div>
                            </div>
                            @if($laporan_akhir && $laporan_akhir->status === 'Laporan Diterima')
                                <!-- Jika status nilai sudah 'Laporan Diterima', sembunyikan button input nilai -->
                                @if($laporan_akhir->tingkatan == 'Perguruan Tinggi')
                                    <a class="btn2" style="display: none;" href="{{ route('inputptn') }}?user_id={{ $laporan_akhir->user_id }}">Input Nilai</a>
                                @elseif($laporan_akhir->tingkatan == 'Sekolah Menengah Kejuruan')
                                    <a class="btn2" style="display: none;" href="{{ route('input') }}?user_id={{ $laporan_akhir->user_id }}">Input Nilai</a>
                                @else
                                    <span class="btn2" style="display: none;">Tingkatan Tidak Dikenali</span>
                                @endif
                            @else
                                <!-- Jika status nilai belum 'Laporan Diterima', tampilkan button input nilai -->
                                @if($laporan_akhir->tingkatan == 'Perguruan Tinggi')
                                    @if($laporan_akhir->status != 'Revisi')
                                        <a class="btn7" href="{{ route('inputptn') }}?user_id={{ $laporan_akhir->user_id }}">Input Nilai</a>
                                    @else
                                        <button class="btn8" disabled>Sedang Revisi</button>
                                    @endif
                                @elseif($laporan_akhir->tingkatan == 'Sekolah Menengah Kejuruan')
                                    @if($laporan_akhir->status != 'Revisi')
                                        <a class="btn7" href="{{ route('input') }}?user_id={{ $laporan_akhir->user_id }}">Input Nilai</a>
                                    @else
                                        <button class="btn7" disabled>Sedang Revisi</button>
                                    @endif
                                @else
                                    <span class="btn2">Tingkatan Tidak Dikenali</span>
                                @endif


                            @endif
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endforeach

      @foreach($mandiris as $mandiri)
        <div class="row">
          <div class="col-md-3">
                <!--start modal-->
            <div class="modal" tabindex="-1"id="myModal2{{ $loop->iteration }}Proccess">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" >{{ $mandiri->posisi }}<br> {{ $mandiri->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="grid-container">
                          <div class="box">
                            <h2>Kontak Personal</h2>
                            <p>Email : {{ $mandiri->email }}</p>
                            <p>No. Telepon : {{ $mandiri->phone }}</p>
                            <p>NIK : {{ $mandiri->nik }}</p>
                            <p>NIM : {{ $mandiri->nim }}</p>
                            <p>Jurusan : {{ $mandiri->jurusan }}</p>
                            <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                          </div>
                          <div class="box">
                            <h2>Status Laporan Akhir</h2>
                            <p>Tenggat Pengumpulan :{{ $mandiri->waktu_selesai }}</p>
                            <p>Peserta belum mengumpulkan Laporan</p> 
                          </div>
                      </div>
                    </div>
                  </div>                
                </div>
            </div>
        </div>
    @endforeach
      @foreach($wawancaras as $wawancara)
        <div class="row">
          <div class="col-md-3">
                <!--start modal-->
            <div class="modal" tabindex="-1"id="myModal2{{ $loop->iteration }}Proccess">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" >{{ $wawancara->posisi }}<br> {{ $wawancara->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="grid-container">
                          <div class="box">
                            <h2>Kontak Personal</h2>
                            <p>Email : {{ $wawancara->email }}</p>
                            <p>No. Telepon : {{ $wawancara->phone }}</p>
                            <p>NIK : {{ $wawancara->nik }}</p>
                            <p>NIM : {{ $wawancara->nim }}</p>
                            <p>Jurusan : {{ $wawancara->jurusan }}</p>
                            <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                          </div>
                          <div class="box">
                            <h2>Status Laporan Akhir</h2>
                            <p>Tenggat Pengumpulan :{{ $wawancara->waktu_selesai }}</p>
                            <p>Peserta belum mengumpulkan Laporan</p> 
                          </div>
                      </div>
                    </div>
                  </div>                
                </div>
            </div>
        </div>
    @endforeach
             
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
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
  <!-- Bootstrap JS bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<!-- Script untuk menampilkan modal -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan modal forward
        $('[id^=showModalBtn]').click(function() {
            var id = $(this).attr('id').replace('showModalBtn', '');
            $('#myModal' + id).modal('show');
        });
        $('[id^=showModalBtn1]').click(function() {
            var id = $(this).attr('id').replace('showModalBtn1', '');
            $('#myModal1' + id).modal('show');
        });
        $('[id^=showModalBtn2]').click(function() {
            var id = $(this).attr('id').replace('showModalBtn2', '');
            $('#myModal2' + id).modal('show');
        });
        $('[id^=showModalTanggalBtn]').click(function() {
            var id = $(this).attr('id').replace('showModalTanggalBtn', '');
            $('#myModalTanggal' + id).modal('show');
        });
        $('[id^=showModalTanggalBtn1]').click(function() {
            var id = $(this).attr('id').replace('showModalTanggalBtn1', '');
            $('#myModalTanggal1' + id).modal('show');
        });
        $('[id^=showModalTanggalBtn2]').click(function() {
            var id = $(this).attr('id').replace('showModalTanggalBtn2', '');
            $('#myModalTanggal2' + id).modal('show');
        });

        $('[id^=showModalTolak]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak', '');
            $('#myModalTolak' + id).modal('show');
        });
        $('[id^=showModalTolak1]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak1', '');
            $('#myModalTolak1' + id).modal('show');
        });
        $('[id^=showModalTolak2]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak2', '');
            $('#myModalTolak2' + id).modal('show');
        });
   
        // Button click event handler
        $('.btn-show-modal').click(function() {
            // Get target modal id and status from data attributes
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            // Show the appropriate modal based on the status
            switch (status) {
                case 'Perubahan Tanggal':
                    $('#myModal' + targetModal + 'Perubahan-Tanggal').modal('show');
                    break;
                case 'Diteruskan ke Unit':
                    $('#myModal' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                case 'Perubahan Tanggal':
                    $('#myModal1' + targetModal + 'Perubahan-Tanggal').modal('show');
                    break;
                case 'Diteruskan ke Unit':
                    $('#myModal1' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal1' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                default:
                    console.error('Invalid status');
            }
        });
        $('.btn-show-modal1').click(function() {
            // Get target modal id and status from data attributes
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            // Show the appropriate modal based on the status
            switch (status) {
                case 'Perubahan Diajukan':
                    $('#myModal1' + targetModal + 'Perubahan-Diajukan').modal('show');
                    break;
                case 'Diteruskan ke Unit':
                    $('#myModal1' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal1' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                default:
                    console.error('Invalid status');
            }
        });
        $('.btn-show-modal2').click(function() {
            // Get target modal id and status from data attributes
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            // Show the appropriate modal based on the status
            switch (status) {
                case 'Perubahan Diajukan':
                    $('#myModal2' + targetModal + 'Perubahan-Diajukan').modal('show');
                    break;
                case 'sudah dikumpulkan':
                    $('#myModal2' + targetModal + 'sudah-dikumpulkan').modal('show');
                    break;
                case 'Pengajuan Diterima':
                    $('#myModal2' + targetModal + 'Pengajuan-Diterima').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal2' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                default:
                    console.error('Invalid status');
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Script untuk menangani permintaan Ajax -->
<script>
  $(document).ready(function() {
    $(".terima-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut

        // Permintaan Ajax untuk menerima pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('posisi.terima') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
            },
            success: function(response) {
                if (response.success) {
                    // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                    $(`#terima-btn-${id}`).text('Diterima');
                    // Menampilkan pesan sukses
                    alert("Pendaftaran berhasil diteruskan ke Admin");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menerima pendaftaran");
                }
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menerima pendaftaran");
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
    $(document).ready(function() {
        $(".terimaW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('posisi.terimaW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaW-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Pendaftaran berhasil diteruskan ke Admin");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima pendaftaran");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima pendaftaran");
                }
            });
        });
        // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
        $(".terimaW-btn, .tolakW-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".terimaK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('posisi.terimaK') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaK-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Pendaftaran berhasil Diterima");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima pendaftaran");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima pendaftaran");
                }
            });
        });
        // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
        $(".terimaK-btn, .tolakK-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
  $(document).ready(function() {
    $(".ajukan-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var waktuMulai = $("#waktu_mulai").val();
        var waktuSelesai = $("#waktu_selesai").val();

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukan') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                waktu_mulai: waktuMulai,
                waktu_selesai: waktuSelesai
            },
            success: function(response) {
                if (response.success) {
                    // Mengubah teks tombol yang sesuai
                    $(this).text('Diajukan');
                    alert("Perubahan tanggal berhasil diajukan ke Peserta");
                } else {
                    alert("Gagal mengajukan perubahan");
                }
            }.bind(this), // Menambahkan bind(this) agar 'this' mengacu pada tombol yang benar
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengajukan perubahan");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".ajukan-btn").click(function() {
            location.reload();
        });
});
</script>


<script>
  $(document).ready(function() {
    $(".ajukanW-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var waktuMulai = $("#waktu_mulai").val();
        var waktuSelesai = $("#waktu_selesai").val();

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukanW') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                waktu_mulai: waktuMulai,
                waktu_selesai: waktuSelesai
            },
            success: function(response) {
                if (response.success) {
                    // Mengubah teks tombol yang sesuai
                    $(this).text('Diajukan');
                    alert("Perubahan tanggal berhasil diajukan ke Peserta");
                } else {
                    alert("Gagal mengajukan perubahan");
                }
            }.bind(this), // Menambahkan bind(this) agar 'this' mengacu pada tombol yang benar
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengajukan perubahan");
            }
        });
    });
    $(".ajukanW-btn").click(function() {
            location.reload();
        });
});
</script>

<script>
  $(document).ready(function() {
    $(".ajukanK-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var waktuMulai = $("#waktu_mulai").val();
        var waktuSelesai = $("#waktu_selesai").val();

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukanK') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                waktu_mulai: waktuMulai,
                waktu_selesai: waktuSelesai
            },
            success: function(response) {
                if (response.success) {
                    // Mengubah teks tombol yang sesuai
                    $(this).text('Diajukan');
                    alert("Perubahan tanggal berhasil diajukan ke Peserta");
                } else {
                    alert("Gagal mengajukan perubahan");
                }
            }.bind(this), // Menambahkan bind(this) agar 'this' mengacu pada tombol yang benar
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengajukan perubahan");
            }
        });
    });
    $(".ajukanK-btn").click(function() {
            location.reload();
        });
});
</script>


<script>
$(document).on("click", ".tolak-btn", function(e) {
    e.preventDefault();
    var id = $(this).data('id'); // Mengambil data-id sebagai atribut
    var btn = $(this); // Menyimpan konteks tombol

    // Permintaan Ajax untuk menolak pendaftaran
    $.ajax({
        type: "POST",
        url: "{{ route('posisi.tolak') }}",
        data: {
            _token: "{{ csrf_token() }}",
            id: id // Menggunakan id sebagai atribut
        },
        success: function(response) {
            if (response.success) {
                // Mengubah teks tombol menjadi "Pengajuan Ditolak" setelah berhasil
                btn.text('Pengajuan Ditolak').prop('disabled', true);
                // Menampilkan pesan sukses
                alert("Pendaftaran berhasil ditolak");
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
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terima-btn, .tolak-btn").click(function() {
            location.reload();
        });
});

</script>
<script>
$(document).on("click", ".tolakW-btn", function(e) {
  e.preventDefault();
    var id = $(this).data('id'); // Mengambil data-id sebagai atribut
    var btn = $(this); // Menyimpan konteks tombol

    // Permintaan Ajax untuk menolak pendaftaran
    $.ajax({
        type: "POST",
        url: "{{ route('posisi.tolakW') }}",
        data: {
            _token: "{{ csrf_token() }}",
            id: id // Menggunakan id sebagai atribut
        },
        success: function(response) {
            if (response.success) {
                // Mengubah teks tombol menjadi "Pengajuan Ditolak" setelah berhasil
                btn.text('Pengajuan Ditolak').prop('disabled', true);
                // Menampilkan pesan sukses
                alert("Pendaftaran berhasil ditolak");
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
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terimaW-btn, .tolakW-btn").click(function() {
            location.reload();
        });
});
</script>

<script>
  $(document).ready(function() {
    $(".tolakK-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('posisi.tolakK') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
            if (response.success) {
                // Mengubah teks tombol menjadi "Pengajuan Ditolak" setelah berhasil
                btn.text('Pengajuan Ditolak').prop('disabled', true);
                // Menampilkan pesan sukses
                alert("Pendaftaran berhasil ditolak");
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
    $(".terimaK-btn, .tolakK-btn").click(function() {
            location.reload();
        });
});
</script>

{{-- Tanggal --}}
<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Mendaftarkan event listener untuk input waktu mulai
                document.querySelector('input[name="waktu_mulai"]').addEventListener("change", function() {
                    // Mengambil nilai tanggal dari input waktu mulai
                    var waktuMulai = new Date(this.value);
                    
                    // Mengubah nilai minimal input waktu selesai menjadi lebih besar dari waktu mulai yang dipilih
                    document.querySelector('input[name="waktu_selesai"]').min = waktuMulai.toISOString().slice(0,10);
                });
            });
            </script>
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
</script>
  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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