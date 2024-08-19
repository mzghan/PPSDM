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
          <li class="active">
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
                    <h3>Daftar Posisi Pendaftar Peserta PKL/Magang</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pendaftaran Posisi Magang</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No.
                      </th>
                      <th>
                        Nama Peserta
                      </th>
                      <th>
                        Asal Universitas/Sekolah
                      </th>
                      <th>
                        Jurusan/Posisi
                      </th>
                      <th>
                        Status Prosses
                      </th>
                      <th class="text-center">
                        Detail Pendaftar
                      </th>
                    </thead>
                    <tbody>
                      {{-- Posting --}}
                      @php
                      // Mengambil data unik berdasarkan posisi dan jenis dari $postings
                      $uniquePostings = $postings->unique(function ($item) {
                          return $item->posisi . $item->jenis;
                      });
                  @endphp
                  
                  @foreach($postings as $posting)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $posting->name }}</td>
                      <td>{{ $posting->universitas_sekolah }}</td>
                      <td>{{ $posting->posisi }}</td>
                      <td><div class="status">
                                @if($posting->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @else
                                    <p class="development2">{{ $posting->status }}</p>
                                @endif</td>
                      <td class="text-center">
                          <form action="{{ route('posisi.set', ['id' => $posting->id]) }}" method="GET">
                              @csrf
                              <button type="button" class="btn btn-primary btn-round btn-show-modal2" data-target="{{ $loop->iteration }}" data-status="{{ $posting->status }}" data-posisi="{{ $posting->posisi }}" data-jenis="{{ $posting->jenis }}">Lihat Berkas</button>
                          </form>
                      </td>
                  </tr>
                  @endforeach

                    {{-- Mandiri --}}
                      @foreach($mandiris->groupBy('jenis') as $jenis => $mandirisByJenis)
                        @foreach($mandirisByJenis as $mandiri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mandiri->name }}</td>
                                <td>{{ $mandiri->universitas_sekolah }}</td>
                                <td>{{ $mandiri->jurusan }}</td>
                                <td><div class="status">
                                @if($mandiri->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @else
                                    <p class="development2">{{ $mandiri->status }}</p>
                                @endif</td>
                                <td class="text-center">
                                    <form action="{{ route('posisiM.set', ['id' => $mandiri->id]) }}" method="GET">
                                        @csrf
                                        <button type="button" class="btn btn-primary btn-round btn-show-modal" data-target="{{ $loop->iteration }}" data-status="{{ $mandiri->status }}">Lihat Berkas</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach



                    {{-- Wawancara --}}
                    @php
                    $uniqueWawancaras = $wawancaras->unique(function ($item) {
                        return $item->posisi . $item->jenis;
                    });
                    @endphp
                    @foreach($uniqueWawancaras as $wawancara)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $wawancara->name }}</td>
                        <td>{{ $wawancara->jurusan }}</td>
                        <td>{{ $wawancara->universitas_sekolah }}</td>
                        <td class="text-center">
                          <form action="{{ route('posisiW.set', ['id' => $wawancara->id]) }}" method="GET">
                                @csrf
                                <button type="button" class="btn btn-primary btn-round btn-show-modal1" data-target="{{ $loop->iteration }}" data-status="{{ $wawancara->status }}">Lihat Berkas</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                      {{-- @foreach($mandiris as $mandiri)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $mandiri->name }}</td>
                          <td>{{ $mandiri->jurusan }}</td>
                          <td>{{  $mandiri->universitas_sekolah }}</td>
                          <td class="text-center">
                            <div class="row">
                              <div class="update ml-auto mr-auto">
                                <button type="button" class="btn btn-primary btn-round btn-show-modal" data-target="{{ $loop->iteration }}" data-status="{{ $mandiri->status }}">Lihat Berkas</button>
                              </div>
                            </div>
                          </td>
                          </td>
                      </tr>
                      @endforeach

                      @foreach($wawancaras as $wawancara)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $wawancara->name }}</td>
                          <td>{{ $wawancara->jurusan }}</td>
                          <td>{{  $wawancara->universitas_sekolah }}</td>
                          <td class="text-center">
                            <div class="row">
                              <div class="update ml-auto mr-auto">
                                <button type="button" class="btn btn-primary btn-round btn-show-modal1" data-target="{{ $loop->iteration }}" data-status="{{ $wawancara->status }}">Lihat Berkas</button>
                              </div>
                            </div>
                          </td>
                          </td>
                      </tr>
                      @endforeach
                       --}}
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
      @foreach($postings as $posting)
      <div class="row">
        <div class="col-md-3">
              <!--start modal-->
        <div class="modal" tabindex="-1"id="myModal2{{ $loop->iteration }}Proccess">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" >{{ $posting->posisi }}<br> {{ $posting->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="grid-container">
                      <div class="box">
                        <h2>Kontak Personal</h2>
                        <p>Email : {{ $posting->email }}</p>
                        <p>No. Telepon : {{ $posting->phone }}</p>
                        <p>NIK : {{ $posting->nik }}</p>
                        <p>NIM : {{ $posting->nim }}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $posting->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $posting->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $posting->jurusan }}</p>
                      </div>
                      <div class="box" style="height: 200px; overflow-x:hidden; overflow-y: auto;">
                          <h2>Informasi Diri</h2>
                          <p> <strong>Tujuan Magang</strong>  :<br> {{ $posting->tujuan_magang}}</p> <br>
                          <p> <strong>Ilmu yang dicari</strong> : <br> {{ $posting->ilmu_yang_dicari}}</p> <br>
                          <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $posting->output_setelah_magang}}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Pendukung </h2>
                        <p>Waktu  Mulai s.d Selesai : 
                        <br>
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
                        </p>
                        <p>Surat Pendukung : <a href="{{ route('file.download', ['filename' => $posting->surat_pendukung]) }}">Unduh Surat Pendukung</a> </p>
                              <p>Proposal : <a href="{{ route('file.download', ['filename' => $posting->proposal]) }}">Unduh Proposal</a> </p>
                      </div>
                    </div>
                  </div>                
              <div class="modal-footer">
                <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak2{{ $loop->iteration }}">Tolak</button>
                <button class="terimaK-btn" data-id="{{ $posting->id }}">Diteruskan ke Admin</button>
                {{-- <button type="button" class="btn3" data-bs-dismiss="modal" id="showModalTanggalBtn2">Ajukan Perubahan Jadwal</button> --}}
              </div>
            </div>
          </div>
          <!--end modal-->
        </div>
        
        <!-- start modal -->
        <div class="modal text-center" tabindex="-1" id="myModalTolak2{{ $loop->iteration }}">
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
                    <button class="tolakK-btn" data-id="{{ $posting->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
  </div>
   <!-- Modal untuk situasi "Perubahan Diterima" -->
   <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" >{{ $posting->posisi }}<br> {{ $posting->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="grid-container">
                      <div class="box">
                        <h2>Kontak Personal</h2>
                        <p>Email : {{ $posting->email }}</p>
                        <p>No. Telepon : {{ $posting->phone }}</p>
                        <p>NIK : {{ $posting->nik }}</p>
                        <p>NIM : {{ $posting->nim }}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $posting->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $posting->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $posting->jurusan }}</p>
                      </div>
                      <div class="box">
                        <h2>Status Perubahan Jadwal</h2>
                        <p>Periode Magang menjadi :
                        <br>
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
                        </p>
                        <p >Tanggapan Peserta : <strong class="text-success">{{ $posting->status }}</strong></p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak2{{ $loop->iteration }}">Tolak</button>
                    <button class="terimaK-btn" data-id="{{ $posting->id }}">Diteruskan ke Admin</button>
                  </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan-Tanggal" -->
          <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Perubahan-Tanggal">
              <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >{{ $posting->posisi }}<br> {{ $posting->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="grid-container">
                  <div class="box">
                    <h2>Kontak Personal</h2>
                    <p>Email : {{ $posting->email }}</p>
                    <p>No. Telepon : {{ $posting->phone }}</p>
                    <p>NIK : {{ $posting->nik }}</p>
                    <p>NIM : {{ $posting->nim }}</p>
                  </div>
                  <div class="box">
                    <h2>Informasi Asal Universitas/Sekolah</h2>
                    <p>Tingkatan : {{ $posting->tingkatan }}</p>
                    <p>Universitas/Sekolah :{{ $posting->universitas_sekolah }}</p>
                    {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah }}</p> --}}
                    <p>Jurusan : {{ $posting->jurusan }}</p>

                  </div>
                  <div class="box" style="height: 200px; overflow-x:hidden; overflow-y: auto;">
                      <h2>Informasi Diri</h2>
                      <p> <strong>Tujuan Magang</strong>  :<br> {{ $posting->tujuan_magang}}</p> <br>
                      <p> <strong>Ilmu yang dicari</strong> : <br> {{ $posting->ilmu_yang_dicari}}</p> <br>
                      <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $posting->output_setelah_magang}}</p>
                  </div>
                  <div class="box">
                    <h2>Status Perubahan Jadwal</h2>
                    <p>Periode Magang Diajukan menjadi : 
                    <br>
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
                    </p>
                    <p> <strong>Menunggu Tanggapan Peserta</strong></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal untuk situasi "mengundurkan diri" -->
        <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}mengundurkan-diri">
             <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" >{{ $posting->posisi }}<br> {{ $posting->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="grid-container">
                      <div class="box">
                        <h2>Kontak Personal</h2>
                        <p>Email : {{ $posting->email }}</p>
                        <p>No. Telepon : {{ $posting->phone }}</p>
                        <p>NIK : {{ $posting->nik }}</p>
                        <p>NIM : {{ $posting->nim }}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $posting->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $posting->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $posting->jurusan }}</p>
                      </div>
                      <div class="box" style="height: 200px; overflow-y: auto;">
                          <h2>Informasi Diri</h2>
                          <p> <strong>Tujuan Magang</strong>  :<br> {{ $posting->tujuan_magang}}</p> <br>
                          <p> <strong>Ilmu yang dicari</strong> : <br> {{ $posting->ilmu_yang_dicari}}</p> <br>
                          <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $posting->output_setelah_magang}}</p>
                      </div>
                      <div class="box">
                      <h2>Status Seleksi</h2>
                        <h2  class="text-danger">{{$posting->status}}</h2>
                        <p>Alasan : {{$posting->keterangan}} </p>
                      </div>
                      <div class="modal-footer">
                          <button class="konfirmasiK-btn" data-id="{{ $posting->id }}">Konfirmasi</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


                    <!--Modal ubah tanggal-->
                    <div class="modal" tabindex="-1"id="myModalTanggal2">
                        <div class="modal-dialog overflow-auto">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" >{{ $posting->posisi }}<br> {{ $posting->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="grid-container">
                                  <div class="box">
                                    <h2>Kontak Personal</h2>
                                    <p>Email : {{ $posting->email }}</p>
                                    <p>No. Telepon : {{ $posting->phone }}</p>
                                    <p>NIK : {{ $posting->nik }}</p>
                                    <p>NIM : {{ $posting->nim }}</p>
                                  </div>
                                  <div class="box">
                                    <h2>Informasi Asal Universitas/Sekolah</h2>
                                    <p>Tingkatan : {{ $posting->tingkatan }}</p>
                                    <p>Universitas/Sekolah :{{ $posting->universitas_sekolah }}</p>
                                    {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah }}</p> --}}
                                    <p>Jurusan : {{ $posting->jurusan }}</p>
                                  </div>
                                  <div class="box">
                                      <h2>Waktu yang diajukan Pendaftar</h2>
                                      <p>Waktu Mulai s.d Selesai: 
                                      <br>
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
                                     </p>
                                  </div>
                                  <div class="box">
                                      <h2>Waktu yang diajukan Unit Kerja</h2>
                                      <p>Waktu Mulai s.d Selesai: <input type="text" id="tanggal" name="tanggal" class="magang" required/></p>    
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button class="ajukanK-btn" data-id="{{ $posting->id }}">Ajukan Perubahan</button>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!--end modal ubah tanggal-->
            </div>
              </div>
          </div>
      @endforeach

      <!--start content-->
      @foreach($mandiris as $mandiri)
      <div class="row">
      <div class="col-md-3">
          <!--start modal-->
        <div class="modal" tabindex="-1"id="myModal{{ $loop->iteration }}Diteruskan-ke-Unit">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" >{{ $mandiri->jurusan }}<br> {{ $mandiri->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="grid-container">
                        <div class="box">
                            <h2>Kontak Personal</h2>
                            <p>Email : {{ $mandiri->email }} </p>
                            <p>No. Telepon : {{ $mandiri->phone }} </p>
                            <p>NIK : {{ $mandiri->nik }} </p>
                            <p>NIM : {{ $mandiri->nim }} </p>
                        </div>
                        <div class="box">
                            <h2>Informasi Asal Universitas/Sekolah</h2>
                            <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                            <p>Universitas/Sekolah : {{ $mandiri->universitas_sekolah }}</p>
                            {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah}}</p> --}}
                            <p>Jurusan : {{ $mandiri->jurusan }}</p>
                        </div>
                        <div class="box" style="height: 270px; overflow-x:hidden; overflow-y: auto;">
                            <h2>Informasi Diri</h2>
                            <p> <strong>Tujuan Magang</strong>  :<br> {{ $mandiri->tujuan_magang}}</p> <br>
                            <p> <strong>Ilmu yang dicari</strong> : <br> {{ $mandiri->ilmu_yang_dicari}}</p> <br>
                            <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $mandiri->output_setelah_magang}}</p>
                        </div>
                        <div class="box" style="width: 950px;">
                            <h2>Informasi Pendukung </h2>
                            <p>Unit Kerja dipilih : {{ str_replace(['[' , ']' , '"'], '', $mandiri->unit_kerja) }}</p>
                            <p>Waktu  Mulai s.d Selesai : <br>
                              @php
                                  // Pisahkan tanggal mulai dan tanggal selesai
                                  list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $mandiri->durasi);

                                  // Konversi tanggal mulai ke format Indonesia
                                  Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                  $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                  // Konversi tanggal selesai ke format Indonesia
                                  $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                  // Tampilkan hasil
                                  echo "$tanggal_mulai - $tanggal_selesai";
                              @endphp
                              </p>
                              <p>Surat Pendukung : <a href="{{ route('file.download', ['filename' => $mandiri->surat_pendukung]) }}">Unduh Surat Pendukung</a> </p>
                              <p>Proposal : <a href="{{ route('file.download', ['filename' => $mandiri->proposal]) }}">Unduh Proposal</a> </p>
                        </div>
                    </div>
                </div>        
              <div class="modal-footer">
                <button class="tolak-btn" data-id="{{ $mandiri->id }}">Tolak</button>
                <button class="terima-btn" data-id="{{ $mandiri->id }}">Diteruskan ke Admin</button>
                <button type="button" class="btn3" data-bs-dismiss="modal" id="showModalTanggalBtn">Ajukan Perubahan Jadwal</button>
              </div>
            </div>
          </div>
          <!--end modal-->
        </div>
    </div>
  </div>
   <!-- Modal untuk situasi "Perubahan Diterima" -->
   <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" >{{ $mandiri->jurusan }}<br> {{ $mandiri->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $mandiri->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $mandiri->jurusan }}</p>
                      </div>
                      <div class="box">
                        <h2>Status Perubahan Jadwal</h2>
                        <p>Periode Magang menjadi : 
                        <br>
                              @php
                                  // Pisahkan tanggal mulai dan tanggal selesai
                                  list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $mandiri->durasi);

                                  // Konversi tanggal mulai ke format Indonesia
                                  Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                  $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                  // Konversi tanggal selesai ke format Indonesia
                                  $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                  // Tampilkan hasil
                                  echo "$tanggal_mulai - $tanggal_selesai";
                              @endphp
                        </p>
                        <p >Tanggapan Peserta : <strong class="text-success">{{ $mandiri->status }}</strong></p>
                      </div>
                      <div class="modal-footer">
                        <button class="tolak-btn" data-id="{{ $mandiri->id }}">Tolak</button>
                        <button class="terima-btn" data-id="{{ $mandiri->id }}">Diteruskan ke Admin</button>
                      </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan-Tanggal" -->
            <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Tanggal">
             <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" >{{ $mandiri->jurusan }}<br> {{ $mandiri->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $mandiri->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $mandiri->jurusan }}</p>
                      </div>
                      <div class="box" style="height: 200px; overflow-y: auto;">
                          <h2>Informasi Diri</h2>
                          <p> <strong>Tujuan Magang</strong>  :<br> {{ $mandiri->tujuan_magang}}</p> <br>
                          <p> <strong>Ilmu yang dicari</strong> : <br> {{ $mandiri->ilmu_yang_dicari}}</p> <br>
                          <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $mandiri->output_setelah_magang}}</p>
                      </div>
                      <div class="box">
                        <h2>Status Perubahan Jadwal</h2>
                        <p>Periode Magang Diajukan menjadi : 
                        @php
                          // Pisahkan tanggal mulai dan tanggal selesai
                          list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $mandiri->durasi);

                          // Konversi tanggal mulai ke format Indonesia
                          Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                          $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                          // Konversi tanggal selesai ke format Indonesia
                          $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                          // Tampilkan hasil
                          echo "$tanggal_mulai - $tanggal_selesai";
                      @endphp
                        </p>
                        <p class="color-red"> <strong>Menunggu Tanggapan Peserta</strong></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    <!-- Modal untuk situasi "mengundurkan diri" -->
            <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}mengundurkan-diri">
             <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" >{{ $mandiri->jurusan }}<br> {{ $mandiri->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $mandiri->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $mandiri->jurusan }}</p>
                      </div>
                      <div class="box" style="height: 200px; overflow-y: auto;">
                          <h2>Informasi Diri</h2>
                          <p> <strong>Tujuan Magang</strong>  :<br> {{ $mandiri->tujuan_magang}}</p> <br>
                          <p> <strong>Ilmu yang dicari</strong> : <br> {{ $mandiri->ilmu_yang_dicari}}</p> <br>
                          <p><strong>Target Perkembangan diri setelah magang</strong> : <br>{{ $mandiri->output_setelah_magang}}</p>
                      </div>
                      <div class="box">
                      <h2>Status Seleksi</h2>
                        <h2  class="text-danger">{{$mandiri->status}}</h2>
                        <p>Alasan : {{$mandiri->keterangan}} </p>
                      </div>
                      <div class="modal-footer">
                          <button class="konfirmasi-btn" data-id="{{ $mandiri->id }}">Konfirmasi</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                    <!--Modal ubah tanggal-->
                    <div class="modal" tabindex="-1"id="myModalTanggal">
                        <div class="modal-dialog overflow-auto">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" >{{ $mandiri->jurusan }}<br> {{ $mandiri->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="grid-container">
                                  <box class="box">
                                    <h2>Kontak Personal</h2>
                                    <p>Email : {{ $mandiri->email }}</p>
                                    <p>No. Telepon : {{ $mandiri->phone }}</p>
                                    <p>NIK : {{ $mandiri->nik }}</p>
                                    <p>NIM : {{ $mandiri->nim }}</p>
                                  </box>
                                  <box class="box">
                                    <h2>Informasi Asal Universitas/Sekolah</h2>
                                    <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                                    <p>Universitas/Sekolah :{{ $mandiri->universitas_sekolah }}</p>
                                    {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah }}</p> --}}
                                    <p>Jurusan : {{ $mandiri->jurusan }}</p>
                                  </box>
                                  <box class="box">
                                      <h2>Waktu yang diajukan Pendaftar</h2>
                                      <p>Waktu Mulai s.d Selesai: 
                                      <br>
                                        @php
                                            // Pisahkan tanggal mulai dan tanggal selesai
                                            list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $mandiri->durasi);

                                            // Konversi tanggal mulai ke format Indonesia
                                            Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                            $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                            // Konversi tanggal selesai ke format Indonesia
                                            $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                            // Tampilkan hasil
                                            echo "$tanggal_mulai - $tanggal_selesai";
                                        @endphp
                                      </p>
                                  </box>
                                  <box class="box">
                                      <h2>Waktu yang diajukan Unit Kerja</h2>
                                      <p>Waktu Mulai s.d Selesai:<input type="text" id="durasi" name="durasi" class="magang" required/></p>    
                                  </box>
                                  <div class="modal-footer">
                                      <button class="ajukan-btn" data-id="{{ $mandiri->id }}">Ajukan Perubahan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              <!--end modal ubah tanggal-->
                  </div>
              </div>
          </div>
      @endforeach
      <!--start content-->
      @foreach($wawancaras as $wawancara)
      <div class="row">
      <div class="col-md-3">
        <div class="modal" tabindex="-1"id="myModal1{{ $loop->iteration }}Diteruskan-ke-Unit">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" >{{ $wawancara->jurusan }}<br> {{ $wawancara->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $wawancara->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $wawancara->jurusan }}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Penelitian</h2>
                        <p>Judul Penelitian: {{ $wawancara->judul_penelitian}}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Pendukung </h2>
                        <p>Waktu  Mulai s.d Selesai : {{ $wawancara->tanggal }}</p>
                        <p>Pakta Integritas :<button class="download-button" onclick="downloadFile('surat_pendukung')">Unduh Pakta Integritas</button></p>
                        <p>Surat Pendukung :<button class="download-button" onclick="downloadFile('surat_pendukung')">Unduh Surat Pendukung</button></p>
                        <p>Proposal : <button class="download-button" onclick="downloadFile('proposal')">Unduh Proposal</button> </p>
                      </div>  
                    </div>
                  </div>              
              <div class="modal-footer">
                <button class="tolakW-btn" data-id="{{ $wawancara->id }}">Tolak</button>
                <button class="terimaW-btn" data-id="{{ $wawancara->id }}">Diteruskan ke Admin</button>
                <button type="button" class="btn3" data-bs-dismiss="modal" id="showModalTanggalBtn1">Ajukan Perubahan Jadwal</button>
              </div>
            </div>
          </div>
          <!--end modal-->
        </div>
    </div>
  </div>
   <!-- Modal untuk situasi "Perubahan Diterima" -->
   <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" >{{ $wawancara->jurusan }}<br> {{ $wawancara->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $wawancara->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $wawancara->jurusan }}</p>
                      </div>
                      <div class="box">
                        <h2>Status Perubahan Jadwal</h2>
                        <p>Periode Magang menjadi : {{ $wawancara->tanggal }} </p>
                        <p >Tanggapan Peserta : <strong class="text-success">{{ $wawancara->status }}</strong></p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="tolakW-btn" data-id="{{ $wawancara->id }}">Tolak</button>
                    <button class="terimaW-btn" data-id="{{ $wawancara->id }}">Diteruskan ke Admin</button>
                  </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan-Tanggal" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Perubahan-Tanggal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" >{{ $wawancara->jurusan }}<br> {{ $wawancara->name }}</h5>
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
                      </div>
                      <div class="box">
                        <h2>Informasi Asal Universitas/Sekolah</h2>
                        <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                        <p>Universitas/Sekolah :{{ $wawancara->universitas_sekolah }}</p>
                        {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah }}</p> --}}
                        <p>Jurusan : {{ $wawancara->jurusan }}</p>
                      </div>
                      <div class="box">
                        <h2>Informasi Diri</h2>
                        <p>Tujuan Magang : {{ $wawancara->tujuan_magang }}</p>
                        <p>Ilmu yang dicari : {{ $wawancara->ilmu_yang_dicari }}</p>
                        <p>Target Perkembangan diri setelah magang : {{ $wawancara->output_setelah_magang }}</p>
                      </div>
                    </box>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalBtn2">Tolak</button>
                    <button class="terimaajuanW-btn" data-id="{{ $wawancara->id }}">Diteruskan ke Admin</button>
                </div>
            </div>
        </div>
    </div>
                    <!--Modal ubah tanggal-->
                    <div class="modal" tabindex="-1"id="myModalTanggal1">
                        <div class="modal-dialog overflow-auto">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" >{{ $wawancara->jurusan }}<br> {{ $wawancara->name }}</h5>
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
                                  </div>
                                  <div class="box">
                                    <h2>Informasi Asal Universitas/Sekolah</h2>
                                    <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                                    <p>Universitas/Sekolah :{{ $wawancara->universitas_sekolah }}</p>
                                    {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah }}</p> --}}
                                    <p>Jurusan : {{ $wawancara->jurusan }}</p>
                                  </div>
                                  <div class="box">
                                      <h2>Waktu yang diajukan Pendaftar</h2>
                                      <p>Waktu Mulai s.d Selesai: {{ $wawancara->tanggal }}</p>
                                  </div>
                                  <div class="box">
                                      <h2>Waktu yang diajukan Unit Kerja</h2>
                                      <p>Waktu Mulai s.d Selesai: <input type="text" id="tanggal" name="tanggal" class="magang" required/></p>    
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button class="ajukanW-btn" data-id="{{ $wawancara->id }}">Ajukan Perubahan</button>
                              </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <!--end modal ubah tanggal-->
            </div>
              </div>
          </div>
      @endforeach
             </table>
    </div>
    </div>
  </div>
  <footer class="footer footer-black  footer-white">
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
                    $('#myModal' + targetModal + 'Perubahan-Tanggal').modal('show');
                    break;
                case 'Diteruskan ke Unit':
                    $('#myModal' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                case 'mengundurkan diri':
                    $('#myModal' + targetModal + 'mengundurkan-diri').modal('show'); 
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
                case 'Proccess':
                    $('#myModal2' + targetModal + 'Proccess').modal('show');
                    break;
                case 'Pengajuan Diterima':
                    $('#myModal2' + targetModal + 'Pengajuan-Diterima').modal('show'); 
                    break;
                case 'Perubahan Diterima':
                    $('#myModal2' + targetModal + 'Perubahan-Diterima').modal('show'); 
                    break;
                case 'mengundurkan diri':
                    $('#myModal2' + targetModal + 'mengundurkan-diri').modal('show'); 
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

});
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terimaK-btn, .tolakK-btn").click(function() {
        // Merefresh halaman
        location.reload();
        // Mengarahkan ke halaman ./seleksi setelah halaman direfresh
        window.location.href = './dashboard';
    });
