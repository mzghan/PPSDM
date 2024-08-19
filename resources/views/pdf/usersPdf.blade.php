<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Magang Badan POM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @page {
            size: A4 landscape;
        }
        body {
            font-family: Lucida Bright, Georgia, serif;
            margin-left: 3cm;
            margin-right: 3cm;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .judul {
        font-family: Lucida Bright,Georgia,serif; 
        text-align: center;
         }

         h1 {
            margin-top: 0;
            margin-bottom: 0;
            font-size: 32px;
         }
        h3 {
            font-family: Lucida Bright,Georgia,serif;   
            margin: 15px 0;
            margin-bottom: 0;
            font-size: 21.5px;
            font-weight: 400;
        }
        h2{
            font-family: Lucida Bright,Georgia,serif;   
            font-size: 21.5px;
            font-weight: 400;
        }
        p{
            margin: 15px 0;
            margin-bottom: 0;
            font-size: 16px;
        }
        .kepala {
            text-decoration: underline;
        }
        .judul img {
            width: 150px;
            height: auto;
        }


        .container {
            display: inline-block;
            text-align: left;
            max-width: 600px;
            margin-left: 13px;
        }

        .column {
            width: 100%;
            margin-left: 15px;
            line-height: 8px;
        }
        .column2 {
            width: 100%;
            align-items: end;
            margin-left: 500px;
            line-height: 8px;
            margin-right: 10px;
            z-index: 1;
        }

        .info {
            margin-bottom: 15px;
        }

        .info span {
            display: inline-block;
            width: 250px; /* Lebar label (Nama, NIM/NIS, dll.) */
            line-height: 8px;
        }
        h4{
            font-weight: 400;
            margin-right: 90px;
            
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            margin-left: -45px;
            margin-bottom: -55px;
            padding: 0;
            height: auto; /* Sesuaikan sesuai kebutuhan */
        }
        .footer-image{
            width: 110%;
            height: auto;
        }
        .cappom {
            position: absolute; /* Menetapkan posisi absolut untuk menempatkan di belakang .ttd */
            bottom: 0; /* Menempatkan .cappom di bagian atas .ttd */
            right: 250; /* Menempatkan .cappom di bagian kiri .ttd */
            max-width: 16.5%;
            z-index: 0; /* Menetapkan z-index lebih rendah untuk .cappom */
        }
        .tanda_tangan {
            width: 70px; /* Lebar maksimum gambar */
            height: 70px; /* Menjaga perbandingan aspek gambar */
            position: relative; /* Menetapkan posisi relatif untuk mengontrol z-index */
            z-index: 999; /* Menetapkan z-index paling depan */
        }


        .content {
            text-align: justify;
            margin-top: 20px;
            flex: 1;
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>

    <div class="judul"> 
        <img src="{{ public_path('assets/img/pom.jpeg') }}">
        <h3>PUSAT PENGEMBANGAN SUMBER DAYA MANUSIA <br> PENGAWASAN OBAT DAN MAKANAN</h3>
        <h1>SERTIFIKAT</h1> 
        <!-- Memastikan $laporan_akhirs tidak kosong sebelum mengakses properti nomor_sertifikat -->
        @if($laporan_akhirs->count() > 0)
            @foreach($laporan_akhirs as $laporan_akhir)
                <h2><span>Nomor</span>: {{ $laporan_akhir->nomor_sertifikat }}</h2>
            @endforeach
        @endif
        <br>

    </div>
    <div class="container">
        <div>
            <h4>Diberikan kepada :</h4>
        </div>
        <!-- Di dalam blade template -->
<div class="column">
    @if($laporan_akhirs->count() > 0)
        @foreach($laporan_akhirs as $laporan_akhir)
            @if($laporan_akhir->user_id === auth()->user()->id)
                <div class="info">
                    <!-- Menggunakan $laporan_akhir untuk menampilkan informasi laporan akhir -->
                    <p><span>Nama</span>: {{ $laporan_akhir->user->name }}</p>
                    <p><span>NIM/NIS</span>: {{ $laporan_akhir->nim }}</p>
                    <p><span>Jurusan</span>: {{ $laporan_akhir->jurusan }}</p>
                    <p><span>Sekolah/Perguruan Tinggi</span>: {{ $laporan_akhir->universitas_sekolah }}</p>
                </div>
            @endif
        @endforeach
    @else
        <p><span>Tidak ada laporan akhir yang tersedia</span></p>
    @endif
</div>


        
    </div>

    <div class="content">
        @if($laporan_akhir && is_object($laporan_akhir))
            <p>
                Telah melaksanakan Praktek Kerja Lapangan / Magang / Internship dari tanggal 
                                  @php
                                      // Pisahkan tanggal mulai dan tanggal selesai
                                      list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $laporan_akhir->durasi);

                                      // Konversi tanggal mulai ke format Indonesia
                                      Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                      $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');

                                      // Konversi tanggal selesai ke format Indonesia
                                      $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');

                                      // Tampilkan hasil
                                      echo "$tanggal_mulai - $tanggal_selesai";
                                  @endphp
                                dengan predikat <strong>{{ $laporan_akhir->hasil_nilai }}</strong> di Unit Kerja {{ str_replace(['[', ']', '"'], '', $laporan_akhir->unit) }}, Badan Pengawas Obat dan Makanan.
            </p>
        @else
            <p><span>Data laporan akhir tidak tersedia</span></p>
        @endif
    </div>

    <br>

    <div class="column2">
    <!-- Menampilkan informasi pengguna -->
    @if($latest_data_inti)
        <div class="ttd">
            <p><span>Jakarta</span>, {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</p>
            <p><span>Kepala Pusat Pengembangan Sumber Daya Manusia</span></p>
            <p><span>Pengawasan Obat dan Makanan</span></p>
            <img src="{{ asset($latest_data_inti->tanda_tangan) }}" class="tanda_tangan">
            <p class="kepala"><span>{{ $latest_data_inti->kepala_unit }}</span></p>
            <p><span>{{ $latest_data_inti->nip }}</span></p>
        </div>
    @endif
    <img src="{{ public_path('assets/img/cappom.png') }}" class="cappom">
</div>
<footer>
    <img src="{{ public_path('assets/img/footer.png') }}" class="footer-image">
</footer>

</body>
</html>