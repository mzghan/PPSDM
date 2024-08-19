<?php

namespace App\Listeners;

use App\Events\UserRegistered; 
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendWhatsAppMessage implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(UserRegistered $event) 
    {
        $user = $event->user;

        // Membuat data pesan
        $dataSending = [
            "api_key" => "T8N4G0BMVSP94MLX",
            "number_key" => "Po2kYniuyNPGuc4Z",
            "phone_no" => $user->phone, // Menggunakan $user->phone
            "message" => "Halo, " . $user->name . ", \n\nSelamat kamu sudah berhasil melakukan pendaftaran akun untuk Magang/PKL di BPOM Pusat. \n\nPendaftaran PKL/Magang di BPOM Pusat, lamanya proses administrasi dan pengkajian berkas adalah 20HK (Hari Kerja) setelah surat permohonan dari universitas kami terima. \n\nSilahkan untuk verifikasi email anda",
            "wait_until_send" => "1"
        ];

        // Kirim permintaan HTTP POST ke API WhatsApp
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($dataSending),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);

        // Penutup koneksi cURL
        curl_close($curl);

        // Penanganan respons dari API WhatsApp
        if ($response === false) {
            // Penanganan ketika gagal mengirim pesan
            Log::error('Gagal mengirim pesan WhatsApp: ' . curl_error($curl));
        } else {
            // Penanganan ketika berhasil mengirim pesan
            Log::info('Pesan WhatsApp berhasil dikirim: ' . $response);
        }
    }
}