</script>
{{-- Ajukan tanggal --}}
<script>
$(document).ready(function() {
    // Fungsi untuk ajukan tanggal
    $(".ajukan-btn").click(function(e) {
        e.preventDefault();
        var btn = $(this); // Simpan konteks tombol yang diklik

        var id = btn.data('id');
        var durasi = btn.closest('.modal-content').find('input[name="durasi"]').val(); // Temukan input durasi yang berada di dalam modal yang sama dengan tombol yang diklik

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukan') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                durasi: durasi
            },
            success: function(response) {
                if (response.success) {
                    // Mengubah teks tombol yang sesuai
                    btn.text('Diajukan');
                    alert("Perubahan tanggal berhasil diajukan ke Peserta");
                } else {
                    alert("Gagal mengajukan perubahan");
                }
            },
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
        $(".konfirmasi-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('posisi.konfirmasi') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#konfirmasi-btn-${id}`).text('Dikonfirmasi');
                        // Menampilkan pesan sukses
                        alert("Konfirmasi Diterima");
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
        $(".konfirmasi-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".konfirmasiK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('posisi.konfirmasiK') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#konfirmasiK-btn-${id}`).text('Dikonfirmasi');
                        // Menampilkan pesan sukses
                        alert("Konfirmasi Diterima");
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
        $(".konfirmasiK-btn").click(function() {
            location.reload();
        });
    });
</script>

<script>
  $(document).ready(function() {
    $(".ajukanW-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var tanggal = $("#tanggal").val();

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukanW') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                tanggal: tanggal
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
        var tanggal = $("#tanggal").val();

        $.ajax({
            type: "POST",
            url: "{{ route('posisi.ajukanK') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                tanggal: tanggal
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

{{-- End --}}


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
});
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terima-btn, .tolak-btn").click(function() {
        // Merefresh halaman
        location.reload();
        // Mengarahkan ke halaman ./seleksi setelah halaman direfresh
        window.location.href = './dashboard';
    });
</script>


{{-- Datepicker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
$(document).ready(function(){
  $('#myModalTanggal, #myModalTanggal1, #myModalTanggal2, #myModalTanggal3').on('shown.bs.modal', function() {
      $('input[name="durasi"]').daterangepicker({
        opens: 'left',
        minDate: moment().startOf('day'),
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
      });
    });
  });
</script>
{{-- end --}}

{{-- Tanggal --}}
{{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Mendaftarkan event listener untuk input waktu mulai
                document.querySelector('input[name="waktu_mulai"]').addEventListener("change", function() {
                    // Mengambil nilai tanggal dari input waktu mulai
                    var waktuMulai = new Date(this.value);
                    
                    // Mengubah nilai minimal input waktu selesai menjadi lebih besar dari waktu mulai yang dipilih
                    document.querySelector('input[name="waktu_selesai"]').min = waktuMulai.toISOString().slice(0,10);
                });
            });
            </script> --}}
  <script>
    // Ambil semua elemen <p> di dalam box
    var paragraphs = document.querySelectorAll('.box p');
    
    // Loop melalui setiap elemen <p>
    paragraphs.forEach(function(paragraph) {
        // Pisahkan teks menjadi array kata-kata
        var words = paragraph.textContent.trim().split(/\s+/);
        
        // Jika jumlah kata lebih dari 10, atur overflow-y menjadi 'auto'
        if (words.length > 10) {
            paragraph.parentElement.style.whiteSpace = 'normal'; // Memastikan teks dapat berjajar
            paragraph.parentElement.style.overflowY = 'auto'; // Aktifkan overflow vertikal
            paragraph.parentElement.style.width = '95%'; // Menghindari pemotongan teks karena margin
        }
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
  {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chart JS -->
  {{-- <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
  <!--  Notifications Plugin    -->
  {{-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> --}}
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  {{-- <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script> --}}
</body>

</html>