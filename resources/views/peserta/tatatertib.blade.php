<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <title>Tata Tertib PKL/Magang - Badan POM</title>
    {{-- <link href="../assets/demo/tatatertibpeserta.css" rel="stylesheet" /> --}}
    <link href="{{url('assets/demo/tatatertibpeserta.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        {{-- Navbar --}}
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
                                <button class="btn5"><a href="beranda">Beranda</a></button>
                                <div class="dropdown">
                                  <button class="btn7">Magang</button>
                                  <ul class="dropdown-menu">
                                      <li><a href="tatatertib">Tata Tertib PKL/Magang</a></li>
                                      <li><a href="absensi">Absensi</a></li>
                                      <li><a href="assignment">Tugas Akhir</a></li>
                                      <li><a href="sertifikat">Sertifikat</a></li>
                                  </ul>
                                </div>
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
        {{-- Close Navbar --}}
        <div class="container">
            <div class="content">
                <h1>Tata Tertib PKL/Magang PPSDM BPOM</h1>
                <div class="box">
                    <p>
                        <ul class="deskrip">
                            <li>Praktik Kerja Lapangan dilaksanakan sesuai dengan durasi yang ditentukan.</li>
                            <li>Tidak diperkenankan berganti jadwal atau berganti nama tanpa seizin dari Badan
                                POM.</li>
                            <li>Praktik Kerja Lapangan ini bukan merupakan kegiatan penelitian, sehingga data
                                yang diperoleh selama Praktik Kerja Lapangan hanya untuk kepentingan praktik
                                dan tidak untuk dipublikasikan.</li>
                            <li>Setiap peserta Praktik Kerja Lapangan harus menandatangani Surat
                                Pernyataan sebagaimana terlampir (Lampiran I).</li>
                            <li>Setelah menyelesaikan PKL/Magang agar menyampaikan Laporan dan Absensi
                                ke Pusat Pengembangan Sumber Daya Manusia Pengawasan Obat dan
                                Makanan (PPSDM POM) format laporan terlampir (Lampiran II).</li>
                            <li>Setelah menyelesaikan PKL/Magang agar menyampaikan Penilaian peserta
                                PKL/Magang oleh Pembimbing ke Pusat Pengembangan Sumber Daya
                                Manusia Pengawasan Obat dan Makanan (PPSDM POM) format terlampir
                                (Lampiran III).</li>
                            <li>Badan POM tidak menyediakan akomodasi untuk peserta PKL/Magang. </li>
                        </ul>
                    </p>
                    <h4>Untuk kelancaran kegiatan kunjungan dapat menghubungi narahubung PPSDM
                        POM Sdri. Lia Ristiyanti (Hp. 0857-7633-3951) dan dapat juga via email dengan
                        alamat ppsdm@pom.go.id.</h4>
                    <h1>Informasi</h1>
                    <p>
                        <ul class="deskrip">
                            <div class="schedule">
                                <li>Masuk Pukul :</li>
                                <div class="schedule-details">
                                    <p> <b>Senin - Kamis</b>  <br>08.00 - 16.30 <br> <b>Jum'at</b> <br>08.00 - 16.00</p>
                                </div>
                            </div>
                            <li>Lakukan presensi menggunakan finger-print dan melalui website</li>
                            <li>Senin : Navy <br> Selasa : Cream <br> Rabu : Putih <br> Kamis : Batik <br> Jum'at : Batik</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>