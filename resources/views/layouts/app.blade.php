
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Badan POM - Pendaftaran Magang</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <!-- @if (session()->has('message'))
            <script>
            setTimeout(function() {
                window.location.href = "login.php"
            }, 2000); // 2 second
            </script>
            @endif -->
        <!-- @if (Route::has('login'))
            <script>
            setTimeout(function() {
                window.location.href = {{ __('Login') }}
            }, 2000); // 2 second
            </script>
            @endif
        @endguest -->
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">
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
        </nav> -->

        <main class="py-4">
            @yield('content')
            
        <script src="https://www.google.com/recaptcha/api.js"></script>
        </main>
    </div>
    <script>
function validateEmail() {
    var emailInput = document.getElementById('email');
    var email = emailInput.value.trim();
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(email)) {
        emailInput.setCustomValidity("Tidak valid format email. Harap masukan alamat email yang valid (e.g., contoh@mail.com)");
    } else {
        emailInput.setCustomValidity("");
    }
}
</script>
<script>
    // Ambil elemen input nomor telepon
    const phoneInput = document.getElementById('phone');

    // Fungsi untuk memeriksa apakah nomor telepon dimulai dengan '62'
    function validatePhoneNumber() {
        const phoneNumber = phoneInput.value.trim();
        if (!phoneNumber.startsWith('62')) {
            phoneInput.setCustomValidity('Nomor telepon harus dimulai dengan angka 62');
        } else {
            phoneInput.setCustomValidity('');
        }
    }

    // Tambahkan event listener untuk memanggil fungsi validasi saat input berubah
    phoneInput.addEventListener('input', validatePhoneNumber);

    // Validasi saat halaman dimuat
    validatePhoneNumber();
</script>

<script>
document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var strength = 0;

    // Check length
    if (password.length >= 8) {
        strength += 1;
    }

    // Check for uppercase letters
    if (/[A-Z]/.test(password)) {
        strength += 1;
    }

    // Check for special characters
    if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
        strength += 1;
    }

    // Update meter color
    var bars = document.querySelectorAll('.password-strength-meter-bar');
    bars.forEach(function(bar, index) {
        if (index < strength) {
            bar.classList.remove('bg-danger');
            bar.classList.add('bg-success');
        } else if (index === strength) {
            bar.classList.remove('bg-success');
            bar.classList.add('bg-warning');
        } else {
            bar.classList.remove('bg-success', 'bg-warning');
            bar.classList.add('bg-danger');
        }
    });
});
</script>
<script>
    function validatePassword() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password-confirm').value;
        var passwordMatchError = document.getElementById('passwordMatchError');

        if (password !== confirmPassword) {
            passwordMatchError.style.display = "block";
            document.getElementById('password-confirm').setCustomValidity("Passwords do not match");
        } else {
            passwordMatchError.style.display = "none";
            document.getElementById('password-confirm').setCustomValidity('');
        }
    }
</script>
<script>
    // Function to validate reCAPTCHA
    function validateRecaptcha() {
        var captchaResponse = grecaptcha.getResponse();
        if (captchaResponse.length === 0) {
            document.getElementById("recaptchaError").style.display = "block";
            return false;
        } else {
            document.getElementById("recaptchaError").style.display = "none";
            return true;
        }
    }

    // Function to validate form before submission
    function validateForm() {
        var isValidRecaptcha = validateRecaptcha();
        return isValidRecaptcha; // Return false if reCAPTCHA is not valid
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
