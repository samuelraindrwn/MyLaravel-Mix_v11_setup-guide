{{-- 
Menggunakan fitur Blade Laravel untuk mewarisi template dari file `main.blade.php`. 
Template `main` ini biasanya berada di folder `resources/views`. 
--}}
@extends('index')

@section('title')

<title>Document</title>

@endsection
{{-- 
Mendefinisikan sebuah section bernama `content`.
Bagian ini akan menggantikan @ yield('content') yang ada di template `main`. 
--}}
@section('content')

{{-- isi konten --}}

<body id="home">
    @include('templates/header')
    @if(isset($greeting))
    <h1>{{ $greeting }}</h1>
    @endif
    @include('templates/footer')
</body>

{{-- 
Menutup definisi section `content`. Semua konten di antara @ section dan @ endsection
akan di-render di tempat @ yield('content') pada file template `main.blade.php`. 
--}}
@endsection