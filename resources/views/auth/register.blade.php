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
    <link rel="icon" type="image/png" href="{{url('assets//img/ppsdm.png') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{url('assets/demo/homePeserta.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<link href="{{url('assets/demo/register.css') }}" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col background">
            <img src="{{url('assets/img/hero.png') }}" alt="hero" class="hero">
            <h2>Pusat Pengembangan Sumber Daya Manusia <br/>Pengawasan Obat dan Makanan</h2>
            <p>Bangun SDM unggul, dukung UMKM obat serta makanan, <br/> tingkatkan pengawasan, kelola pemerintahan yang bersih, efektif, <br/> dan terpercaya demi pelayanan publik prima.</p>
        </div>
        <div class="col">
            <div class="box form-box">
                <form action="{{ route('register') }}" method="post" onsubmit="return validateForm();">
                    @csrf
                    <header>Registrasi</header>
                    <div class="field input">
                        <label for="name">{{ __('Nama') }}</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="field input">
                        <label for="phone">{{ __('Nomor Telepon') }}</label>
                        <p class="info">(Contoh:62812345678)</p>
                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required title="Nomor telepon harus dimulai dengan angka 62 dan hanya berisi angka." autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="field input">
                            <label for="email">{{ __('Alamat Email') }}</label>
                            <input type="email" name="email" id="email" oninput="validateEmail()" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password" oninput="validatePassword()">
                            <span id="passwordMatchError" style="color: red; display: none;">Passwords do not match.</span>
                        </div>
                    <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LeN3KspAAAAAJuSDRKGWSx48cGmxuZfo8GOXAfZ" id="recaptcha"></div>
                            <span id="recaptchaError" style="color: red; display: none;"> Harap isi reCAPTCHA.</span>
                        </div>
                    <div class="field">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                    @if (Route::has('login'))
                        <p class="regis">Sudah Punya Akun?<a class="btn2 btn-link" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>

</main>
<!--end content-->
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
