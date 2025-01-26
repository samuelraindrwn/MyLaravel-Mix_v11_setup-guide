<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Mendeklarasikan karakter encoding sebagai UTF-8 untuk mendukung berbagai karakter internasional --}}
    <meta charset="UTF-8">
    {{-- Mengatur viewport agar halaman bersifat responsif dan tampil dengan baik di perangkat mobile --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Import Google Fonts --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Import custom css --}}
    <link rel="stylesheet" href="{{ mix('/css/app.min.css') }}">
    {{-- Import custom JS --}}
    <script src="{{ mix('/js/app.min.js') }}"></script>

    @yield('title')
</head>

{{-- 
Tempat untuk me-render konten dinamis dengan Blade, yang didefinisikan menggunakan @ section('content')
Konten ini akan menggantikan @ yield('content') jika ada file Blade yang meng-extend template ini 
--}}

@yield('content')

</html>