
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Unit Kerja
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/kriteriaUnit.css" rel="stylesheet" />
  {{-- Jquery --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar">
      <div class="logo">
        <a class="simple-text logo-medium">
          <div class="logo-image-medium">
            <img src="../assets/img/logo-small.png">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper"  style="overflow-y: hidden;">
      <ul class="nav" id="myNav">
          <li>
            <a href="./dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="active">
            <a href="./kriteria">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Lowongan</p>
            </a>
          </li>
          <li>
            <a href="./laporan">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Hasil Laporan
                @if(Session::has('newLaporanCount') && Session::get('newLaporanCount') > 0)
                <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newLaporanCount') }}</span>
              @endif
              </p>
            </a>
          </li>
          <li>
            <a href="./peserta">
              <i class="nc-icon nc-badge"></i>
              <p>Kehadiran</p>
            </a>
          </li>
          <li>
            <a href="./seleksi">
              <i class="nc-icon nc-single-02"></i>
              <p>Seleksi
                @if(Session::has('newSeleksiUnitCount') && Session::get('newSeleksiUnitCount') > 0)
                    <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newSeleksiCount') }}</span>
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
            <a class="navbar-brand" href="javascript:;">{{$unit}}</a>
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
      <!--START CONTENT-->
      <div class="container">
          <div class="card card-user">
              <div class="card-header">
                  <h5 class="card-title">Input Lowongan</h5>
              </div>
              <div class="card-body">
                  <form method ="POST" action="{{ route('kriteria.store') }}">
                  @csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Posisi yang dibutuhkan</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Nama Lowongan">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                       <label for="tanggal_magang">Timeline Lowongan</label><br>
                        <input type="text" id="tanggal" name="timeline" class="form-control" required/>
                        {{-- <input type="date" name="waktu_mulai" class="magang" required min="{{ date('Y-m-d') }}"> --}}
                    </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="tanggal_magang">Durasi Magang</label><br>
                        <input type="text" id="tanggal" name="durasi" class="form-control" required/>
                        {{-- <input type="date" name="waktu_mulai" class="magang" required min="{{ date('Y-m-d') }}"> --}}
                    </div>
                  </div> 
                  
                  
                  <div class="form-group ml-3">
                    <div class="tingkatan">
                        <label for="tingkatan">Tingkatan</label><br>
                        <select name="tingkatan" class="unit1" id="tingkat_id">
                            <option selected disabled value="">Pilih Tingkatan</option>
                            @foreach ($tingkats as $row)
                            <option value="{{$row->nama_tingkat}}">{{$row->nama_tingkat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="jurusan">
                        <label for="jurusan">Jurusan</label><br>
                        <select name="jurusan[]" class="unit" id="jurusan_id"  multiple="multiple">
                            <option ></option>
                            @foreach ($prodi as $row)
                            <option value="{{$row->nama_jurusan}}">{{$row->nama_jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="Magang Posting" name="jenis_pendaftaran"  class="magang" required> 
                    </div>
                    @if(!$pekerja->isEmpty())
                    <div class="form-group">
                      @foreach ($pekerja as $pekerjaItem)
                        <input type="hidden" value="{{ Auth::guard('wab')->user()->pekerja->unit }}" name="unit">
                        @endforeach
                    </div>
                    <div class="form-group">
                      @foreach ($pekerja as $pekerjaItem)
                        <input type="hidden" value="{{ Auth::guard('wab')->user()->pekerja->id_unit }}" name="id_unit">
                        @endforeach 
                    </div>
                    <div class="form-group">
                      @foreach ($pekerja as $pekerjaItem)
                            <input type="hidden" value="{{$pekerjaItem->pekerja_id}}" name="pekerja_id" class="magang" required>
                        @endforeach 
                    </div>
                @endif

                </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-11 mt-0 ml-3">
                      <div class="form-group">
                        <label>Person In Charge</label>
                        <textarea class="form-control textarea" placeholder="Isilah Nama Penanggung Jawab Posisi ini. Boleh Lebih dari Satu."></textarea>
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-11 m-3">
                      <div class="form-group">
                        <label>Deskripsi Pekerjaan</label>
                        <textarea class="form-control textarea" id="deskpekerjaan" name="desk_pekerjaan" placeholder="Isilah deskripsi pekerjaan ini dengan detil."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto mb-3">
                      <button type="submit" class="btn btn-primary btn-round">Posting</button>
                    </div>
                  </div>
                </form>
              </div>
              <!--content baru-->
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="places-buttons">
                          <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                              <h4 class="card-title">
                                Riwayat Lowongan
                              </h4>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead class=" text-primary">
                                        <th>
                                          Posisi
                                        </th>
                                        <th>
                                          Timeline Lowongan
                                        </th>
                                        <th>
                                          Durasi Magang
                                        </th>
                                        <th>
                                          Tingkatan
                                        </th>
                                        <th>
                                          Jurusan
                                        </th>
                                        <th>
                                          Status
                                        </th> 
                                        <th>
                                          Keterangan
                                        </th> 
                                      </thead>
                                     <tbody>
                                      @foreach($kriterias as $kriteria)
                                      <tr>
                                        <td> 
                                        {{$kriteria->posisi}}
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
                                        {{$kriteria->tingkatan}}
                                        </td>
                                        <td>
                                        {{$kriteria->jurusan}}
                                        </td>
                                        <td class="status">
                                            {{ $kriteria->status }}
                                            @php
                                              // Pisahkan tanggal mulai dan tanggal selesai
                                              list($tanggal_mulai, $tanggal_selesai) = explode(' - ', $kriteria->timeline);

                                              // Konversi tanggal mulai dan selesai ke objek Carbon
                                              $carbon_tanggal_mulai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_mulai);
                                              $carbon_tanggal_selesai = \Carbon\Carbon::createFromFormat('m/d/Y', $tanggal_selesai);
                                              
                                              // Konversi tanggal mulai ke format Indonesia
                                              $tanggal_mulai = $carbon_tanggal_mulai->translatedFormat('d F Y');

                                              // Konversi tanggal selesai ke format Indonesia
                                              $tanggal_selesai = $carbon_tanggal_selesai->translatedFormat('d F Y');

                                              // Tambahkan logika untuk menentukan status lowongan
                                              $today = \Carbon\Carbon::now();
                                              if ($today->between($carbon_tanggal_mulai, $carbon_tanggal_selesai)) {
                                                  echo " - Lowongan Dibuka";
                                              } else {
                                                  echo " - Lowongan Ditutup";
                                              }
                                          @endphp
                                        </td>   
                                        <td>
                                        {{$kriteria->keterangan}}
                                        </td>
                                      </tr>
                                      @endforeach
                                     </tbody>
                                   </table>
                                  </div>
                                </div>
                              </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
      <!--end content baru-->
            </div>
          </div>
        </div>
        <!--END CONTENT-->
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
  </div>
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
    function checkOtherOption(selectElement) {
    var otherOptionInput = document.getElementById('otherOptionInput');

    if (selectElement.value === 'lainnya') {
      otherOptionInput.style.display = 'block';
    } else {
      otherOptionInput.style.display = 'none';
    }
    $(document).ready(function () {
    $(".js-example-basic-multiple-limit").select2({
      maximumSelectionLength: 2
    });
  });

  // Add your checkOtherOption function if needed
  function checkOtherOption(selectElement) {
    // Your existing code for handling other options
  }
  }

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
</script>
<script>
        $(document).ready(function () {
            $("#jurusan_id").select2({
                maximumSelectionLength: 4,
                tags: true
            });
        });
    </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    // Mendaftarkan event listener untuk input waktu mulai
        document.querySelector('input[name="tgl_buka"]').addEventListener("change", function() {
            // Mengambil nilai tanggal dari input waktu mulai
            var waktuMulai = new Date(this.value);
            
            // Mengubah nilai minimal input waktu selesai menjadi lebih besar dari waktu mulai yang dipilih
            document.querySelector('input[name="tgl_tutup"]').min = waktuMulai.toISOString().slice(0,10);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
    // Mendaftarkan event listener untuk input waktu mulai
        document.querySelector('input[name="tgl_mulai_magang"]').addEventListener("change", function() {
            // Mengambil nilai tanggal dari input waktu mulai
            var waktuMulai = new Date(this.value);
            
            // Mengubah nilai minimal input waktu selesai menjadi lebih besar dari waktu mulai yang dipilih
            document.querySelector('input[name="tgl_selesai_magang"]').min = waktuMulai.toISOString().slice(0,10);
        });
    });
  </script>

  {{-- Datepicker --}}
  {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    $(function() {
      $('input[name="timeline"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });


    $(function() {
      $('input[name="durasi"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
  </script>
<script src="https://cdn.tiny.cloud/1/r14row0g6ewt2exq8tcdrwxzsytwelrhqlvpx2ek2ph409tp/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#deskpekerjaan', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script> 
{{-- end --}}
</body>

</html>
