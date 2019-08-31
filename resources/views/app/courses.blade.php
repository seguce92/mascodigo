@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Cursos')

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ url('/courses') }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="Más Código - Cursos" />
  <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
  <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="1200" />

  <meta itemprop="name" content="Más Código - Cursos">
  <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
  <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="Más Código - Cursos">
  <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">
@endsection

@section('menu-component')
  <menu-component type="learn"></menu-component>
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'courses'
  ])
@endsection

@section('content')
  <main class="mx-auto">
    <courses :courses="{{ $courses }}" :skills="{{ $skills }}"></courses>
  </main>
@endsection
