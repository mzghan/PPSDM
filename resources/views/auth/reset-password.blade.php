<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="field input">
                            <label for="email">{{ __('Email Address') }}</label>
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
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password" oninput="validatePassword()">
                            <span id="passwordMatchError" style="color: red; display: none;">Passwords do not match.</span>
                        </div>
                    <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LeTvFspAAAAAIdN4et3XwxLNFuwIrE-pBDQdl02" id="recaptcha"></div>
                            <span id="recaptchaError" style="color: red; display: none;"> Harap isi reCAPTCHA.</span>
                        </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
