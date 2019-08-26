<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Más Código - 404</title>
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="{{ asset('css/error.css') }}">
</head>
<body class="bg-purple">
  <div class="stars">
    <div class="custom-navbar">
      <div class="brand-logo">
        Más Código
      </div>
    </div>
    <div class="central-body">
      <h1 class="title-error">404</h1>
      <p class="message">Lo siento estas navegando por espacio desconocido, este espacio no existe!!!</p>
      <a href="{{ url('/') }}" class="btn-go-home">IR A INICIO</a>
    </div>
    <div class="objects">
      <img class="object_rocket" src="{{ asset('img/rocket.svg') }}" width="60px">
      <div class="earth-moon">
        <img class="object_earth" src="{{ asset('img/earth.svg') }}" width="100px">
        <img class="object_moon" src="{{ asset('img/moon.svg') }}" width="80px">
      </div>
      <div class="box_astronaut">
        <img class="object_astronaut" src="{{ asset('img/astronaut.svg') }}" width="140px">
      </div>
    </div>
    <div class="glowing_stars">
      <div class="star"></div>
      <div class="star"></div>
      <div class="star"></div>
      <div class="star"></div>
      <div class="star"></div>
    </div>
  </div>
</body>
</html>