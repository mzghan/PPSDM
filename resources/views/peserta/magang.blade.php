<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <title>PKL/Magang Mandiri - Badan POM</title>
  {{-- <link href="../assets/demo/magangpeserta.css" rel="stylesheet" /> --}}
  <link href="{{url('assets/demo/magangpeserta.css') }}" rel="stylesheet" />
   {{-- Logout --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
   {{-- end --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   {{-- Rich Text --}}
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
    

    <div class="container">
    <button type="button" class="back" data-bs-dismiss="modal">
        <a href="./home" class="btn7">
            <img src="../assets/img/back.png" alt="">
        </a>
    </button>
        <h2>Formulir Pendaftaran PKL/Magang Mandiri </h2>
        <h3>Silahkan isi data pada kolom dibawah :</h3>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form id="registrationForm" method ="POST" action="{{ route('mandiri.store') }}" enctype="multipart/form-data">
        @csrf
            @if (!Auth::check())
            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email" name="email" class="magang" required>
            </div>
            @endif
            <!--<div class="form-group">
                <label for="no_telepon">No Telepon/WhatsApp (Aktif)</label><br>
                <input type="text" name="phone"  class="magang" required>
            </div>-->
            
            <div class="form-group">
                <label for="nik">NIK</label><br>
                <input type="text" name="nik"  class="magang" required pattern="[0-9]{16}">
            </div>
            <div class="form-group">
                <label for="tingkatan">Tingkatan</label><br>
                <select name="tingkatan" class="unit1" id="tingkat_id" required>
                        <option selected disabled value="">Pilih Tingkatan</option>
                        @foreach ($tingkats as $row)
                            <option value="{{$row->nama_tingkat}}">{{$row->nama_tingkat}}</option>
                        @endforeach
                    </select>
                <!-- <input type="text" name="tingakatan"  class="magang" required></input> -->
            </div>
            <div class="form-group">
                <label for="instansi">Universitas/Sekolah</label><br>
                <select name="instansi" class="unit" id="instansi_id" required>
                    <option selected disabled value="">Masukkan Universitas/Sekolah</option>
                    @foreach ($namins as $row)
                        <option value="{{$row->nama_instansi}}">{{$row->nama_instansi}}</option>
                    @endforeach
                </select>
                <!-- <input type="text" name="instansi" id="instansi" class="magang" required> -->
            </div>
            {{-- <div class="form-group">
                <label for="alamat_universitas_sekolah">Alamat Universitas/Sekolah</label><br>
                <input type="text" name="alamat_universitas_sekolah"  class="magang" required>
            </div> --}}
            <div class="form-group">
                <label for="nim">NIM/NIS</label><br>
                <input type="text" name="nim"  class="magang" required pattern="[0-9]{1,20}">
            </div>
            <!-- <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label><br>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="magang" required>
            </div> -->  
            <div class="form-group">
                <label for="jurusan">Jurusan</label><br>
                    <select name="jurusan" class="unit" id="jurusan_id" required>
                        <option selected disabled value="">Masukkan Jurusan</option>
                        @foreach ($prodi as $row)
                            <option value="{{$row->nama_jurusan}}">{{$row->nama_jurusan}}</option>
                        @endforeach
                    </select>
                <!-- <input type="text" name="unit_kerja"  class="magang" required> -->
            </div>
            <div class="form-group">
                <label for="tanggal_magang">Tanggal Magang</label><br>
                <input type="text" id="durasi" name="durasi" class="tanggal" required/>
                {{-- <input type="date" name="waktu_mulai" class="magang" required min="{{ date('Y-m-d') }}"> --}}
            </div>
            <div class="form-group">
                <label for="proposal">Proposal</label><br>
                <input type="file" name="proposal" class="file" accept=".pdf" required max="2048">
            </div>
            <div class="form-group">
                <label for="surat_pendukung">Surat Pendukung</label><br>
                <input type="file" name="surat_pendukung" class="file" accept=".pdf" required max="2048">
            </div>
            <div class="form-group">
                <label for="unit_kerja">Unit Kerja</label><br>
                    <select name="unit" class="unit2" id="" required>
                        <option selected disabled value="">Pilih Unit Kerja</option>
                        @foreach ($data as $row)
                            <option value="{{$row->nama_unit}}">{{$row->nama_unit}}</option>
                        @endforeach
                    </select>
                <!-- <input type="text" name="unit_kerja"  class="magang" required> -->
            </div>
            <div class="form-group">
                <label for="tujuan_magang">Tujuan Magang</label><br>
                <textarea type="text" name="tujuan_magang"  class="freetext" required></textarea>
                {{-- <textarea type="text" name="tujuan_magang"  class="magang" required> --}}
            </div>
            <div class="form-group">
                <label for="ilmu_yang_dicari">Ilmu yang Dicari</label> <br>
                <textarea type="text" name="ilmu_yang_dicari"  class="freetext" required></textarea>
                {{-- <textarea type="text" name="ilmu_yang_dicari"  class="magang" required> --}}
            </div>
            <div class="form-group">
                <label for="output_setelah_magang">Output Setelah Magang</label> <br>
                <textarea type="text" name="output_setelah_magang"  class="freetext" required></textarea>
                {{-- <input type="text" name="output_setelah_magang"  class="magang" required> --}}
            </div>
            
            <div class="form-group">
                <input type="hidden" value="Magang Mandiri" name="jenis"  class="magang" required> 
            </div>
            {{-- <input type="submit" value="Cancel" class="cancel"> --}}
            <input type="submit" value="Daftar" class="submit">

        </form>

    </div>
    {{-- SweetAlert --}}
    {{-- SweetAlert CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    <!-- Script for SweetAlert -->
    <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        // Show SweetAlert with timer
        swal({
            title: "Selamat anda berhasil mendaftar",
            text: "Proses akan dilakukan selama 20 Hari Kerja, silahkan cek Hasil Pendaftaran",
            icon: "success",
            timer: 5000, // Timer dalam milidetik (misalnya 3000 ms = 3 detik)
            buttons: false // Hide the "OK" button
        }).then((value) => {
            // Manual submission of the form after the SweetAlert is closed
            document.getElementById('registrationForm').submit();
        });
    });
</script>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script>
        // Inisialisasi Select2
        $(".unit").select2({
        tags: true
        });
        $(document).ready(function() {
            $('.unit1').select2();
        });
        $(document).ready(function() {
            $('.unit2').select2();
        });
    </script>

<script>
    // Inisialisasi Select2 dengan minimumInputLength dan tags: true
    $(".unit").select2({
        minimumInputLength: 2, // Ubah nilai ini jika ingin minimal karakter lain
        tags: true
    });
</script>

    {{-- Datepicker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        $(function() {
          $('input[name="durasi"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });
        });
        </script>

{{-- end --}}
{{-- 2MB --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Select file input elements
        const proposalInput = document.querySelector('input[name="proposal"]');
        const suratPendukungInput = document.querySelector('input[name="surat_pendukung"]');

        // Add change event listener to the file input elements
        proposalInput.addEventListener('change', function () {
            validateFileSize(proposalInput);
        });

        suratPendukungInput.addEventListener('change', function () {
            validateFileSize(suratPendukungInput);
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
{{-- DropdownOnchange --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tingkat_id').on('change', function(){
            var tingkat = $(this).val();
            if(tingkat === 'Sekolah Menengah Kejuruan') {
                $.get('/get-smk', function(data){
                    $('#instansi_id').empty();
                    $('#instansi_id').append('<option selected disabled value="">Masukkan Instansi</option>'); // Tambahkan default "Masukkan Instansi"
                    $.each(data, function(index, instansi){
                        $('#instansi_id').append('<option value="'+instansi.nama_instansi+'">'+instansi.nama_instansi+'</option>');
                    });
                });
            } else if(tingkat === 'Perguruan Tinggi') {
                $.get('/get-universitas', function(data){
                    $('#instansi_id').empty();
                    $('#instansi_id').append('<option selected disabled value="">Masukkan Instansi</option>'); // Tambahkan default "Masukkan Instansi"
                    $.each(data, function(index, instansi){
                        $('#instansi_id').append('<option value="'+instansi.nama_instansi+'">'+instansi.nama_instansi+'</option>');
                    });
                });
            } else {
                $('#instansi_id').empty();
                $('#instansi_id').append('<option selected disabled value="">Masukkan Instansi</option>');
            }
        });
    });
</script> --}}


{{-- <script>
    $(document).ready(function() {
$('.unit').select2();
$('.unit1').select2();

$('#tingkat_id').on('change', function() {
    var tingkat = $(this).val();

    if (tingkat === 'Perguruan Tinggi') {
        $('#nama_instansi').empty().append('<option selected disabled value=""> Masukkan Instansi </option>');
        $.ajax({
            url: '/get-universitas',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                populateDropdown(data);
            }
        });
    } else if (tingkat === 'Sekolah Menengah Kejuruan') {
        $('#nama_instansi').empty().append('<option selected disabled value=""> Masukkan Instansi </option>');
        $.ajax({
            url: '/get-smk',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                populateDropdown(data);
            }
        });
    } else {
        $('#nama_instansi').empty().append('<option selected disabled value=""> Pilih Tingkatan terlebih dahulu </option>');
        $('#nama_instansi').empty();
    }
});

// Fungsi untuk mengisi dropdown dengan opsi-opsi dari data
function populateDropdown(data) {
    $.each(data, function(key, value) {
        $('select[name="instansi"]').append(
            '<option value="' + value.id + '">' + value.nama_instansi + '</option>'
        );
    });
}

// Menambahkan event listener untuk input instansi
$('#nama_instansi').on('change', function() {
    var instansi = $(this).val();

    // Memeriksa apakah instansi adalah Universitas/Institut atau SMK/Sekolah Menengah Kejuruan
    var isUniversitas = (instansi.toLowerCase().includes('universitas') || instansi.toLowerCase().includes('institut'));
    var isSMK = (instansi.toLowerCase().includes('smk') || instansi.toLowerCase().includes('sekolah menengah kejuruan'));

    // Menetapkan nilai pilihan tingkatan berdasarkan jenis instansi
    if (isUniversitas) {
        $('#tingkat_id').val('Perguruan Tinggi').trigger('change');
    } else if (isSMK) {
        $('#tingkat_id').val('Sekolah Menengah Kejuruan').trigger('change');
    }
});
});
</script> --}}
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
    {{-- JS Jumper --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script>
        function navigateToPage() {
        window.location.href = 'home';
        }
  </script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>