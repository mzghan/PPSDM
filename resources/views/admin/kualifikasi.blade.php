<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ppsdm.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Kriteria - Admin BPOM
  </title>
  <!-- JS POP UP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Close JS POP UP -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/kriteriaadmin.css" rel="stylesheet" />
  <style>
    html, body {
        overflow-x: hidden; /* Menghilangkan scroll bar horizontal */
    }
</style>
</head>


<body class="">
  <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Logo -->
          <div class="logo">
              <a class="simple-text logo-medium">
                  <div class="logo-image-medium">
                      <img src="../assets/img/logo-small.png">
                  </div>
              </a>
          </div>

          <!-- Sidebar Content -->
          <div class="sidebar-wrapper" style="overflow-y: hidden;">
              <ul class="nav" id="myNav">
                  <!-- Menu Items -->
                  <!-- Home -->
                  <li>
                      <a href="./homepage">
                          <i class="nc-icon nc-bank"></i>
                          <p>Home</p>
                      </a>
                  </li>
                  <!-- Lowongan -->
                  <li class="active">
                      <a href="./kualifikasi">
                          <i class="nc-icon nc-bullet-list-67"></i>
                          <p>Lowongan
                              <!-- Notifikasi -->
                              @if(Session::has('newKriteriaCount') && Session::get('newKriteriaCount') > 0)
                              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newKriteriaCount') }}</span>
                              @endif
                          </p>
                      </a>
                  </li>
                  <!-- Laporan -->
                  <li>
                      <a href="./administrator">
                          <i class="nc-icon nc-single-copy-04"></i>
                          <p>Laporan
                              <!-- Notifikasi -->
                              @if(Session::has('newLaporanAkhirCount') && Session::get('newLaporanAkhirCount') > 0)
                              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newLaporanAkhirCount') }}</span>
                              @endif
                          </p>
                      </a>
                  </li>
                  <!-- Dropdown Menu -->
                  <li class="dropdown">
                      <a href="javascript:void(0);" class="dropbtn">
                          <i class="nc-icon nc-refresh-69 "></i>
                          <p>Administrator
                              <!-- Notifikasi -->
                              @if(Session::has('newProccessCount') && Session::get('newProccessCount') > 0)
                              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newProccessCount') }}</span>
                              @endif
                          </p>
                      </a>
                      <!-- Dropdown Content -->
                      <div class="dropdown-content">
                          <a href="./pilihan">Administrator</a>
                          <a href="./peserta">Data Peserta</a>
                          <a href="./pegawai">Role Pegawai</a>
                          <a href="./data">Input NIP</a>
                      </div>
                  </li>
                  <!-- Seleksi -->
                  <li>
                      <a href="./seleksiakhir">
                          <i class="nc-icon nc-single-02"></i>
                          <p>Seleksi
                              <!-- Notifikasi -->
                              @if(Session::has('newSeleksiCount') && Session::get('newSeleksiCount') > 0)
                              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newSeleksiCount') }}</span>
                              @endif
                          </p>
                      </a>
                  </li>
              </ul>
              <!-- Hero Image -->
              <div class="hero">
                  <a class="hero">
                      <div class="hero-image-medium">
                          <img src="../assets/img/hero.png">
                      </div>
                  </a>
              </div>
              <div class="hero"></div>
          </div>
      </div>
      <!-- End Sidebar -->

      <!-- Main Content -->
      <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
              <!-- Container -->
              <div class="container-fluid">
                  <div class="navbar-wrapper">
                      <div class="navbar-toggle">
                          <button type="button" class="navbar-toggler">
                              <span class="navbar-toggler-bar bar1"></span>
                              <span class="navbar-toggler-bar bar2"></span>
                              <span class="navbar-toggler-bar bar3"></span>
                          </button>
                      </div>
                      <a class="navbar-brand" href="javascript:;">Kriteria</a>
                  </div>
                  <!-- Navigation -->
                  <div class="collapse navbar-collapse justify-content-end" id="navigation">
                      <ul class="navbar-nav">
                          <!-- Logout -->
                          <li class="logout">
                              <a href="{{ url('/logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- End Navbar -->

          <!-- Content -->
          <div class="content">
              <!-- Page Header -->
              <div class="container text-center">
                  <div class="row align-items-start">
                      <div class="col">
                          <h3>Lowongan Seleksi Unit</h3>
                      </div>
                  </div>
              </div>
              <!-- Data Pendaftaran -->
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Data Pendaftaran</h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive" style="overflow-x: hidden;">
                          <table class="table">
                              <thead>
                                  <th>No.</th>
                                  <th>Unit Kerja</th>
                                  <th>Posisi Lowongan</th>
                                  <th>Tingkatan</th>
                                  <th>Jurusan</th>
                                  <th class="text-center">Berkas</th>
                              </thead>
                              <tbody>
                                  <!-- Iterasi untuk Data Kriteria -->
                                  @if($kriterias->isEmpty())
                                    <tr>
                                        <td colspan="6">Lowongan belum diajukan Unit</td>
                                    </tr>
                                @else
                                    @foreach($kriterias as $kriteria)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="desk">{{ $kriteria->unit }}</td>
                                            <td class="desk">{{ $kriteria->posisi }}</td>
                                            <td class="desk">{{ $kriteria->tingkatan }}</td>
                                            <td class="desk1">{{ $kriteria->jurusan }}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-primary btn-round showModalBtn" data-bs-toggle="modal" data-target="#myModal{{ $loop->iteration }}">Cek Kriteria</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <!--start content-->
       @foreach($kriterias as $kriteria)
       <div class="row">
                     <!--start modal-->
                   <div class="modal" tabindex="-1"id="myModal{{ $loop->iteration }}">
                       <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" >{{$kriteria->posisi}} <br> {{$kriteria->unit}}</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                         <div class="grid-container">
                                             <div class="box">
                                                 <h2>Informasi Lowongan</h2>
                                                 <p>Nama Lowongan : {{$kriteria->posisi}} </p>
                                                 <p>Tingkatan : {{$kriteria->tingkatan}}</p>
                                                 <p>Jurusan : {{$kriteria->jurusan}}</p>
                                             </div>
                                             <div class="box" style="width: 95%">
                                                 <h2>Informasi Durasi</h2>
                                                 <p>Timeline Lowongan : 
                                                 @php
                                                       // Pisahkan tanggal mulai dan tanggal selesai
                                                       list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $kriteria->timeline);
 
                                                       // Konversi tanggal mulai ke format Indonesia
                                                       Carbon\Carbon::setLocale('id'); // Atur locale ke Bahasa Indonesia
                                                       $tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai)->translatedFormat('d F Y');
 
                                                       // Konversi tanggal selesai ke format Indonesia
                                                       $tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai)->translatedFormat('d F Y');
 
                                                       // Tampilkan hasil
                                                       echo "$tanggal_mulai - $tanggal_selesai";
                                                   @endphp
                                                 </p>
                                                 <p>Durasi Magang : 
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
                                             <div class="box">
                                                 <h2>Deskripsi Lowongan</h2>
                                                 <p>{{ strip_tags($kriteria->desk_pekerjaan) }}</p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn1" data-bs-toggle="modal" id="showModalTolak{{ $loop->iteration }}">Tolak</button>
                                       <button class="terima-btn" data-id="{{ $kriteria->id }}">Terima</button>
                                     </div>        
                               </div>
                           </div>
                         </div>
 
                          <!-- start modal -->
                          <div class="modal text-center" tabindex="-1" id="myModalTolak{{ $loop->iteration }}">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title ">Penolakan Lowongan</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                     <box class="box" style="width: 97%">
                                         <h2 class="m-2">Berikan Keterangan mengapa Lowongan Ditolak</h2>
                                         <img src="../assets/img/Error.png" alt="">
                                         <div class="form-group m-3">
                                             <label>keterangan</label>
                                             <textarea class="form-control textarea" placeholder="Isilah dengan jelas."></textarea>
                                         </div>
                                     </box>
                                     <div class="modal-footer">
                                     <button class="tolak-btn" data-id="{{ $kriteria->id }}">Tolak</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- end modal -->
                     @endforeach
              </div>
              </div>
          <!-- End Content -->
      </div>
      <!-- End Main Content -->
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
  </div>


  <!-- End Wrapper -->
