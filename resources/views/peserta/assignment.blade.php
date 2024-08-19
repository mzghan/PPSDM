<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tugas Akhir - Badan POM</title>
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    {{-- <link href="../assets/demo/assignmentpeserta.css" rel="stylesheet" /> --}}
    <link href="{{url('assets/demo/assignmentpeserta.css') }}" rel="stylesheet" />
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
                                    <button class="btn5"><a href="beranda">Beranda</a></button>
                                    <div class="dropdown">
                                      <button class="btn6">Magang</button>
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
          <!-- End Navbar -->
          <div class="container">
            <button type="button" class="back" data-bs-dismiss="modal">
                <a href="./beranda" class="btn">
                    <img src="../assets/img/back.png" alt="">
                </a>
            </button>
            <h2>Submit Laporan PKL/ Penelitian</h2>
                  <!-- start content-->
                  <main class="akhir">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                <form id="laporanForm" action="{{ route('laporan.submit') }}" method="POST" enctype="multipart/form-data" data-id="{{ $laporan_akhir ? $laporan_akhir->id : '' }}">
                                    @csrf
                                    <!-- Isi formulir untuk pengumpulan laporan -->
                                    <input type="hidden" name="action" value="submit">
                                        <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Status Pengumpulan</td>
                                                <td>
                                                    @isset($laporan_akhir)
                                                        @if($laporan_akhir->status_pengumpulan == 'belum dikumpulkan')
                                                            Belum dikumpulkan
                                                        @else
                                                            Sudah dikumpulkan
                                                        @endif
                                                    @else
                                                        No attempt
                                                    @endisset
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status Penilaian</td>
                                                <td>
                                                @isset($laporan_akhir)
                                                    @if($laporan_akhir && $laporan_akhir->status === 'Laporan Diterima')
                                                        Verifikasi nilai oleh Admin
                                                    @else
                                                        @if($laporan_akhir->status == 'Revisi')
                                                            Revisi ({{$laporan_akhir->keterangan}})
                                                        @else
                                                            Verifikasi Laporan
                                                        @endif
                                                    @endif
                                                @else
                                                    Belum Dinilai
                                                @endisset
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>Batas Waktu Pengumpulan</td>
                                                <td>
                                                @php
                                                    // Pisahkan tanggal mulai dan tanggal selesai
                                                    list($tanggal_mulai, $tanggal_selesai) = explode(' - ',$durasi);

                                                    // Konversi tanggal mulai ke format Indonesia
                                                    Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                                    $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                                    // Konversi tanggal selesai ke format Indonesia
                                                    $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                                    // Tampilkan hasil
                                                    echo "$tanggal_mulai - $tanggal_selesai";
                                                @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Terakhir diubah</td>
                                                <td>
                                                    @isset($laporan_akhir)
                                                        @if($laporan_akhir->terakhir_diubah == '-')
                                                            -
                                                        @else
                                                            {{$laporan_akhir->terakhir_diubah}}
                                                        @endif
                                                    @else
                                                        -
                                                    @endisset
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>Pengumpulan Laporan :</td>
                                            <td>
                                                @isset($laporan_akhir)
                                                    @if($laporan_akhir->status !== 'Revisi')
                                                        @if(!$laporan_akhir->pengumpulan_laporan)
                                                            <input type="file" name="pengumpulan_laporan" id="pengumpulan_laporan" class="file" accept=".pdf" required max="2048">
                                                        @else
                                                            File telah diunggah
                                                            <a href="{{ route('file.download', ['filename' => $laporan_akhir->pengumpulan_laporan]) }}" class="btn btn-primary">Review Laporan</a>
                                                        @endif
                                                    @else
                                                         <input type="file" name="pengumpulan_laporan" id="pengumpulan_laporan" class="file" accept=".pdf" required max="2048">
                                                    @endif
                                                @else
                                                    <input type="file" name="pengumpulan_laporan" id="pengumpulan_laporan" class="file" accept=".pdf" required max="2048">
                                                @endisset
                                            </td>

                                            </tr>
                                        </tbody>
                                    </table>     
                                    <div class="button">
                                        @isset($laporan_akhir)
                                            @if($laporan_akhir->status !== 'Revisi')
                                                @if(!$laporan_akhir->pengumpulan_laporan)
                                                    <button type="submit" class="submitK-btn">Submit</button>
                                                @endif
                                            @else
                                                <!-- Button Submit muncul lagi karena status adalah Revisi -->
                                                <button type="submit" class="submitK-btn">Submit</button>
                                            @endif
                                        @else
                                            <button type="submit" class="submitK-btn">Submit</button>
                                        @endisset
                                    </div>


                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
    <!--end content-->
</div>
    {{-- JS Downlaod dan GoBack --}}
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
     <script>
$(document).ready(function() {
    $("button.submitK-btn").click(function(e) {
        e.preventDefault(); // Mencegah pengiriman formulir default
        var id = $("#submitForm").data('id'); // Mendapatkan ID laporan akhir dari form
        var formData = new FormData($("#submitForm")[0]);
        formData.append('id', id); // Menambahkan ID laporan akhir ke formData

        $.ajax({
            type: "POST",
            url: "{{ route('pengumpulan.submitK') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    alert("Selamat, laporan akhir Anda berhasil disubmit!");
                    $("button.submitK-btn").text('Laporan disubmit');
                } else {
                    alert("Gagal mengirim laporan");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengirim laporan");
            }
        });
    });
});

</script>
    {{-- Close --}}
        {{-- 2MB --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select file input elements
        const pengumpulan_laporanInput = document.querySelector('input[name="pengumpulan_laporan"]');

        // Add change event listener to the file input elements
        pengumpulan_laporanInput.addEventListener('change', function () {
            validateFileSize(pengumpulan_laporanInput);
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
{{-- End --}}
</body>
</html>