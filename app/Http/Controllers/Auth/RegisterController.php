<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered; 

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/magang/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^62[0-9]+$/', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LeN3KspAAAAABPYjLoC9MpNF9kCwMYp3aE8dXeF';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
        
                $response = \file_get_contents($url);
                $response = json_decode($response);
        
                if (!$response->success) {
                    session()->flash('g-recaptcha-response', 'Mohon isi ReCaptcha');
                    session()->flash('alert-class', 'alert-danger');
                    $fail($attribute . ' Google reCaptcha failed');
                }
            }
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone' => preg_replace('/\D/', '', $data['phone']), // Remove non-numeric characters from phone number
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        event(new UserRegistered($user));

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        event(new UserRegistered($user));
    }
}