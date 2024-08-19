


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

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <main class="py-4">            
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" onsubmit="return validateForm()">
                                @csrf

                                <div class="row mb-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                    <input type="email" name="email" id="email" oninput="validateEmail()" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="g-recaptcha" data-sitekey="6LeTvFspAAAAAIdN4et3XwxLNFuwIrE-pBDQdl02" id="recaptcha"></div>
                                    <span id="recaptchaError" style="color: red; display: none;"> Harap isi reCAPTCHA.</span>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
  
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>
</html>

