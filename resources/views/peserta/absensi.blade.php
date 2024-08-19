<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <!-- JS POP UP -->
    <title>Absensi - Badan POM</title>
    {{-- CSS --}}
    <link href="{{url('assets/demo/absensipeserta.css') }}" rel="stylesheet" />
    {{-- Rich Text --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline
        {
            height: 150px;
        }
        .ck.ck-powered-by {
          display: none !important;
      }
    </style>
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
    {{-- Start Absensi --}}
    <div class="container">
        <button type="button" class="back" data-bs-dismiss="modal">
            <a href="./beranda" class="btn">
                <img src="../assets/img/back.png" alt="">
            </a>
        </button>
        
        <h4>Kehadiran dan Laporan Progress Magang</h4>
        <p>Silahkan isi absensi dan keterangan kehadiran</p>
        <p class="peringatan"><b>( Absensi dilakukan pada jam 08.00 hingga 16.30 dan absensi hanya bisa dilakukan sekali di hari kerja )</b></p>
        <button class="absensi" id="absensiButton" style="margin-left: 150px"><a id="absensi">Presensi</a>
        </button>
        <form action="{{ route('absensi.store') }}" method="POST" id="formulir">
            @csrf
        <table>
            {{-- <tr class="form-group">
                <td for="form" class="formulir">Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap" id="nama_lengkap" class="magang" required></td>
            </tr> --}}
            {{-- <tr class="form-group">
                <td for="form" class="formulir">Tanggal</td>
                <td><input type="date" name="tanggal" id="tanggal" class="magang" required></td>
            </tr> --}}
            <tr class="form-group">
                <td for="form" class="formulir">Presensi</td>
                    <td><select name="presensi" id="presensi" class="magang" required>
                        <option value="">Pilih Presensi</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                    </select></td>
            </tr>
            {{-- <tr class="form-group">
                <td for="form" class="formulir">Jam Hadir</td>
                <td><input type="time" name="jam_hadir" id="jam_hadir" class="magang" required></td>
            </tr> --}}
            <tr class="form-group">
                <td for="form" class="formulir">Keterangan</td>
                <td><textarea name="keterangan" class="keterangan" required></textarea></td>
            </tr>
        </table>
            <input type="submit" value="Submit" class="submit">
            <input type="button" value="Cancel" class="cancel" id="cancelButton">
        </form>
    </div>
    {{-- Close Absensi --}}

    {{-- Start Tabel --}}
    @if(session('error'))
    <div id="errorAlert" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal</th>
                    <th>Presensi</th>
                    <th>Jam Hadir</th>
                    <th class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kehadirans as $kehadiran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>Farsya Hawariyin</td>
                    <td>22 Januari 2024</td>
                    <td>Hadir</td>
                    <td>08.00</td> --}}
                    <td>{{$kehadiran->name}}</td>
                    <td>
                        @if(isset($kehadiran->tanggal))
                            <?php
                            // Membuat objek DateTime dari string tanggal
                            $tanggalObj = new DateTime($kehadiran->tanggal);

                            // Mendapatkan tanggal, bulan, dan tahun dalam format yang diinginkan
                            $tanggal = $tanggalObj->format('j'); // 'j' untuk mendapatkan tanggal tanpa nol di depan (1-31)
                            $bulan = $tanggalObj->format('n'); // 'n' untuk mendapatkan bulan tanpa nol di depan (1-12)
                            $tahun = $tanggalObj->format('Y'); // 'Y' untuk mendapatkan tahun dalam format empat digit

                            // Array nama bulan dalam bahasa Indonesia
                            $bulanIndonesia = [
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember'
                            ];

                            // Mendapatkan nama bulan dalam bahasa Indonesia
                            $namaBulan = $bulanIndonesia[$bulan];
                            ?>
                            <p>{{ $tanggal }} {{ $namaBulan }} {{ $tahun }}</p>
                        @else
                            <p>Tanggal tidak tersedia</p>
                        @endif
                    </td>

                    <td>{{$kehadiran->presensi}}</td>
                    <td>{{ $kehadiran->jam_hadir }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-round showModalBtn" data-bs-toggle="modal" data-bs-target="#myModal{{ $loop->iteration }}">Lihat</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      <!--end content-->

            <!-- Modal POP UP -->
            @foreach($kehadirans as $kehadiran)
            <div class="modal" tabindex="-1" id="myModal{{ $loop->iteration }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Logbook <br> {{$kehadiran->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <box class="box">
                            <h2>Deskripsi :</h2>
                            <p>{{$kehadiran->keterangan}}</p>
                        </box>
                    </div>
                </div>
            </div>
            @endforeach


    {{-- Tampil --}}
    <script>
        // Mendapatkan elemen tombol "Cancel" dan formulir
        var cancelButton = document.getElementById('cancelButton');
        var formulir = document.getElementById('formulir');
        
        // Menambahkan event listener untuk klik pada tombol "Cancel"
        cancelButton.addEventListener('click', function () {
            // Panggil fungsi untuk menutup absensi
            closeAbsensi();
        });
        
        // Fungsi untuk menutup absensi
        function closeAbsensi() {
            formulir.style.opacity = '0'; // Mengubah opacity menjadi 0
            formulir.style.height = '0'; // Mengubah tinggi menjadi 0
            formulir.setAttribute('aria-hidden', 'true'); // Menetapkan atribut aria-hidden menjadi true
        }
    </script>

    {{-- nampil 5 detik --}}
    <script>
        // Fungsi untuk menyembunyikan pesan error setelah beberapa detik
        setTimeout(function(){
            var errorAlert = document.getElementById('errorAlert');
            if(errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000); // Mengatur waktu 5 detik (5000 milidetik)
    </script>
    {{-- end --}}

    <script>
        // Mendapatkan elemen tombol dan formulir
        var absensiButton = document.getElementById('absensiButton');
        var formulir = document.getElementById('formulir');
        
        // Menambahkan event listener untuk klik pada tombol absensi
        absensiButton.addEventListener('click', function () {
            var isHidden = formulir.getAttribute('aria-hidden') === 'true';
        
            if (isHidden) {
                formulir.style.opacity = '1';
                formulir.style.height = 'auto';
            } else {
                formulir.style.opacity = '0';
                formulir.style.height = '0';
            }
        
            formulir.setAttribute('aria-hidden', isHidden ? 'false' : 'true');
        });
        
        // Sembunyikan formulir saat halaman dimuat
        window.onload = function () {
            formulir.style.opacity = '0';
            formulir.style.height = '0';
            formulir.setAttribute('aria-hidden', 'true');
        };
            </script>
            {{-- Close Tampil --}}
        

    <!-- Script untuk menampilkan modal -->
    <script>
        $(document).ready(function() {
            $('.showModalBtn').click(function() {
                var targetModalId = $(this).data('bs-target');
                $(targetModalId).modal('show');
            });
        });
    </script>
    {{-- Close Modal --}}
    <!-- Script jQuery dan Bootstrap JS POP UP -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Close JS Pop Up --}}
    {{-- Rich Text --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote']
                },
                image: {
                    upload: false,
                    toolbar: ['imageTextAlternative']
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- Close Rice Text --}}
    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>