<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/demo/404.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../assets/img/ppsdm.png">
    <title>Page Not Found</title>
    <!-- Tambahkan stylesheet atau styling sesuai kebutuhan Anda -->
    {{-- <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #dc3545; /* Warna merah, bisa disesuaikan */
        }
    </style> --}}
</head>
<body>
    <h1>404 Error Page</h1>
    <p class="zoom-area"><b>Oops</b> Look like you took a wrong turn. </p>
    <section class="error-container">
      <span class="four"><span class="screen-reader-text">4</span></span>
      <span class="zero"><span class="screen-reader-text">0</span></span>
      <span class="four"><span class="screen-reader-text">4</span></span>
    </section>
    <div class="link-container">
        <a href="#" onclick="history.go(-1); return false;" class="more-link">Go Back</a>
    </div>
</body>
</html>
