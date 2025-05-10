<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Halaman Utama</title>
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" />
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .main-container {
      max-width: 600px;
      margin: 100px auto;
      padding: 30px;
      background-color: white;
      border-radius: 900px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      text-align: center;
    }
    h1 {
      margin-bottom: 20px;
      color: #007bff;
    }
    p {
      margin-bottom: 30px;
      font-size: 1.1rem;
      color: #555;
    }
    .btn-primary {
      width: 150px;
      margin: 5px;
      font-weight: bold;
    }
    .home-image {
      max-width: 40%;
      height: auto;
      margin-bottom: 5px;
      border-radius: 8px;
      /* box-shadow: 0 0 10px rgba(0,0,0,0.1); */
    }
  </style>
</head>
<body>
  <div class="main-container">
    <img src="{{ asset('images/welcomeHome.png') }}" alt="Welcome Image" class="home-image" />
    <h1>Selamat Datang di Halaman Utama</h1>
    <p>Ini adalah halaman utama sederhana sebelum dashboard.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
    {{-- <a href="{{ url('/dashboard') }}" class="btn btn-primary">Masuk ke Dashboard</a> --}}
  </div>
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
