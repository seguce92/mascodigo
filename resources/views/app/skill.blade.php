@extends('layouts.app')

@section('title', $skill->name)

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ route('skill', $skill->slug) }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="object" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="{{ $skill->name }}" />
  <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
  <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />

  <meta itemprop="name" content="{{ $skill->name }}">
  <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
  <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="{{ $skill->name }}">
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
    <skill-courses :courses="{{ $skill->courses }}" :skill="{{ $skill }}"></skill-courses>
  </main>
@endsection