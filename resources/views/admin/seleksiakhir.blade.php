<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ppsdm.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Seleksi - Admin BPOM
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
          <li  class="active">
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
            <a class="navbar-brand" href="javascript:;">Seleksi</a>
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
                    <h3>Hasil Seleksi Unit</h3>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Peserta Magang</h4>
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
                        Unit Kerja
                      </th>
                      <th>
                        Universitas/Sekolah
                      </th>
                      <th>
                        Jurusan/Posisi
                      </th>
                      <th>
                        Status Pendaftaran
                      </th>
                      <th class="text-center">
                        Hasil 
                      </th>
                    </thead>
                     <!-- POP UP for $mandiris -->
                     @foreach($mandiris as $mandiri)
                      <div class="user-data" data-user_id="{{ $mandiri->user_id }}">
                          <tbody>
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $mandiri->name }}</td>
                                  <td>@if(empty($mandiri->unit_kerja) || $mandiri->unit_kerja === '[]')
                                      <p>Tidak Lolos</p>
                                  @else
                                      <p>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}</p>
                                  @endif</td>
                                  <td>{{ $mandiri->universitas_sekolah }}</td>
                                  <td>{{ $mandiri->jurusan }}</td>
                                  <td>{{ $mandiri->status }}</td>
                                  <td class="text-right">
                                      <button type="button" class="btn-show-modal" data-target="{{ $loop->iteration }}" data-status="{{ $mandiri->status }}">Hasil</button>
                                  </td>
                              </tr>
                          </tbody>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}-Diterima-Unit">
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
                                            <h2>Informasi Asal Instansi</h2>
                                            <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                                            <p>Universitas/Sekolah : {{ $mandiri->universitas_sekolah }}</p>
                                            {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah}}</p> --}}
                                            <p>Jurusan : {{ $mandiri->jurusan }}</p>
                                          </div>
                                          <div class="box">
                                            <h2>Status Seleksi</h2>
                                            <h2  class="text-success">{{$mandiri->status}}</h2>
                                            <h2 class="mt-4">Pilih Person In Charge (PIC)</h2>
                                            <div class="col-md-12">
                                              <label for="pegawai">Pegawai (Tambahkan akses jika tidak ada)</label><br>
                                              <select name="pegawai" class="unit2 form-control" id="pegawai" required>
                                                <option selected disabled value=""></option>
                                                @foreach ($pekerja as $row)
                                                  <option value="{{ $row->nama }}" data-id="{{ $row->id_unit }}">{{ $row->nama }}</option>
                                                @endforeach
                                              </select>
                                           </div>
                                          </div>
                                          <div class="box">
                                            <h2>Upload Berkas Peserta Diterima</h2>
                                            <label for="berkas">Berkas Peserta</label><br>
                                            <input type="file" name="berkas"  class="file"  accept=".pdf" required max="2048">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="terima-btn" data-id="{{ $mandiri->id }}">Teruskan ke Peserta</button>
                                      </div>
                                </div>
                            </div>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}-Ditolak-Unit">
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
                                          <h2>Informasi Asal Instansi</h2>
                                          <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $mandiri->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $mandiri->jurusan }}</p>
                                        </div>
                                      <div class="box">
                                        <h2>Status Seleksi</h2>
                                        <h2  class="text-danger">{{$mandiri->status}}</h2>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button class="teruskan-btn" data-id="{{ $mandiri->id }}">Teruskan ke Peserta</button>
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}-Peserta-mengundurkan-diri">
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
                                          <h2>Informasi Asal Instansi</h2>
                                          <p>Tingkatan : {{ $mandiri->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $mandiri->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $mandiri->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $mandiri->jurusan }}</p>
                                        </div>
                                      <div class="box">
                                        <h2>Status Seleksi</h2>
                                        <h2 class="text-danger">{{$mandiri->status}}</h2>
                                        <h2>Alasan :</h2>
                                        <p>{{$mandiri->keterangan}}</p>
                                        
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                     <!-- POP UP for $mandiris -->
                     @foreach($wawancaras as $wawancara)
                      <div class="user-data" data-user_id="{{ $wawancara->user_id }}">
                          <tbody>
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $wawancara->name }}</td>
                                  <td>{{ $wawancara->jurusan }}</td>
                                  <td>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }}</td>
                                  <td>{{ $wawancara->universitas_sekolah }}</td>
                                  <td class="text-right">
                                      <button type="button" class="btn-show-modal1" data-target="{{ $loop->iteration }}" data-status="{{ $wawancara->status }}">Hasil</button>
                                  </td>
                              </tr>
                          </tbody>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}-Diterima-Unit">
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
                                          <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $wawancara->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $wawancara->jurusan }}</p>
                                        </div>
                                        <div class="box">
                                          <h2>Status Seleksi</h2>
                                          <h2  class="text-success">{{$wawancara->status}}</h2>
                                          <p></p>
                                        </div>
                                        <div class="box">
                                          <h2>Upload Berkas Peserta Diterima</h2>
                                          <label for="berkas">Berkas Peserta</label><br>
                                          <input type="file" name="berkas"  class="file"  accept=".pdf" required max="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="terimaW-btn" data-id="{{ $wawancara->id }}">Terima</button>
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}-Ditolak-Unit">
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
                                          <p>Tingkatan : {{ $wawancara->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $wawancara->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $wawancara->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $wawancara->jurusan }}</p>
                                        </div>
                                      <div class="box">
                                        <h2>Status Seleksi</h2>
                                        <h2  class="text-danger">{{$wawancara->status}}</h2>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button class="teruskanW-btn" data-id="{{ $wawancara->id }}">Submit</button>
                                    </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                     <!-- POP UP for $mandiris -->
                     @foreach($postings as $posting)
                      <div class="user-data" data-user_id="{{ $posting->user_id }}">
                          <tbody>
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $posting->name }}</td>
                                  <td>@if(empty($posting->unit) || $posting->unit === '[]')
                                      <p>Tidak Lolos</p>
                                  @else
                                      <p>{{ str_replace(['[', ']', '"'], '', $posting->unit) }}</p>
                                  @endif</td>
                                  <td>{{ $posting->universitas_sekolah }}</td>
                                  <td>{{ $posting->posisi }}</td>
                                  <td>{{ $posting->status }}</td>
                                  <td class="text-right">
                                      <button type="button" class="btn-show-modal2" data-target="{{ $loop->iteration }}" data-status="{{ $posting->status }}">Hasil</button>
                                  </td>
                              </tr>
                          </tbody>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}-Diterima-Unit">
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
                                          <h2>Informasi Asal Instansi</h2>
                                          <p>Tingkatan : {{ $posting->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $posting->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $posting->jurusan }}</p>
                                        </div>
                                        <div class="box">
                                            <h2>Status Seleksi</h2>
                                            <h2  class="text-success">{{$posting->status}}</h2>
                                            <h2 class="mt-4">Pilih Person In Charge (PIC)</h2>
                                            <div class="col-md-12">
                                              <label for="pegawai">Pegawai (Tambahkan akses jika tidak ada)</label><br>
                                              <select name="pegawai" class="unit2 form-control" id="pegawai" required>
                                                <option selected disabled value=""></option>
                                                @foreach ($pekerja as $row)
                                                  <option value="{{ $row->nama }}" data-id="{{ $row->id_unit }}">{{ $row->nama }}</option>
                                                @endforeach
                                              </select>
                                           </div>
                                          </div>
                                          <div class="box">
                                            <h2>Upload Berkas Peserta Diterima</h2>
                                            <label for="berkas">Berkas Peserta</label><br>
                                            <input type="file" name="berkas"  class="file"  accept=".pdf" required max="2048">
                                          </div>
                                        </div>
                                      </div>
                                    <div class="modal-footer">
                                      <button class="terimaK-btn" data-id="{{ $posting->id }}">Teruskan ke Peserta</button>
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}-Ditolak-Unit">
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
                                          <h2>Informasi Asal Instansi</h2>
                                          <p>Tingkatan : {{ $posting->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $posting->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah}}</p> --}}
                                          <p>Jurusan : {{ $posting->jurusan }}</p>
                                        </div>
                                      <div class="box">
                                        <h2>Status Seleksi</h2>
                                        <h2  class="text-danger">{{$posting->status}}</h2>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button class="teruskanK-btn" data-id="{{ $posting->id }}">Teruskan ke Peserta</button>
                                    </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}-Peserta-mengundurkan-diri">
                      <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">{{ $posting->posisi}} <br> {{ $posting->name }}</h5>
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
                                          <h2>Informasi Asal Instansi</h2>
                                          <p>Tingkatan : {{ $posting->tingkatan }}</p>
                                          <p>Universitas/Sekolah : {{ $posting->universitas_sekolah }}</p>
                                          {{-- <p>Alamat Universitas/Sekolah : {{ $posting->alamat_universitas_sekolah}}</p> --}}
                                          <p>Posisi: {{ $posting->posisi }}</p>
                                        </div>
                                      <div class="box">
                                        <h2>Status Seleksi</h2>
                                        <h2 class="text-danger">{{$posting->status}}</h2>
                                        <h2>Alasan :</h2>
                                        <p>{{$posting->keterangan}}</p>
                                        
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                      </div>
                    </tbody>
                  </table>
                
    </div>
  </div>
