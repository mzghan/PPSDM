<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{url('assets/demo/loginunit.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{url('assets/img/ppsdm.png') }}">
    <title>Login Unit Kerja</title>
</head>
<body>
    <div class="loginuk">
    <div class="background">
    <img src="{{url('assets/img/logo-small.png') }}" alt="logo" class="logo">
    <img src="{{url('assets/img/hero.png') }}" alt="hero" class="hero">
         <h2>Pusat Pengembangan Sumber Daya Manusia <br/>Pengawasan Obat dan Makanan</h2>
         <p>Bangun SDM unggul, dukung UMKM obat serta makanan, <br/> tingkatkan pengawasan, kelola pemerintahan yang bersih, efektif, <br/> dan terpercaya demi pelayanan publik prima.</p>
    </div>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>

            @if($errors->any())
                @foreach($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif

            @if(Session::has('error'))
                <p style="color:red;">{{ Session::get('error') }}</p>
            @endif

            <form action="{{ route('masuk') }}" method="POST" onsubmit="return validateForm();">
                @csrf
                <div class="field input">
                    <input type="text" name="nip" placeholder="Masukkan NIP">
                    <br><br>
                    <input type="password" name="password" placeholder="Masukan Password">
                    <br><br>
                </div>
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="6LeN3KspAAAAAJuSDRKGWSx48cGmxuZfo8GOXAfZ" id="recaptcha"></div>
                    <span id="recaptchaError" style="color: red; display: none;"> Harap isi reCAPTCHA.</span>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
</body>
</html>
