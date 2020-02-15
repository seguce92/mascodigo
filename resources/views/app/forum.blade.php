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
            <p class="text-sm font-mono italic">Los foros son lugar para discutir cualquier tema relacionada a la programación. Respetos guardan respetos.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-8 mt-8">
            <aside class="col-span-1 mb-4">
                <a href="#" class="w-full inline-block text-center bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-5 rounded-full">PREGUNTAR</a>
                <div class="my-4">
                    <a href="" class="w-full inline-block text-blue-600 hover:text-blue-700 hover:underline">Todos las Discusiones</a>
                </div>
                <nav>
                    <ul>
                        <li>General</li>
                        <li>JavaScript</li>
                        <li>Laravel</li>
                        <li>Vue Js</li>
                        <li>Php</li>
                        <li>Angular</li>
                    </ul>
                </nav>
            </aside>

            <section class="col-span-3 grid grid-cols-1 gap-3">
                <article class="flex px-3 py-4 rounded-lg hover:bg-gray-200 relative">
                    <span class="absolute rounded-lg text-xs px-2 bg-green-500 text-white top-0 right-0">Solucionado</span>
                    <div class="flex-shrink pr-3">
                        <img class="w-16 h-16 rounded-full border-white border-2 bg-blue-600 course shadow" src="{{ asset('img/default.png') }}" alt="Icon">
                    </div>
                    <div class="flex-1">
                        <div>
                            <a href="#" class="font-semibold">Titulo de discusion</a>
                            <a href="#" class="ml-2 bg-red-700 shadow px-4 py-1 rounded-full text-white text-xs">Channel</a>
                        </div>
                        <div class="text-xs mb-2">
                            <a href="#" class="text-blue-600 font-semibold">seguce92</a> <small class="text-gray-600">Publicado hace 15 hrs</small>
                        </div>
                        <div class="text-sm">
                            <p class="text-gray-700 overflow-hidden">aksdj añlskdñalks dñlaksñldkañls dkñlaks ñdlkañsdk ñaskd ñlaksñdl ka</p>
                        </div>
                    </div>
                </article>

                <article class="flex px-3 py-4 rounded-lg hover:bg-gray-200">
                    <div class="flex-shrink pr-3">
                        <img class="w-16 h-16 rounded-full border-white border-2 bg-blue-600 course shadow" src="{{ asset('img/user.jpg') }}" alt="Icon">
                    </div>
                    <div class="flex-1">
                        <div>
                            <a href="#" class="font-semibold">Titulo de discusion</a>
                            <a href="#" class="ml-2 bg-red-700 shadow px-4 py-1 rounded-full text-white text-xs">Channel</a>
                        </div>
                        <div class="text-xs mb-2">
                            <a href="#" class="text-blue-600 font-semibold">seguce92</a> <small class="text-gray-600">Publicado hace 15 hrs</small>
                        </div>
                        <div class="text-sm">
                            <p class="text-gray-700 overflow-hidden">aksdj añlskdñalks dñlaksñldkañls dkñlaks ñdlkañsdk ñaskd ñlaksñdl ka</p>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </main>
@endsection


@push('script')
@endpush