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
  <!-- Scripts -->
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
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead >
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
                      <th>
                        Waktu PKL/Magang
                      </th>
                      <th class="text-center">
                        Berkas
                      </th>
                </thead>
                  <!-- POP UP for $wawancaras -->
                 <!-- POP UP for $wawancaras -->
                 @foreach($wawancaras as $wawancara)
                    <div class="user-data" data-user_id="{{ $wawancara->user_id }}">
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $wawancara->name }}</td>
                                <td>{{ $wawancara->jurusan }}</td>
                                <td>{{ $wawancara->universitas_sekolah }}</td>
                                <td>{{ $wawancara->tanggal }}</td>
                                <td class="text-right">
                                    <button class="btn btn-primary btn-round showModalBtn1" data-bs-toggle="modal" data-bs-target="#myModal1{{ $loop->iteration }}">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                  @endforeach

                    <!--modal utama mandiri-->
                    @foreach($wawancaras as $wawancara)
                      <div div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $wawancara->jurusan }} <br> {{ $wawancara->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="grid-container">
                                            <div class="box">
                                              <h2>Kontak Personal</h2>
                                              <p>Email : {{ $wawancara->email }} </p>
                                              <p>No. Telepon : {{ $wawancara->phone }} </p>
                                              <p>NIK : {{ $wawancara->nik }} </p>
                                              <p>NIM : {{ $wawancara->nim }} </p>
                                            </div>
                                            <div class="box">
                                              <h2>Informasi Asal Instansi</h2>
                                              <p>Tingkatan : {{ $wawancara->tingkatan}}</p>
                                              <p>Universitas/Sekolah : {{ $wawancara->universitas_sekolah }}</p>
                                              {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah}}</p> --}}
                                              <p>Jurusan : {{ $wawancara->jurusan }}</p>
                                            </div>
                                            <div class="box">
                                              <h2>Informasi Penelitian</h2>
                                              <p>Judul Penelitian: {{ $wawancara->judul_penelitian}}</p>
                                            </div>
                                            <div class="box">
                                              <h2>Informasi Pendukung </h2>
                                              <p>Waktu  Mulai s.d Selesai : {{ $wawancara->tanggal }}</p>
                                              <div class="box">
                                              <h2>Informasi Pendukung </h2>
                                              <p>Waktu  Mulai s.d Selesai : {{ $wawancara->tanggal }}</p>
                                              <p>Pakta Integritas :<a href="{{ route('file.download', ['filename' => $wawancara->pkt_integritas]) }}">Unduh Pakta Integritas</a></p>
                                              <p>Surat Pendukung : <a href="{{ route('file.download', ['filename' => $wawancara->surat_pendukung]) }}">Unduh Surat Pendukung</a> </p>
                                              <p>Proposal : <a href="{{ route('file.download', ['filename' => $wawancara->proposal]) }}">Undu Proposal</a> </p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak1{{ $loop->iteration }}">Tolak</button>
                                        <button type="button" class="btn2" data-bs-toggle="modal" id="showModalForward1{{ $loop->iteration }}">Pilih Unit Kerja</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- start modal -->
                        <div class="modal text-center" tabindex="-1" id="myModalTolak1{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title ">Penolakan Pendaftar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                    <box class="box">
                                        <h2 class="m-2">Berikan Keterangan mengapa Peserta Tidak Diterima</h2>
                                        <img src="../assets/img/Error.png" alt="">
                                        <div class="form-group m-3">
                                            <label>keterangan</label>
                                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                                        </div>
                                    </box>
                                    <div class="modal-footer">
                                    <button class="tolakW-btn" data-id="{{ $wawancara->id }}">Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                        <!--start modal forward-->
                          <div class="modal" id="myModalForward1{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $wawancara->jurusan }} <br> {{ $wawancara->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <box class="box">
                                        <h2>Kirimkan Ke Unit Kerja</h2>
                                        <p>Perhatikan keselarasan bidang peserta <br> dengan kebutuhan unit kerja</p>
                                        <div class="form-group">
                                            <label for="unit_kerja">Unit Kerja</label><br>
                                            <select id="select2insidemodal1{{ $loop->iteration }}" multiple="multiple" name="unit" class="unit1">
                                                <option></option>
                                                @foreach ($data as $row)
                                                <option value="{{$row->nama_unit}}">{{$row->nama_unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </box>
                                    <div class="modal-footer">
                                    <button class="terimaW-btn" data-id="{{ $wawancara->id }}">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    @endforeach
    
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
    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
   

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
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

      <!-- Script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function() {
        $('[id^=showModalForward1]').click(function() {
            var id = $(this).attr('id').replace('showModalForward1', '');
            $('#myModalForward1' + id).modal('show');
        });
        $('[id^=showModalTolak1]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak1', '');
            $('#myModalTolak1' + id).modal('show');
        });
        // Inisialisasi Select2 saat modal ditampilkan
        $('[id^=myModalForward1]').on('shown.bs.modal', function() {
            var id = $(this).attr('id').replace('myModalForward1', '');
            $('#select2insidemodal1' + id).select2({
                dropdownParent: $(this)
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Script untuk menangani permintaan Ajax -->
<script>
    $(document).ready(function() {
        $(".terimaW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut
            var units = $('.unit1').val(); // Mengambil nilai dari dropdown Select2

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('penelitian.terimaW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                    unit: units // Menggunakan nilai unit dari dropdown Select2
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terima-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Pendaftaran berhasil diteruskan ke Unit");
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
        $(".terimaW-btn, .tolakW-btn").click(function() {
            location.reload();
        });
    });
</script>

<script>
  $(document).ready(function() {
    $(".tolakW-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('penelitian.tolakW') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
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
    $(".terimaW-btn, .tolakW-btn").click(function() {
            location.reload();
        });
});

</script>
<script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
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
    {{-- JS Jumper --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>