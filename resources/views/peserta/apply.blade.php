<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <title>Deksripsi Pekerjaan - Badan POM</title>
    <!-- JS POP UP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    {{-- <link href="../assets/demo/applypeserta.css" rel="stylesheet" /> --}}
    <link href="{{url('assets/demo/applypeserta.css') }}" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
  <div class="container">
    {{-- Mengecek apakah ada data dalam $kriterias --}}
    @if($kriterias->isNotEmpty())
        {{-- Mengambil satu baris data --}}
        {{-- @php $kriteria = $kriterias->first(); @endphp --}}

        <div class="posisi_data">
            <button type="button" class="back" onclick="goBack()"><img src="../assets/img/back.png" alt=""></button>
            <div class="row">
                <div class="col-md-8">
                    <h1>{{$kriteria->posisi}}</h1>
                    <h3>{{$kriteria->unit}}</h3>
                    <h4>Deskripsi Pekerjaan</h4>
                    <div class="deskripsi">
                        {!! $kriteria->desk_pekerjaan !!}
                    </div>

                </div>
                <div class="col-md-4">
                    <h4>Daftar Magang</h4>
                    <div class="deskripsi">
                        <p>Perhatikan kriteria yang dibutuhkan dan deskripsi pekerjaan sesuai dengan Anda sebelum mendaftar!</p>
                        <input type="submit" value="Daftar" class="submit" onclick="navigateToPage()">
                    </div>
                    <div class="informasi">
                        <h4>Informasi Pekerjaan</h4>
                        <div class="jobdesk">
                            <h6>Program Studi Utama</h6>
                            @php
                                $jurusanArray = explode(',', $kriteria->jurusan);
                            @endphp
                            @foreach($jurusanArray as $jurusan)
                                <p>{{ $jurusan }}</p>
                            @endforeach
                            <h6>Tingkatan</h6>
                            <p>{{$kriteria->tingkatan}}</p>
                            <h6>Tanggal Mulai Magang - Selesai Magang</h6>
                            <p>
                            @php
                                      // Pisahkan tanggal mulai dan tanggal selesai
                                      list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $kriteria->durasi);

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
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Pesan ketika tidak ada data --}}
        <p>Tidak ada data kriteria.</p>
    @endif
</div>

<script>
        function showPosition(position) {
            var posisiData = document.querySelectorAll('.posisi_data');
            for (var i = 0; i < posisiData.length; i++) {
                var posisi = posisiData[i].getAttribute('data-posisi');
                if (posisi === position) {
                    posisiData[i].style.display = "block";
                } else {
                    posisiData[i].style.display = "none";
                }
            }
        }
    </script>
    <!-- JS Script Back -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    {{-- JS Jumper --}}
    <script>
        function navigateToPage() {
        window.location.href = 'daftar';
        }
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