<!-- Script jQuery dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
 // Fungsi untuk menampilkan modal forward
// Fungsi untuk menampilkan modal forward
$('.showModalBtn').click(function() {
    var id = $(this).data('target'); // Mengambil ID modal dari data-target
    $(id).modal('show');
});

</script>
<!-- Script untuk inisialisasi Select2 -->
<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan modal tolak
        $('[id^=showModalTolak]').click(function() {
            var id = $(this).attr('id').replace('showModalTolak', '');
            $('#myModalTolak' + id).modal('show');
        });
    });
</script>

{{-- Start --}}
<!-- Script untuk menampilkan modal -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Script untuk menangani permintaan Ajax -->
<script>
$(document).on("click", ".terima-btn", function(e) {
    e.preventDefault();
    var id = $(this).data('id'); // Mengambil data-id sebagai atribut

    // Permintaan Ajax untuk menerima pendaftaran
    $.ajax({
        type: "POST",
        url: "{{ route('kualifikasi.terima') }}",
        data: {
            _token: "{{ csrf_token() }}",
            id: id // Menggunakan id sebagai atribut
        },
        success: function(response) {
            if (response.success) {
                // Mengubah teks tombol menjadi "Diterima" setelah berhasil
                $(this).text('Diterima');
                // Menampilkan pesan sukses
                alert("Pengajuan unit diterima");
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

</script>

<!-- Script untuk menangani permintaan Ajax -->
<script>
$(document).on("click", ".tolak-btn", function(e) {
    e.preventDefault();
    var id = $(this).data('id'); // Mengambil data-id sebagai atribut
    var keterangan = $('.textarea').val();

    // Permintaan Ajax untuk menolak pendaftaran
    $.ajax({
        type: "POST",
        url: "{{ route('kualifikasi.tolak') }}",
        data: {
            _token: "{{ csrf_token() }}",
            id: id, // Menggunakan id sebagai atribut
            keterangan: keterangan // Menggunakan nilai keterangan dari textarea
        },
        success: function(response) {
            if (response.success) {
                // Mengubah teks tombol menjadi "Pengajuan Ditolak" setelah berhasil
                $(this).text('Pengajuan Ditolak');
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
$(".tolak-btn").click(function() {
      location.reload();
  });

</script>
{{-- End --}}



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
  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
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
</body>

</html>