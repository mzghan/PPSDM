<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
        <title>Posisi Tersedia - Badan POM</title>
        <!-- CSS -->
        {{-- <link href="../assets/demo/posisipeserta.css" rel="stylesheet" /> --}}
        <link href="{{url('assets/demo/posisipeserta.css') }}" rel="stylesheet" />
        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />

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
            <button type="button" class="back" data-bs-dismiss="modal">
                <a href="./home" class="btn7">
                    <img src="../assets/img/back.png" alt="">
                </a>
            </button>
<!--Start posisi-->
<div class="posisi">
    <h1>Posisi yang sedang dibuka</h1>
    <div class="container text-center">
        <div class="row">
            <!-- Content 1 -->
            @foreach ($kriterias as $kriteria)
            <div class="col-md-3 mr-5">
                    <div class="cardii">
                        <div class="text">
                            <h2>{{$kriteria->posisi}}</h2>
                            <h4>{{$kriteria->tingkatan}}</h4>
                            <h4>{{$kriteria->jurusan}}</h4>
                            <button class="lihatlowongan"><a href="{{ url('/magang/apply/' . $kriteria->id) }}">Lihat Lowongan</a></button>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--end content-->
        </div>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
