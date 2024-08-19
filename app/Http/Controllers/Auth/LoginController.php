<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use App\Models\Posting;
use App\Models\Mandiri;
use App\Models\Wawancara;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/magang/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'g-recaptcha-response' => function ($attribute, $value, $fail) use ($request) {
                $secretKey = '6LeN3KspAAAAABPYjLoC9MpNF9kCwMYp3aE8dXeF';
                $response = $value;
                $userIP = $request->ip();
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";

                $response = Http::post($url);
                $body = $response->json();

                if (!$body['success']) {
                    session()->flash('g-recaptcha-response', 'Mohon isi ReCaptcha');
                    session()->flash('alert-class', 'alert-danger');
                    $fail($attribute . ' Google reCaptcha failed');
                }
            },
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $this->validator($request)->validate();

        // Continue with the default Laravel login attempt
        return $this->guard('web')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );

        // Authenticate a regular user
if (auth()->guard('web')->attempt(['email' => $email, 'password' => $password])) {
    // User is logged in
}
    }

    protected function authenticated(Request $request, $user)
    {
        return $this->redirectDash(); // Mengubah ini agar memanggil redirectDash setelah login berhasil
    }

    public function redirectDash()
{
    // Pastikan pengguna sudah login
    if(auth()->guard('web')->check()) {
        $user = auth()->guard('web')->user();
        
        // Cek apakah status 'Peserta Magang Aktif' ada dalam salah satu tabel
        $statusFound = false;
        
        if (Posting::where('status', 'Peserta Magang Aktif')->where('user_id', $user->id)->exists()) {
            $statusFound = true;
        } elseif (Mandiri::where('status', 'Peserta Magang Aktif')->where('user_id', $user->id)->exists()) {
            $statusFound = true;
        } elseif (Wawancara::where('status', 'Peserta Magang Aktif')->where('user_id', $user->id)->exists()) {
            $statusFound = true;
        }
        
        // Redirect sesuai dengan status yang ditemukan
        if ($statusFound) {
            $redirect = '/magang/beranda';
        } else {
            $redirect = '/magang/home';
        }
    } else {
        // Jika pengguna belum login, arahkan ke halaman login
        $redirect = '/login';
    }

    return redirect($redirect);
}

    // ... other methods ...
}