</table>
</div>
</div>
</div>
                <!-- FOOTER -->
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
      <!--end content-->
      <!-- Modal POP UP -->
      

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-show-modal').click(function() {
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            switch (status) {
                case 'Diterima Unit':
                    $('#myModal' + targetModal + '-Diterima-Unit').modal('show');
                    break;
                case 'Peserta mengundurkan diri':
                    $('#myModal' + targetModal + '-Peserta-mengundurkan-diri').modal('show');
                    break;
                case 'Ditolak Unit':
                    $('#myModal' + targetModal + '-Ditolak-Unit').modal('show'); 
                    break;
                default:
                    console.error('Invalid status');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.btn-show-modal1').click(function() {
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            switch (status) {
                case 'Diterima Unit':
                    $('#myModal1' + targetModal + '-Diterima-Unit').modal('show');
                    break;
                case 'Ditolak Unit':
                    $('#myModal1' + targetModal + '-Ditolak-Unit').modal('show'); 
                    break;
                default:
                    console.error('Invalid status');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.btn-show-modal2').click(function() {
            var targetModal = $(this).data('target');
            var status = $(this).data('status');

            switch (status) {
                case 'Diterima Unit':
                    $('#myModal2' + targetModal + '-Diterima-Unit').modal('show');
                    break;
                case 'Ditolak Unit':
                    $('#myModal2' + targetModal + '-Ditolak-Unit').modal('show'); 
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
            var pegawai = $('#pegawai').val(); // Mengambil nilai pegawai dari dropdown

            // Membuat objek FormData untuk mengirim data formulir, termasuk file
            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('id', id);
            formData.append('pegawai', pegawai); // Menyertakan nilai pegawai dalam FormData

            // Mendapatkan file yang dipilih oleh pengguna
            var fileInput = $('input[name="berkas"]')[0].files[0];
            formData.append('berkas', fileInput);

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('seleksiakhir.terima') }}",
                data: formData,
                contentType: false, // Jangan atur tipe konten karena FormData sudah mengaturnya
                processData: false, // Jangan proses data FormData karena FormData sudah siap dikirim
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terima-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Peserta berhasil diterima di BPOM");
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
        $(".terima-btn").click(function() {
            location.reload();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(".terimaW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Membuat objek FormData untuk mengirim data formulir, termasuk file
            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('id', id);
            // Mendapatkan file yang dipilih oleh pengguna
            var fileInput = $('input[name="berkas"]')[0].files[0];
            formData.append('berkas', fileInput);

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('seleksiakhir.terimaW') }}",
                data: formData,
                contentType: false, // Jangan atur tipe konten karena FormData sudah mengaturnya
                processData: false, // Jangan proses data FormData karena FormData sudah siap dikirim
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaW-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Peserta berhasil diterima di BPOM");
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
        $(".terimaW-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".terimaK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut
            var pegawai = $('#pegawai').val(); // Mengambil nilai pegawai dari dropdown

            var formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('id', id);
            formData.append('pegawai', pegawai); // Menyertakan nilai pegawai dalam FormData
            
            // Mendapatkan file yang dipilih oleh pengguna
            var fileInput = $('input[name="berkas"]')[0].files[0];
            formData.append('berkas', fileInput);

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('seleksiakhir.terimaK') }}",
                data: formData,
                contentType: false, // Jangan atur tipe konten karena FormData sudah mengaturnya
                processData: false, // Jangan proses data FormData karena FormData sudah siap dikirim
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaK-btn-${id}`).text('Diterima');
                        // Menampilkan pesan sukses
                        alert("Peserta berhasil diterima di BPOM");
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
      $(".terimaK-btn").click(function() {
      location.reload();
  });
</script>

<script>
    $(document).ready(function() {
        $(".teruskan-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('seleksiakhir.teruskan') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#teruskan-btn-${id}`).text('Diteruskan');
                        // Menampilkan pesan sukses
                        alert("Pesan terkirim ke Pendaftar");
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
        $(".teruskan-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".teruskanW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('seleksiakhir.teruskanW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#teruskanW-btn-${id}`).text('Diteruskan');
                        // Menampilkan pesan sukses
                        alert("Pesan terkirim ke Pendaftar");
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
        $(".teruskanW-btn").click(function() {
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

{{-- 2MB --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Select file input elements
      const berkasInput = document.querySelector('input[name="berkas"]');

      // Add change event listener to the file input elements
      berkasInput.addEventListener('change', function () {
          validateFileSize(berkasInput);
      });

      // Function to validate file size
      function validateFileSize(input) {
          if (input.files.length > 0) {
              const file = input.files[0];
              const fileSizeInMB = file.size / (1024 * 1024); // Convert to MB
              const maxSizeMB = 2; // Maximum size allowed in MB

              // Check if file size exceeds the maximum size
              if (fileSizeInMB > maxSizeMB) {
                  alert('File maksimal 2MB. Tolong Disesuaikan.');
                  input.value = ''; // Clear the input
              }
          }
      }
  });
</script>
<script>
  // Ambil semua elemen input file
  const fileInputs = document.querySelectorAll('input[type="file"]');
  
  // Loop melalui setiap elemen input file
  fileInputs.forEach(function(input) {
      // Tambahkan event listener untuk saat mengubah nilai input
      input.addEventListener('change', function(event) {
          // Ambil file yang dipilih
          const selectedFile = event.target.files[0];
          
          // Periksa jika file yang dipilih bukan PDF
          if (selectedFile && !selectedFile.type.match('application/pdf')) {
              // Tampilkan pesan kesalahan
              alert('Hanya file PDF yang diperbolehkan!');
              
              // Reset nilai input file
              input.value = '';
          }
      });
  });
</script>
{{-- End --}}

      
      
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