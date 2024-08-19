<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Icon Home --}}
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Pengumuman Magang - Badan POM
    </title>
  <!-- JS POP UP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Close JS POP UP -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    {{-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" /> --}}
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{url('assets/demo/hasil.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>

<body>
    <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <a class="navbar-brand" href="javascript:;"><img src="../assets/img/logo-small.png"></a>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        <form>
                            <div class="input-group no-border">
                                <button class="btn5"><a href="home">Beranda</a></button>
                                <button class="btn6">
                                    <a href="hasil" style="position: relative;">
                                        Hasil Pendaftaran
                                        @if(Session::has('newPostingCount_' . auth()->user()->id) && Session::get('newPostingCount_' . auth()->user()->id) > 0)
                                            <span id="badgeNotifPosting" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                                                {{ Session::get('newPostingCount_' . auth()->user()->id) }}
                                            </span>
                                        @endif
                                    
                                        @if(Session::has('newMandiriCount_' . auth()->user()->id) && Session::get('newMandiriCount_' . auth()->user()->id) > 0)
                                            <span id="badgeNotifMandiri" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                                                {{ Session::get('newMandiriCount_' . auth()->user()->id) }}
                                            </span>
                                        @endif
                                    
                                        @if(Session::has('newWawancaraCount_' . auth()->user()->id) && Session::get('newWawancaraCount_' . auth()->user()->id) > 0)
                                            <span id="badgeNotifWawancara" class="badge badge-danger" style="position: absolute; top: -15px; right: -15px; background-color: red;">
                                            {{ Session::get('newWawancaraCount_' . auth()->user()->id) }}
                                            </span>
                                        @endif
                                    </a>                                                             
                                </button>
                            </div>                            
                          </form>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      <!-- End Navbar -->

      <!-- start content-->
      <h1>Posisi yang telah kamu daftarkan</h1>

    @foreach($mandiris as $mandiri)
    <div class="posisi2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 mr-5">
                    <div class="cardii" style="overflow-x: hidden;">
                        <div class="text">
                        @if(empty($mandiri->unit_kerja) || $mandiri->unit_kerja === '[]')
                            <h2>Tidak Lolos</h2>
                        @else
                            <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}</h2>
                        @endif

                            {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                            <h4>{{ $mandiri->jurusan }}</h4>
                            <div class="details">
                                <div class="duration-container">
                                    <p class="duration">{{ $mandiri->tanggal }}</p>
                                </div>
                                <div class="status">
                                @if($mandiri->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @elseif($mandiri->status == "Ditolak Unit")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($mandiri->status == "Ditolak tahap 1")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($mandiri->status == "Ditolak tahap 2")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($mandiri->status == "Lolos seleksi Magang")
                                    <p class="development2" style="color: green;">Lolos seleksi Magang!</p>
                                @elseif($mandiri->status == "Peserta Magang Aktif")
                                    <p class="development2" style="color: green;">Anda adalah peserta magang aktif</p>
                                @elseif($mandiri->status == "Peserta selesai magang")
                                    <p class="development2" style="color: green;">Anda telah menyelesaikan magang</p>
                                @elseif($mandiri->status == "Peserta mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @elseif($mandiri->status == "mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @elseif($mandiri->status == "Mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @else
                                    <p class="development2">{{ $mandiri->status }}</p>
                                @endif

                                    <button type="button" class="btn-show-modal" data-target="{{ $loop->iteration }}" data-status="{{ $mandiri->status }}">Lihat Status Pendaftaran</button>
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($wawancaras as $wawancara)
    <div class="posisi2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 mr-5">
                    <div class="cardii">
                        <div class="text">
                            <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }}</h2>
                            {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                            <h4>{{ $wawancara->jurusan }}</h4>
                            <div class="details">
                                <div class="duration-container">
                                    <p class="duration">{{ $wawancara->tanggal }}</p>
                                </div>
                                <div class="status">
                                @if($mandiri->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @else
                                    <p class="development2">{{ $mandiri->status }}</p>
                                @endif
                                    <button type="button" class="btn-show-modal1" data-target="{{ $loop->iteration }}" data-status="{{ $wawancara->status }}">Lihat Status Pendaftaran</button>
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach($postings as $posting)
    <div class="posisi2">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3 mr-5">
                    <div class="cardii" style="overflow-x: hidden;">
                        <div class="text">
                            <h2>{{ $posting->unit }} </h2>
                            {{-- <h2>{{ $posting->posisi}} </h2> --}}
                            <h4>{{ $posting->posisi}}</h4>
                            <div class="details">
                                <div class="duration-container">
                                </div>
                                <div class="status">
                                @if($posting->status == "Proccess")
                                    <p class="development2">Sedang dalam proses</p>
                                @elseif($posting->status == "Ditolak Unit")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($posting->status == "Ditolak Tahap 1")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($posting->status == "Ditolak Tahap 2")
                                    <p class="development2" style="color: red;">Ditolak</p>
                                @elseif($posting->status == "Lolos seleksi Magang")
                                    <p class="development2" style="color: green;">Lolos seleksi Magang!</p>
                                @elseif($posting->status == "Peserta Magang Aktif")
                                    <p class="development2" style="color: green;">Anda adalah peserta magang aktif</p>
                                @elseif($posting->status == "Peserta selesai magang")
                                    <p class="development2" style="color: green;">Anda telah menyelesaikan magang</p>
                                @elseif($posting->status == "Peserta mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @elseif($posting->status == "mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @elseif($posting->status == "Mengundurkan diri")
                                    <p class="development2" style="color: red;">Anda telah mengundurkan diri</p>
                                @else
                                    <p class="development2">{{ $posting->status }}</p>
                                @endif
                                    <button type="button" class="btn-show-modal2" data-target="{{ $loop->iteration }}" data-status="{{ $posting->status }}">Lihat Status Pendaftaran</button>
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Tombol "Mulai Mendaftar" -->
@if($mandiris->isEmpty() && $wawancaras->isEmpty() && $postings->isEmpty())
    <div class="container text-center mt-3">
        <!-- Pastikan untuk memanggil fungsi JavaScript saat tombol ditekan -->
        <button class="mulai-mendaftar" onclick="navigateToHome()">Mulai Mendaftar</button>
    </div>
@endif
<!-- POP UP for $mandiris -->
@foreach($mandiris as $mandiri)
    <!-- Modal untuk situasi "Proses" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Proccess">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                </box>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Diteruskan ke Unit" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Diteruskan-ke-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->created_at->format('d');
                        $bulanInggris = $mandiri->created_at->format('F');
                        $tahun = $mandiri->created_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran diterima</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Diterima Unit" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Diterima-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $mandiri->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak Unit" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Ditolak-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $mandiri->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak tahap 2" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Ditolak-tahap-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $mandiri->tanggal }}</p>
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran tidak lolos tahap akhir</h3>
                    <p> Jangan putus asa, tetap semangat </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan Tanggal" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Tanggal">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
    
                    <div class="change col-md-12">
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                        <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                        <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->updated_at->format('d');
                    $bulanInggris = $mandiri->updated_at->format('F');
                    $tahun = $mandiri->updated_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                        <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                        <h3 class="jadwal">Konfirmasi Perubahan Periode Magang</h3>
                        <p class="tgl">
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
                    </div>
                    
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalUbahBtn{{$loop->iteration}}">Tolak</button>
                    <button class="terimaajuan-btn" data-id="{{ $mandiri->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>

    <!-- start modal TOLAK BERUBAH -->
    <div class="modal text-center" tabindex="-1" id="myModalTolak{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Perubahan Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Perubahan Jadwal</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="tolakajuan-btn" data-id="{{ $mandiri->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    <!-- Modal untuk situasi "Perubahan Diterima" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
    
                    <div class="change col-md-12">
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                        <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                        <h3 class="jadwal">Perubahan Periode Magang menjadi</h3>
                        <p class="tgl">{{ $mandiri->tanggal }}</p>
                        <p >Tanggapan Peserta : <strong class="text-success">{{ $mandiri->status }}</strong></p>
                    </div>
                    
                </box>
                <div class="modal-footer">
                    <button class="terimaajuan-btn" data-id="{{ $mandiri->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk situasi "Perubahan Diterima" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Peserta menerima perubahan Tanggal</h3>
                </box>
            </div>
        </div>
    </div>

    <!-- Modal untuk situasi "Lolos magang" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Lolos-seleksi-Magang">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran lolos tahap 2</h3>
                    <p> Diverifikasi oleh : {{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </p>
                    <h3>Penanggung Jawab dari Unit</h3>
                    <p> {{$mandiri->pegawai}}  </p>
                    <h3>Surat Penerimaan Magang</h3>
                    @if ($mandiri->berkas)
                        <p><a href="{{ route('file.download', ['filename' => $mandiri->berkas]) }}">Unduh Surat Penerimaan Magang</a></p>
                    @else
                        <p>File tidak tersedia untuk diunduh.</p>
                    @endif
                    <p>Jika tidak ada konfirmasi 5 Hari Kerja maka akan dinyatakan gugur</p>
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalGagalBtn{{$loop->iteration}}">Tolak</button>
                    <button class="lolos-btn" data-id="{{ $mandiri->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>
        <!-- start modal gagal magang -->
        <div class="modal text-center" tabindex="-1" id="myModalGagal{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Magang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Magang</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="gagal-btn" data-id="{{ $mandiri->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    <!-- Modal untuk situasi "Ditolak" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Ditolak-tahap-1">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran Ditolak</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $mandiri->updated_at->format('d');
                        $bulanInggris = $mandiri->updated_at->format('F');
                        $tahun = $mandiri->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan ditolak</h3>
                        <p>{{ $mandiri->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Peserta Magang Aktif" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Peserta-Magang-Aktif">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Penanggung Jawab dari Unit</h3>
                    <p> {{$mandiri->pegawai}}  </p>
                    <h3>Selamat Anda Diterima Magang di BPOM</h3>
                    <p>Harap login ulang untuk informasi lebih lanjut</p>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="logout-btn">
                        {{ __('Login') }}
                    </a>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Peserta Magang Aktif" -->
@isset($laporan_akhir)
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Peserta-selesai-magang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Riwayat Magang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Penanggung Jawab dari Unit</h3>
                    <p> {{$mandiri->pegawai}}  </p>
                    <h3>Terimakasih sudah Magang di Badan POM</h3>
                    <p>Sertifikat Magang</p>
                    <button class="unduh">
                        <a href="{{ route('download-pdf', ['laporan_id' => $laporan_akhir->id]) }}" >Unduh Sertifikat</a>
                    </button>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endisset


    <!-- Modal untuk situasi "Peserta Mengundurkan Diri" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Peserta-mengundurkan-diri">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $mandiri->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $mandiri->jurusan }}</h2> --}}
                    <h4>{{ $mandiri->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $mandiri->tingkatan }}</p>
                    </div>
                    <h3>Anda Telah Mengundurkan Diri dari BPOM</h3>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan Mengundurkan Diri</h3>
                        <p>{{ $mandiri->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- POP UP for $wawancaras -->
@foreach($wawancaras as $wawancara)
       
    <!-- Modal untuk situasi "Proses" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Proccess">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $mandiri->created_at->format('d');
                    $bulanInggris = $mandiri->created_at->format('F');
                    $tahun = $mandiri->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                </box>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Diteruskan ke Unit" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Diteruskan-ke-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                    <p>{{ $wawancara->updated_at }} </p>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal untuk situasi "Diterima Unit" -->
     <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Diterima-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                    <p>{{ $wawancara->updated_at }} </p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $wawancara->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak Unit" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Ditolak-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                    <p>{{ $wawancara->updated_at }} </p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $wawancara->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak tahap 2" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Ditolak-tahap-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                    <p>{{ $wawancara->updated_at }} </p>
                    <h3>Pendaftaran tidak lolos tahap 2</h3>
                    <p> Ditolak oleh :{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan Tanggal" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Perubahan-Tanggal">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
    
                    <div class="change col-md-12">
                        <h3>Pendaftaran diterima</h3>
                        <p>{{ $wawancara->created_at }} </p>
                        <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                        <p>{{ $wawancara->updated_at }} </p>
                        <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                        <h3 class="jadwal">Konfirmasi Perubahan Periode Penelitan/Wawancara</h3>
                        <p class="tgl">{{ $wawancara->tanggal }}</p>
                    </div>
                    
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalUbahBtn1{{$loop->iteration}}">Tolak</button>
                    <button class="terimaajuanW-btn" data-id="{{ $wawancara->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>
     <!-- start modal TOLAK BERUBAH -->
     <div class="modal text-center" tabindex="-1" id="myModalTolak1{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Perubahan Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Perubahan Jadwal</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="tolakajuanW-btn" data-id="{{ $wawancara->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    <!-- Modal untuk situasi "Lolos magang" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Lolos-seleksi-Penelitian">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran lolos tahap verifikasi 1</h3>
                    <p>{{ $wawancara->updated_at }} </p>
                    <h3>Pendaftaran lolos tahap 2</h3>
                    <p> Diverifikasi oleh : {{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </p>
                    <h3>Surat Penerimaan Magang</h3>
                    @if ($wawancara->berkas)
                        <p><a href="{{ route('file.download', ['filename' => $wawancara->berkas]) }}">Unduh Surat Penerimaan Magang</a></p>
                    @else
                        <p>File tidak tersedia untuk diunduh.</p>
                    @endif
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalGagalBtn1{{$loop->iteration}}">Tolak</button>
                    <button class="lolosW-btn" data-id="{{ $wawancara->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>
      <!-- start modal gagal magang -->
      <div class="modal text-center" tabindex="-1" id="myModalGagal1{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Magang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Magang</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="gagalW-btn" data-id="{{ $wawancara->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    <!-- Modal untuk situasi "Ditolak" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Ditolak-tahap-1">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <p>{{ $wawancara->created_at }} </p>
                    <h3>Pendaftaran ditolak</h3>
                    <p>{{ $wawancara->updated_at }}</p>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan ditolak</h3>
                        <p>{{ $wawancara->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
        <!-- Modal untuk situasi "Peserta Magang Aktif" -->
        <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Peserta-Penelitian-Aktif">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }} </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Selamat Anda Diterima Magang di BPOM</h3>
                    <p>Harap login ulang untuk informasi lebih lanjut</p>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Peserta Mengundurkan Diri" -->
    <div class="modal" tabindex="-1" id="myModal1{{ $loop->iteration }}Peserta-mengundurkan-diri">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $wawancara->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $wawancara->jurusan }}</h2> --}}
                    <h4>{{ $wawancara->jurusan }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">{{ $wawancara->tanggal }}</p>
                        <p class="level">{{ $wawancara->tingkatan }}</p>
                    </div>
                    <h3>Anda Telah Mengundurkan Diri dari BPOM</h3>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan Mengundurkan Diri</h3>
                        <p>{{ $wawancara->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- POP UP for $wawancaras -->
@foreach($postings as $posting)
    
    <!-- Modal untuk situasi "Proses" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Proccess">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                </box>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Diteruskan ke Unit" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Diteruskan-ke-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal untuk situasi "Diterima Unit" -->
     <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Diterima-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $posting->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak Unit" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Ditolak-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran proses tahap 2</h3>
                    <p>{{ $posting->status }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Ditolak tahap 2" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Ditolak-tahap-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran tidak lolos tahap 2</h3>
                    <p> Ditolak oleh :{{ $posting->unit }} </p>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan ditolak</h3>
                        <p>{{ $posting->keterangan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Perubahan Tanggal" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Perubahan-Tanggal">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
    
                    <div class="change col-md-12">
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                        <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                        <h3 class="jadwal">Konfirmasi Perubahan Periode Penelitan/posting</h3>
                        <p class="tgl">{{ $posting->durasi }}</p>
                    </div>
                    
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalUbahBtn2{{$loop->iteration}}">Tolak</button>
                    <button class="terimaajuanK-btn" data-id="{{ $posting->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>
    <!-- start modal TOLAK BERUBAH -->
    <div class="modal text-center" tabindex="-1" id="myModalTolak2{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Perubahan Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Perubahan Jadwal</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="tolakajuanK-btn" data-id="{{ $posting->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    <!-- Modal untuk situasi "Perubahan Diterima" -->
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Perubahan-Diterima">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $posting->unit_kerja) }}  </h2>
                    {{-- <h2>{{ $posting->jurusan }}</h2> --}}
                    <h4>{{ $posting->jurusan }}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Peserta menerima perubahan Tanggal</h3>
                </box>
            </div>
        </div>
    </div>
    <!-- Modal untuk situasi "Lolos magang" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Lolos-seleksi-Magang">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran lolos verifikasi</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <h3>Pendaftaran lolos tahap 2</h3>
                    <p> Diverifikasi oleh : {{ $posting->unit }} </p>
                    <h3>Penanggung Jawab dari Unit</h3>
                    <p> {{$posting->pegawai}}  </p>
                    <h3>Surat Penerimaan Magang</h3>
                    @if ($posting->berkas)
                        <p><a href="{{ route('file.download', ['filename' => $posting->berkas]) }}">Unduh Surat Penerimaan Magang</a></p>
                    @else
                        <p>File tidak tersedia untuk diunduh.</p>
                    @endif
                </box>
                <div class="modal-footer">
                    <button type="button" class="btn1" data-bs-dismiss="modal" id="showModalGagalBtn2{{$loop->iteration}}">Tolak</button>
                    <button class="lolosK-btn" data-id="{{ $posting->id }}">Terima</button>
                </div>
            </div>
        </div>
    </div>
     <!-- start modal gagal magang -->
     <div class="modal text-center" tabindex="-1" id="myModalGagal2{{ $loop->iteration }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">Menolak Magang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <box class="box">
                        <h2 class="m-2">Berikan Keterangan mengapa menolak Magang</h2>
                        <img src="../assets/img/Error.png" alt="">
                        <div class="form-group m-3">
                            <label>keterangan</label>
                            <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                        </div>
                    </box>
                    <div class="modal-footer">
                    <button class="gagalK-btn" data-id="{{ $posting->id }}">Tolak</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

    <!-- Modal untuk situasi "Ditolak" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Ditolak-tahap-1">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Pendaftaran diterima</h3>
                    <?php
                    $bulan = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                    ];
                    $tanggal = $posting->created_at->format('d');
                    $bulanInggris = $posting->created_at->format('F');
                    $tahun = $posting->created_at->format('Y');
                    $bulanIndonesia = $bulan[$bulanInggris];
                ?>
                <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                <h3>Pendaftaran Ditolak</h3>
                        <?php
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];
                        $tanggal = $posting->updated_at->format('d');
                        $bulanInggris = $posting->updated_at->format('F');
                        $tahun = $posting->updated_at->format('Y');
                        $bulanIndonesia = $bulan[$bulanInggris];
                    ?>
                    <p>{{ $tanggal }} {{ $bulanIndonesia }} {{ $tahun }}</p>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan ditolak</h3>
                        <p>{{ $posting->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
        <!-- Modal untuk situasi "Peserta Magang Aktif" -->
        <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Peserta-Magang-Aktif">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Selamat Anda Diterima Magang di BPOM</h3>
                    
                    <p>Harap login ulang untuk informasi lebih lanjut</p>
                    <h3>Penanggung Jawab dari Unit</h3>
                    <p> {{$posting->pegawai}}  </p>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="logout-btn">
                        {{ __('Login') }}
                    </a>

                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
 <!-- Modal untuk situasi "Peserta Magang Aktif" -->
@isset($laporan_akhir)
    <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}Peserta-selesai-magang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Riwayat Magang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ str_replace(['[', ']', '"'], '', $posting->unit) }}  </h2>
                    {{-- <h2>{{ $posting->jurusan }}</h2> --}}
                    <h4>{{ $posting->posisi }}</h4>
                    <div class="klasifikasi">
                        <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Terimakasih sudah Magang di Badan POM</h3>
                    <p>Sertifikat Magang</p>
                    <button class="unduh">
                        <a href="{{ route('download-pdf', ['laporan_id' => $laporan_akhir->id]) }}" >Unduh Sertifikat</a>
                    </button>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endisset

    <!-- Modal untuk situasi "Peserta Mengundurkan Diri" -->
    <div class="modal" tabindex="-1" id="myModal2{{ $loop->iteration }}Peserta-mengundurkan-diri">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Proses Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <box class="box">
                    <h2>{{ $posting->unit }} </h2>
                    {{-- <h2>{{ $posting->posisi}} </h2> --}}
                    <h4>{{ $posting->posisi}}</h4>
                    <div class="klasifikasi">
                    <p class="durasi">
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
                        <p class="level">{{ $posting->tingkatan }}</p>
                    </div>
                    <h3>Anda Telah Mengundurkan Diri dari BPOM</h3>
                    <div class="col-md-6"><img src="../assets/img/Error.png" class="img-fluid float-left" alt="perubahan"></div>
                    <div class="change col-md-6">
                        <h3 class="jadwal">Alasan Mengundurkan Diri</h3>
                        <p>{{ $posting->keterangan }}</p>
                    </div>
                </box>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- Notifikasi --}}
{{-- <script>
    $(document).ready(function() {
        var newHasilCount = "{{ Session::get('newHasilCount') }}";

        if (newHasilCount > 0) {
            $('#badgeNotif').text(newHasilCount);
            $('#badgeNotif').show(); // Menampilkan badge notifikasi
        } else {
            $('#badgeNotif').hide(); // Sembunyikan badge notifikasi jika tidak ada notifikasi baru
        }
    });
</script> --}}

    <script>
        function navigateToPage() {
        window.location.href = 'home';
        }
    </script>
<script>
    function navigateToHome() {
        // Redirect ke /magang/home dengan hash fragment
        window.location.href = "/PPSDM/public/magang/home#inti";
    }
</script>


<!-- Script untuk menampilkan modal -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('[id^=showModalUbahBtn]').click(function() {
            var id = $(this).attr('id').replace('showModalUbahBtn', '');
            $('#myModalTolak' + id).modal('show');
        });
        $('[id^=showModalUbahBtn1]').click(function() {
            var id = $(this).attr('id').replace('showModalUbahBtn1', '');
            $('#myModalTolak1' + id).modal('show');
        });
        $('[id^=showModalUbahBtn2]').click(function() {
            var id = $(this).attr('id').replace('showModalUbahBtn2', '');
            $('#myModalTolak2' + id).modal('show');
        });
        $('[id^=showModalGagalBtn]').click(function() {
            var id = $(this).attr('id').replace('showModalGagalBtn', '');
            $('#myModalGagal' + id).modal('show');
        });
        $('[id^=showModalGagalBtn1]').click(function() {
            var id = $(this).attr('id').replace('showModalGagalBtn1', '');
            $('#myModalGagal1' + id).modal('show');
        });
        $('[id^=showModalGagalBtn2]').click(function() {
            var id = $(this).attr('id').replace('showModalGagalBtn2', '');
            $('#myModalGagal2' + id).modal('show');
        });
   
            // Button click event handler
            $('.btn-show-modal').click(function() {
                // Get target modal id and status from data attributes
                var targetModal = $(this).data('target');
                var status = $(this).data('status');

                // Show the appropriate modal based on the status
                switch (status) {
                    case 'Proccess':
                        $('#myModal' + targetModal + 'Proccess').modal('show');
                        break;
                    case 'Diteruskan ke Unit':
                        $('#myModal' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                        break;
                    case 'Diterima Unit':
                        $('#myModal' + targetModal + 'Diterima-Unit').modal('show'); 
                        break;
                    case 'Ditolak Unit':
                        $('#myModal' + targetModal + 'Ditolak-Unit').modal('show'); 
                        break;
                    case 'Ditolak tahap 2':
                        $('#myModal' + targetModal + 'Ditolak-tahap-2').modal('show'); 
                        break;
                    case 'Lolos seleksi Magang':
                        $('#myModal' + targetModal + 'Lolos-seleksi-Magang').modal('show'); 
                        break;
                    case 'Perubahan Tanggal':
                        $('#myModal' + targetModal + 'Perubahan-Tanggal').modal('show');
                        break;
                    case 'Perubahan Diterima':
                        $('#myModal' + targetModal + 'Perubahan-Diterima').modal('show');
                        break;
                    case 'diterima':
                        $('#myModal' + targetModal + 'diterima').modal('show');
                        break;
                    case 'Ditolak tahap 1':
                        $('#myModal' + targetModal + 'Ditolak-tahap-1').modal('show');
                        break;
                    case 'Peserta mengundurkan diri':
                        $('#myModal' + targetModal + 'Peserta-mengundurkan-diri').modal('show');
                        break;
                    case 'Peserta Magang Aktif':
                        $('#myModal' + targetModal + 'Peserta-Magang-Aktif').modal('show');
                    case 'Peserta selesai magang':
                        $('#myModal' + targetModal + 'Peserta-selesai-magang').modal('show');
                        break;
                    default:
                        console.error('Invalid status');
                }
            });
        });

</script>
    <script>
        $(document).ready(function() {
            // Button click event handler
            $('.btn-show-modal1').click(function() {
                // Get target modal id and status from data attributes
                var targetModal = $(this).data('target');
                var status = $(this).data('status');

                // Show the appropriate modal based on the status
                switch (status) {
                    case 'Proccess':
                        $('#myModal1' + targetModal + 'Proccess').modal('show');
                        break;
                    case 'Diteruskan ke Unit':
                        $('#myModal1' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                        break;
                    case 'Diterima Unit':
                        $('#myModal1' + targetModal + 'Diterima-Unit').modal('show'); 
                        break;
                    case 'Ditolak Unit':
                        $('#myModal1' + targetModal + 'Ditolak-Unit').modal('show'); 
                        break;
                    case 'Ditolak tahap 2':
                        $('#myModal1' + targetModal + 'Ditolak-tahap-2').modal('show'); 
                        break;
                    case 'Lolos seleksi Penelitian':
                        $('#myModal1' + targetModal + 'Lolos-seleksi-Penelitian').modal('show'); 
                        break;
                    case 'Perubahan Tanggal':
                        $('#myModal1' + targetModal + 'Perubahan-Tanggal').modal('show');
                        break;
                    case 'diterima':
                        $('#myModal1' + targetModal + 'diterima').modal('show');
                        break;
                    case 'Ditolak tahap 1':
                        $('#myModal1' + targetModal + 'Ditolak-tahap-1').modal('show');
                        break;
                    case 'Peserta mengundurkan diri':
                        $('#myModal1' + targetModal + 'Peserta-mengundurkan-diri').modal('show');
                        break;
                    case 'Peserta Penelitian Aktif':
                        $('#myModal1' + targetModal + 'Peserta-Penelitian-Aktif').modal('show');
                        break;
                    default:
                        console.error('Invalid status');
                }
            });
        });

</script>
    <script>
        $(document).ready(function() {
            // Button click event handler
            $('.btn-show-modal2').click(function() {
                // Get target modal id and status from data attributes
                var targetModal = $(this).data('target');
                var status = $(this).data('status');

                // Show the appropriate modal based on the status
                switch (status) {
                    case 'Proccess':
                        $('#myModal2' + targetModal + 'Proccess').modal('show');
                        break;
                    case 'Diteruskan ke Unit':
                        $('#myModal2' + targetModal + 'Diteruskan-ke-Unit').modal('show'); 
                        break;
                    case 'Diterima Unit':
                        $('#myModal2' + targetModal + 'Diterima-Unit').modal('show'); 
                        break;
                    case 'Ditolak Unit':
                        $('#myModal2' + targetModal + 'Ditolak-Unit').modal('show'); 
                        break;
                    case 'Ditolak tahap 2':
                        $('#myModal2' + targetModal + 'Ditolak-tahap-2').modal('show'); 
                        break;
                    case 'Lolos seleksi Magang':
                        $('#myModal2' + targetModal + 'Lolos-seleksi-Magang').modal('show'); 
                        break;
                    case 'Perubahan Diterima':
                        $('#myModal2' + targetModal + 'Perubahan-Diterima').modal('show');
                        break;
                    case 'Perubahan Tanggal':
                        $('#myModal2' + targetModal + 'Perubahan-Tanggal').modal('show');
                        break;
                    case 'diterima':
                        $('#myModal2' + targetModal + 'diterima').modal('show');
                        break;
                    case 'Ditolak tahap 1':
                        $('#myModal2' + targetModal + 'Ditolak-tahap-1').modal('show');
                        break;
                    case 'Peserta mengundurkan diri':
                        $('#myModal2' + targetModal + 'Peserta-mengundurkan-diri').modal('show');
                        break;
                    case 'Peserta Magang Aktif':
                        $('#myModal2' + targetModal + 'Peserta-Magang-Aktif').modal('show');
                        break;
                    case 'Peserta selesai magang':
                        $('#myModal2' + targetModal + 'Peserta-selesai-magang').modal('show');
                        break;
                    default:
                        console.error('Invalid status');
                }
            });
        });

</script>
<script>
    $(document).ready(function() {
        $(".lolos-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.lolos') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#lolos-btn-${id}`).text('Magang Diterima');
                        // Menampilkan pesan sukses
                        alert("Selamat Anda Diterima di BPOM!, silahkan lakukan Login ulang");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima magang");
                }
            });
        });
        // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".lolos-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".lolosW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.lolosW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#lolos-btn-${id}`).text('Magang Diterima');
                        // Menampilkan pesan sukses
                        alert("Selamat Anda Diterima di BPOM!, silahkan lakukan Login ulang");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima magang");
                }
            });
        });
         // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".lolosW-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".lolosK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.lolosK') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#lolos-btn-${id}`).text('Magang Diterima');
                        // Menampilkan pesan sukses
                        alert("Selamat Anda Diterima di BPOM!, silahkan lakukan Login ulang");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal menerima");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat menerima magang");
                }
            });
        });
         // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".lolosK-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".terimaajuan-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.terimaajuan') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaajuan-btn-${id}`).text('Pengajuan Diterima');
                        // Menampilkan pesan sukses
                        alert("Perubahan berhasil diterima ke unit");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal mengubah");
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
    $(".terimaajuan-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".terimaajuanW-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.terimaajuanW') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaajuanW-btn-${id}`).text('Pengajuan Diterima');
                        // Menampilkan pesan sukses
                        alert("Perubahan berhasil diterima ke unit");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal mengubah");
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
    $(".terimaajuanW-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".terimaajuanK-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('hasil.terimaajuanK') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#terimaajuanK-btn-${id}`).text('Pengajuan Diterima');
                        // Menampilkan pesan sukses
                        alert("Perubahan berhasil diterima ke unit");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal mengubah");
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
    $(".terimaajuanK-btn").click(function() {
            location.reload();
        });
    });
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.gagal-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.gagal') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".gagal-btn").click(function() {
            location.reload();
        });
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.gagalW-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.gagalW') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".gagalW-btn").click(function() {
            location.reload();
        });
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '.gagalK-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.gagalK') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".gagalK-btn").click(function() {
            location.reload();
        });
});
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '.tolakajuan-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.tolakajuan') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".tolakajuan-btn").click(function() {
            location.reload();
        });
});
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.tolakajuanW-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.tolakajuanW') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".tolakajuanW-btn").click(function() {
            location.reload();
        });
});
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.tolakajuanK-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id'); // Mengambil data-id sebagai atribut
        var keterangan = $(this).closest('.modal-content').find('.textarea').val(); // Mengambil nilai keterangan

        // Permintaan Ajax untuk menolak pendaftaran
        $.ajax({
            type: "POST",
            url: "{{ route('hasil.tolakajuanK') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id, // Menggunakan id sebagai atribut
                keterangan: keterangan // Menggunakan nilai keterangan dari textarea
            },
            success: function(response) {
                if (response.success) {
                    // Menampilkan pesan sukses
                    alert("Penolakan magang berhasil");
                } else {
                    // Menampilkan pesan gagal
                    alert("Gagal menolak magang");
                }
                // Merefresh halaman
                location.reload();
            },
            error: function(xhr, status, error) {
                // Menampilkan pesan error jika terjadi kesalahan
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat menolak magang");
            }
        });
    });
    // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".tolakajuanK-btn").click(function() {
            location.reload();
        });
});
</script>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>