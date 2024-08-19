<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="../assets/demo/sertifikat.css" rel="stylesheet" /> --}}
    <link href="{{url('assets/demo/sertifikat.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <title>Sertifikat - Badan POM</title>
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
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="container text-center">
                        <div class="row align-items-start">
                            <div class="col">
                                <h3>Sertifikat PKL/Magang Badan POM</h3>
                                <div class="nosertif-container">
                                @if($laporan_akhir)
                                    @if($laporan_akhir->status == 'Laporan Diterima')
                                        @if($evaluasi)
                                            <h5 class="nosertif">Selamat Anda Telah menyelesaikan Magang</h5>
                                            @if($laporan_akhir && $laporan_akhir->nomor_sertifikat)
                                                <button class="unduh">
                                                    <a href="{{ route('download-pdf', ['laporan_id' => $laporan_akhir->id]) }}">Unduh Sertifikat</a>
                                                </button>
                                                <div class="selgang">
                                                <button type="button" class="btn btn-primary  showModalBtn" data-bs-toggle="modal" data-bs-target="#myModal" style="width: auto; height: auto;">Selesai Magang</button>
                                                </div>
                                               
                                            @else
                                                <h3>Sertifikat Anda Sedang Diproses. </h3>
                                            @endif


                                        @else
                                            <h5 class="nosertif">Selamat Anda Telah menyelesaikan Magang</h5>
                                            <button  type="button" class="btn btn-primary btn-round showModalBtn1" data-bs-toggle="modal" data-bs-target="#myModal1">Survey</button>
                                        @endif
                                    @else
                                        <p>Harap kumpulkan laporan akhir terlebih dahulu.</p>
                                    @endif
                                @else
                                    <p>Belum ada laporan akhir yang dikumpulkan.</p>
                                @endif

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modifikasi modal popup -->
<div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemberitahuan <br> {{ Auth::user()->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin sudah menyelesaikan magang di <b>PPSDM BPOM</b>? Silahkan unduh sertifikat terlebih dahulu.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tambahkan event click pada tombol "Konfirmasi Selesai" -->
                @if($laporan_akhir)
                <button class="selesai-btn" data-id="{{ $laporan_akhir->id }}">Konfirmasi</button>
                @else
                    <p>Belum ada laporan akhir yang dikumpulkan.</p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- Modifikasi modal popup -->
<div class="modal" tabindex="-1" id="myModal1">
    <div class="modal-dialog  modal-lg">
        <<div class="modal-content">
            <div class="modal-header">
                @if($laporan_akhir)
                    <h5 class="modal-title">Evaluasi Tenaga Kerja <br> {{$laporan_akhir->pegawai}} </h5>
                @else
                    <h5 class="modal-title">Data Laporan Akhir Tidak Tersedia</h5>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('evaluasi.store') }}">
                    @csrf
                <table id="evaluasi-table" class="table">
                    <thead>
                         <p class="table-caption ml-3">Silahkan isi survey 1 (sangat kurang) - 2 (Kurang) - 3 (Netral) - 4 (Baik) - 5 (Sangat Baik)</p>

                        <tr>
                            <th>No.</th>
                            <th>Evaluasi</th>
                            <th>Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="number">1</td>
                            <td>Penguasaan dan pemahaman materi yang disampaikan kepada peserta yang disampaikan dalam Praktik Kerja Lapangan</td>
                            <td><input type="number" name="nilai1" class="form-control nilai-input" min="1" max="5" required></td>
                        </tr>
                        <tr>
                            <td class="number">2</td>
                            <td>Interaksi fasilitator / pembimbing dengan peserta Praktik Kerja Lapangan</td>
                            <td><input type="number" name="nilai2" class="form-control nilai-input" min="1" max="5" required></td>
                        </tr>
                        <tr>
                            <td class="number">3</td>
                            <td>Suasana pembelajaran yang diciptakan oleh fasilitator / pembimbing selama Praktik Kerja Lapangan</td>
                            <td><input type="number" name="nilai3" class="form-control nilai-input" min="1" max="5" required></td>
                        </tr>
                        <tr>
                            <td class="number">4</td>
                            <td>Kesesuaian dan kebermanfaatan materi yang diberikan oleh widyaiswara/ narasumber/ fasilitator</td>
                            <td><input type="number" name="nilai4" class="form-control nilai-input" min="1" max="5" required></td>
                        </tr>
                        <tr>
                            <td class="number">5</td>
                            <td>Pemberian motivasi oleh widyaiswara/ narasumber/ fasilitator kepada peserta</td>
                            <td><input type="number" name="nilai5" class="form-control nilai-input" min="1" max="5" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label for="saran">Adakah saran/masukan terkait fasilitator / pembimbing selama pelaksanaan 
                                Praktik Kerja Lapangan? ya/tidak? </label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><td><textarea type="text" id="saran" name="saran"  class="freetext" required></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><label for="masukan">Jika Ya, masukan apa yang dapat saudara/i usulkan? </label></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><td><textarea type="text" id="masukan" name="masukan"  class="freetext" required></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <!-- Tambahkan event click pada tombol "Konfirmasi Selesai" -->
                    <input type="submit" class="submit"></input>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

{{-- nilai input --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const evaluasiTable = document.getElementById('evaluasi-table');
        const nilaiInputs = evaluasiTable.querySelectorAll('.nilai-input');

        // Iterasi melalui setiap input dan tambahkan event listener
        nilaiInputs.forEach(function (input) {
            input.addEventListener('input', function () {
                const nilai = parseFloat(input.value);
                if (nilai === 0) {
                    alert('Nilai tidak boleh 0');
                    input.value = ''; // Membersihkan input jika nilai 0
                } else if (nilai > 5) {
                    alert('Nilai maksimal adalah 5');
                    input.value = ''; // Membersihkan input jika nilai lebih dari 5
                }
            });
        });
    });
</script>

<!-- JavaScript untuk AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".selesai-btn").click(function(e) {
            e.preventDefault();
            var id = $(this).data('id'); // Mengambil data-id sebagai atribut

            // Permintaan Ajax untuk menerima pendaftaran
            $.ajax({
                type: "POST",
                url: "{{ route('magang.selesai') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id, // Menggunakan id sebagai atribut
                },
                success: function(response) {
                    if (response.success) {
                        // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                        $(`#selesai-btn-${id}`).text('Magang Diterima');
                        // Menampilkan pesan sukses
                        alert("Selamat Anda telah menyelesaikan Magang di BPOM! Terimakasih");
                    } else {
                        // Menampilkan pesan gagal
                        alert("Gagal selesai");
                    }
                },
                error: function(xhr, status, error) {
                    // Menampilkan pesan error jika terjadi kesalahan
                    console.error(xhr.responseText);
                    alert("Terjadi kesalahan saat selesai magang");
                }
            });
        });
        // Fungsi untuk merefresh halaman saat tombol "Terima" atau "Tolak" diklik
    $(".selesai-btn").click(function() {
            location.reload();
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>