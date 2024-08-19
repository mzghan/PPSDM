<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRequestMethodMiddleware
{
    public function handle($request, Closure $next)
    {
        // Cek apakah request merupakan POST
        if ($request->isMethod('post')) {
            // Lakukan sesuatu untuk route POST di sini
            // Contoh: return response()->json(['message' => 'Ini adalah route POST'], 200);
        } elseif ($request->isMethod('get')) {
            // Lakukan sesuatu untuk route GET di sini
            // Contoh: return response()->json(['message' => 'Ini adalah route GET'], 200);
        }

        // Lanjutkan ke controller jika tidak ada kondisi khusus
        return $next($request);
    }
}
