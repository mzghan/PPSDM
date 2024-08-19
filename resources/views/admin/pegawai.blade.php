<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/ppsdm.png">
  <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Role - Admin BPOM
  </title>
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/templateUnit.css') }}" rel="stylesheet" />

</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar">
      <div class="logo">
        <a class="simple-text logo-medium">
          <div class="logo-image-medium">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
      </div>
      <div class="sidebar-wrapper" style="overflow-y: hidden;">
        <!-- Menu -->
        <ul class="nav" id="myNav">
          <li>
            <a href="./homepage">
              <i class="nc-icon nc-bank"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./kualifikasi">
              <i class="nc-icon nc-bullet-list-67"></i>
              <p>Lowongan
              <!-- Tambahkan notifikasi di sini -->
              @if(Session::has('newKriteriaCount') && Session::get('newKriteriaCount') > 0)
              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newKriteriaCount') }}</span>
              @endif
              </p>
            </a>
          </li>
          <li>
            <a href="./administrator">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Laporan
                @if(Session::has('newLaporanAkhirCount') && Session::get('newLaporanAkhirCount') > 0)
                    <span class="badge badge-danger"  style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newLaporanAkhirCount') }}</span>
                @endif
            </p>
            </a>
          </li>
          <li class="active-dropdown">
            <a href="javascript:void(0);" class="dropbtn">
              <i class="nc-icon nc-refresh-69 "></i>
              <p>Role Pegawai
                <!-- Tambahkan notifikasi di sini -->
              @if(Session::has('newProccessCount') && Session::get('newProccessCount') > 0)
              <span class="badge badge-danger" style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newProccessCount') }}</span>
              @endif
              </p>
            </a>
            <div class="dropdown-content">
              <a href="./pilihan">Administrator</a>
              <a href="./peserta">Data Peserta</a>
              <a href="./pegawai">Role Pegawai</a>
              <a href="./data">Input NIP</a>
            </div>
          </li>
          <li>
            <a href="./seleksiakhir">
              <i class="nc-icon nc-single-02"></i>
              <p>Seleksi
                @if(Session::has('newSeleksiCount') && Session::get('newSeleksiCount') > 0)
                <span class="badge badge-danger"  style="position: absolute; top: 10px; right: 5px;">{{ Session::get('newSeleksiCount') }}</span>
              @endif
              </p>
            </a>
          </li>
        </ul>
        <!--end menu-->
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
            <a class="navbar-brand" href="javascript:;">Admin - Manage Pegawai</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              
            </form>
            <ul class="navbar-nav">
            <li class="logout">
                <a href="{{ url('/logout') }}"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
              
            </ul>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
            <div class="container">
                <h2 class="mb-4 mt-4"></h2>

                <form action="{{ route('pegawai.store') }}" method="POST" class="mb-4 mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="3">Admin Utama PPSDM</option>
                                <option value="2">Admin Unit BPOM</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-md-7">
                      <label for="unit_kerja">Unit Kerja</label><br>
                      <select name="unit" class="unit2 form-control" id="unit_kerja" required>
                        <option selected disabled value="">Pilih Unit Kerja</option>
                        @foreach ($data as $row)
                          <option value="{{ $row->nama_unit }}" data-id="{{ $row->id_unit }}">{{ $row->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3">
                      <label for="unit_id">ID Unit</label>
                      <input type="text" name="unit_id" id="unit_id" class="form-control" readonly required>
                    </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success">Tambah Pegawai</button>
                        </div>
                    </div>
                </form>

                <!-- Tombol untuk mengekspor data ke Excel -->
                {{-- search --}}
                <div class="row g-3 align-items-center">
                  <div class="col-auto">
                    <h5>Cari Pegawai</h5>
                    <p>*nama harap diawali kapital, nip, unit</p>
                    <form action="pegawai" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
                  </form>
                  
                  </div>
                </div>
                {{-- end --}}
<div class="button">
    <a href="{{ route('export.pegawai') }}" class="btn btn-success">Export to Excel</a>
</div>

               <!-- Daftar Pegawai -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Unit</th>
                            <th>ID Unit</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif


                      @foreach ($pegawais as $pegawai)
                          <tr>
                              <td>{{ $pegawai->nama }}</td>
                              <td>{{ $pegawai->nip }}</td>
                              <td>
                                  @if($pegawai->role == 3)
                                      Admin PPSDM
                                  @elseif($pegawai->role == 2)
                                      Admin Unit
                                  @else
                                      Role Tidak Dikenal
                                  @endif
                              </td>
                              <td class="unit-column">{{ $pegawai->unit }}</td>
                              <td>{{ $pegawai->id_unit }}</td>
                              <td>
                                  <!-- Button untuk menghapus pegawai -->
                                  <!-- <button class="hapus-btn btn btn-danger" data-id="{{ $pegawai->id }}">Hapus</button> -->

                                  <button class="edit-role-btn" data-id="{{ $pegawai->id }}">Edit Role</button>
                                  <form id="change-role-form-{{ $pegawai->id }}" method="POST" style="display: none;">
                                      @csrf
                                      <div class="input-group">
                                          <select name="role" class="form-control">
                                              <option value="3">Admin PPSDM</option>
                                              <option value="2">Admin Unit</option>
                                          </select>
                                          <br>
                                          <div class="input-ajukan">
                                              <button class="ubah-btn" data-id="{{ $pegawai->id }}">Ubah Role</button>
                                          </div>
                                      </div>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>

                                <!-- Tampilan Tautan Pagination -->
                <div class="pagination">
                    <!-- Informasi Pagination -->
                    <div class="pagination-info">Menampilkan {{ $pegawais->firstItem() }} sampai {{ $pegawais->lastItem() }}</div>
                    
                    <!-- Tombol Pagination -->
                    <div class="pagination-buttons">
                        <!-- Tautan Previous -->
                        @if ($pegawais->onFirstPage())
                            <span class="pagination-item disabled">Previous</span>
                        @else
                            <a href="{{ $pegawais->previousPageUrl() }}" class="pagination-link pagination-previous">Previous</a>
                        @endif

                        <!-- Tautan Next -->
                        @if ($pegawais->hasMorePages())
                            <a href="{{ $pegawais->nextPageUrl() }}" class="pagination-link pagination-next">Next</a>
                        @else
                            <span class="pagination-item disabled">Next</span>
                        @endif
                    </div>
                </div>



            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<!-- End CONTENT -->
    <!-- FOOTER -->
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
  {{-- Jquery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script>
$(document).ready(function() {
  $('#unit_kerja').on('change', function() {
    // Access data-id using $(this).find('option:selected').data('id')
    var idUnit = $(this).find('option:selected').data('id');
    $('#unit_id').val(idUnit);
  });
});
</script>

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
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
<script>
$(document).ready(function() {
    $(".edit-role-btn").click(function() {
        var id = $(this).data('id');
        $("#change-role-form-" + id).show();
    });
});
</script>

<script>
$(document).ready(function() {
    $(".ubah-btn").click(function(e) {
        e.preventDefault();
        var btn = $(this);
        var id = btn.data('id');
        var role = btn.closest('form').find('select[name="role"]').val();

        $.ajax({
            type: "POST",
            url: "{{ route('pegawai.ubah') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "role": role
            },
            success: function(response) {
                if (response.success) {
                    btn.text('Diajukan');
                    alert("Perubahan berhasil diajukan ke Pegawai");
                    location.reload();
                } else {
                    alert("Gagal mengajukan perubahan");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan saat mengajukan perubahan");
            }
        });
    });
});
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
<script>
  // Tambahkan event listener untuk toggle kelas active saat dropdown diklik
  var dropdowns = document.querySelectorAll('.active-dropdown');
  dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function() {
      this.classList.toggle('active');
    });
  });
</script>
</body>

</html>
