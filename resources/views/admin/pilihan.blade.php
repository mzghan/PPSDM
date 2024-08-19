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
                    <thead>
                      <th>
                        No.
                      </th>
                      <th>
                        Nama Lengkap
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
                
                 <!-- POP UP for $mandiris -->
                 @foreach($mandiris as $mandiri)
                    <div class="user-data" data-user_id="{{ $mandiri->user_id }}">
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $mandiri->name }}</td>
                                <td>{{ $mandiri->universitas_sekolah }}</td>
                                <td>{{ $mandiri->jurusan }}</td>
                                <td>
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
                                </td>
                                <td><div class="status">
                                @if($mandiri->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @else
                                    <p class="development2">{{ $mandiri->status }}</p>
                                @endif</td>
                                <td class="text-right">
                                    <button class="btn btn-primary btn-round showModalBtn" data-bs-toggle="modal" data-bs-target="#myModal{{ $loop->iteration }}">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                  @endforeach

                    <!--modal utama mandiri-->
                    @foreach($mandiris as $mandiri)
                        <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $mandiri->jurusan }} <br> {{ $mandiri->name }}</h5>
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
                                            <div class="box">
                                                <h2>Informasi Pendukung </h2>
                                                <p>Unit Kerja dipilih : {{ $mandiri->unit_kerja }}</p>
                                                <p>Waktu  Mulai s.d Selesai : 
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
                                        <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak{{ $loop->iteration }}">Tolak</button>
                                        <button type="button" class="btn2" data-bs-toggle="modal" id="showModalForward{{ $loop->iteration }}">Pilih Unit Kerja</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        <!-- start modal -->
                        <div class="modal text-center" tabindex="-1" id="myModalTolak{{ $loop->iteration }}">
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
                                    <button class="tolak-btn" data-id="{{ $mandiri->id }}">Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                        <!--start modal forward-->
                          <div class="modal" id="myModalForward{{ $loop->iteration }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $mandiri->jurusan }} <br> {{ $mandiri->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <box class="box">
                                        <h2>Kirimkan Ke Unit Kerja</h2>
                                        <p>Perhatikan keselarasan bidang peserta <br> dengan kebutuhan unit kerja</p>
                                        <div class="form-group">
                                            <label for="unit_kerja">Unit Kerja</label><br>
                                            <select id="select2insidemodal{{ $loop->iteration }}" multiple="multiple" name="unit" class="unit1">
                                            <option value="{{ $mandiri->unit_kerja }}" selected>{{ $mandiri->unit_kerja }}</option>
                                                @foreach ($data as $row)
                                                <option value="{{$row->nama_unit}}">{{$row->nama_unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </box>
                                    <div class="modal-footer">
                                    <button class="terima-btn" data-id="{{ $mandiri->id }}">Lanjutkan ke Unit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  @endforeach
                  
                    <!-- POP UP for $wawancaras -->
                    @foreach($wawancaras as $wawancara)
                    <div class="user-data" data-user_id="{{ $wawancara->user_id }}">
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $wawancara->name }}</td>
                                <td>{{ $wawancara->universitas_sekolah }}</td>
                                <td>{{ $wawancara->jurusan }}</td>
                                <td>{{ $wawancara->durasi }}</td>
                                <td class="text-right">
                                    <button class="btn btn-primary btn-round showModalBtn1" data-bs-toggle="modal" data-bs-target="#myModal1{{ $loop->iteration }}">Review</button>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                  @endforeach

                    <!--modal utama wawancara-->
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
                                              <h2>Informasi Asal Universitas/Sekolah</h2>
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
                                              <p>Waktu  Mulai s.d Selesai : {{ $wawancara->durasi }}</p>
                                              <p>Pakta Integritas :<a href="{{ route('file.download', ['filename' => $wawancara->pkt_integritas]) }}">Unduh Pakta Integritas</a></p>
                                              <p>Surat Pendukung : <a href="{{ route('file.download', ['filename' => $wawancara->surat_pendukung]) }}">Unduh Surat Pendukung</a> </p>
                                              <p>Proposal : <a href="{{ route('file.download', ['filename' => $wawancara->proposal]) }}">Undu Proposal</a> </p>
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
                                            <option value="" selected>{{ $wawancara->unit_kerja }}</option>
                                                @foreach ($data as $row)
                                                <option value="{{$row->nama_unit}}">{{$row->nama_unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </box>
                                    <div class="modal-footer">
                                    <button class="terimaW-btn" data-id="{{ $wawancara->id }}">Lanjutkan ke Unit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    @endforeach

                      <!-- POP UP for $posting -->
                 @foreach($postings as $posting)
                    <div class="user-data" data-user_id="{{ $posting->user_id }}">
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $posting->name }}</td>
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
                                <td>{{ $posting->status }}</td>
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
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan semua tombol modal utama
            var mainModalButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

            // Loop melalui setiap tombol modal utama
            mainModalButtons.forEach(function(button) {
                // Tambahkan event listener untuk setiap tombol modal utama
                button.addEventListener('click', function() {
                    // Tutup semua modal yang terbuka saat ini
                    var openModals = document.querySelectorAll('.modal.show');
                    openModals.forEach(function(modal) {
                        var modalId = modal.getAttribute('id');
                        var modalNumber = modalId.replace('myModal', ''); // Dapatkan nomor modal
                        modal.setAttribute('aria-hidden', 'true');
                        modal.setAttribute('aria-modal', 'false');
                        modal.classList.remove('show');
                    });
                });
            });
        });
        </script>
       

<!-- Script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan modal forward
        $('[id^=showModalForward]').click(function() {
            var id = $(this).attr('id').replace('showModalForward', '');
            $('#myModalForward' + id).modal('show');
        });

        // Fungsi untuk menampilkan modal tolak
        $('[id^=showModalTolak]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak', '');
            $('#myModalTolak' + id).modal('show');
        });
                // Inisialisasi Select2 saat modal ditampilkan
        $('[id^=myModalForward]').on('shown.bs.modal', function() {
            var id = $(this).attr('id').replace('myModalForward', '');
            $('#select2insidemodal' + id).select2({
                dropdownParent: $(this)
            });
        });
       
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
        $(".terima-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut
            var units = $('.unit1').val(); // Mengambil nilai dari dropdown Select2

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('pilihan.terima') }}",
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
            var units = $('.unit1').val(); // Mengambil nilai dari dropdown Select2

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('pilihan.terimaW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                    unit: units // Menggunakan nilai unit dari dropdown Select2
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaW-btn-${id}`).text('Diterima');
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
    $(".tolak-btn").click(function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('pilihan.tolak') }}",
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
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".terima-btn, .tolak-btn").click(function() {
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
            url: "{{ route('pilihan.tolakW') }}",
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
  var dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>

        {{-- durasi --}}
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

    {{-- putih pilihan --}}
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