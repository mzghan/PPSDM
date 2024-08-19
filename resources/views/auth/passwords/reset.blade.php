
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
<link href="../assets/demo/register.css" rel="stylesheet" />

<body>
    <div id="app">
        <main class="py-4">        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}" onsubmit="return validateForm()">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row mb-3 ">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    
                                    <div class="col-md-12">
                                    <input type="email" name="email" id="email" oninput="validateEmail()" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    
                                </div>

                                <div class="field input">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required pattern="(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[a-z]).{8,}" title="Password harus terdiri dari setidaknya 8 karakter, minimal satu huruf kapital, dan minimal satu simbol." autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="password-strength-meter">
                                    <div class="password-strength-meter-bar bg-danger"></div>
                                    <div class="password-strength-meter-bar bg-warning"></div>
                                    <div class="password-strength-meter-bar bg-success"></div>
                                </div>
                                <div class="field input">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password" oninput="validatePassword()">
                                    <span id="passwordMatchError" style="color: red; display: none;">Passwords do not match.</span>
                                </div>
                                <div class="row mb-3">
                                    
                                <div class="col-md-6 mt-3">
                                    <div class="g-recaptcha" class="" data-sitekey="6LeTvFspAAAAAIdN4et3XwxLNFuwIrE-pBDQdl02" id="recaptcha"></div>
                                    <span id="recaptchaError" style="color: red; display: none;"> Harap isi reCAPTCHA.</span>
                                </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
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

