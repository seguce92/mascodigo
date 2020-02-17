@extends('layouts.app')

@section('title', 'Más Código - Foro')

@section('seo')
    <meta property="fb:app_id" content="334747354108904">
    <meta property="og:url" content="{{ url('/forum') }}" />
    <meta property="og:site_name" content="Más Código">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:title" content="Más Código - Foro" />
    <meta property="og:description" content="{{ config('seguce92.data.description') }}" />

    <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1200" />

    <meta itemprop="name" content="Más Código">
    <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
    <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@seguce92">
    <meta name="twitter:title" content="Más Código - Foro">
    <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
    <meta name="twitter:creator" content="@seguce92">
    <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">
@endsection

@section('menu-component')
    @if (\Auth::check())
        <menu-component type="blog" :logged="true"></menu-component>
    @else
        <menu-component type="blog" :logged="false"></menu-component>
    @endif
@endsection


@section('menu')
  @include('component.home-menu', [
    'opt' =>  'forums'
  ])
@endsection

@section('content')
    <main class="mx-auto container p-4">
        <div class="mt-4">
            <h2 class="font-bold text-2xl">Foro</h2>
            <p class="text-sm font-mono italic">
                Aqui puedes preguntar cualquier cosa referente a programación. Pero siempre mateniendo el respeto mutuo.
            </p>
        </div>
        <discussion></discussion>
    </main>
@endsection


@push('script')
@endpush