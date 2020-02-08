<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ url('/') }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="Más Código" />
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
  <meta name="twitter:title" content="Más Código">
  <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">

  @include('component.icons')
</head>
<body class="leading-normal tracking-normal font-sans">
  @if (\Auth::check())
  <div class="w-full px-2 lg:px-0 mx-auto flex flex-wrap items-center h-10 fixed bg-gray-800 top-0" style="z-index:51">
    <div class="hidden lg:inline-block w-full lg:w-1/2 pl-2 md:pl-0">
      <span class="text-gray-400 ml-2 text-xs italic">Bienvenido. Gracias por elegirnos, esperamos que tu estadia en Más Código sea de tu agrado.</span>
    </div>
    <div class="w-full lg:w-1/2  pr-0">
      <div class="flex relative inline-block float-right">
        <div class="relative text-sm">
          <button id="userButton" class="flex items-center focus:outline-none mr-3 text-white">
            <img class="w-6 h-6 rounded-full mr-4" src="{{ \Auth::user()->photo }}" alt="{{ \Auth::user()->email }}">
            <span class="inline-block">Hola, {{ \Auth::user()->username }} </span>
            <svg class="pl-2 h-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
          </button>
          <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-8 top-0 right-0 min-w-full overflow-auto z-30 invisible">
            <ul class="list-reset">
              <li><a href="{{ route('profile') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mi Cuenta</a></li>
              <li><hr class="border-t mx-2 border-gray-400"></li>
              <li>
                <a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="hero-home box-shadow-hero mt-10" id="app">
    <menu-component :fixed="true" :logged="true"></menu-component>
  @else
  <header class="hero-home box-shadow-hero" id="app">
    <menu-component :fixed="true" :logged="false"></menu-component>
  @endif
    
    <section class="flex flex-wrap pt-20 lg:pt-40 lg:pb-40 pb-10 container px-3 mx-auto text-white">
      <div class="flex flex-col w-full pt-12 lg:pt-0 lg:w-1/2 order-2 lg:order-1 text-center lg:text-left">
        <p class="uppercase tracking-loose w-full">que quieres aprender hoy?</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">LA FORTUNA JUEGA A FAVOR DE LA GENTE PREPARADA</h1>
        <p class="leading-normal text-2xl mb-8">Escoge un curso, mira las lecciones las veces que tu desees...</p>
        <div class="w-full">
          <a href="{{ route('register') }}" class="mr-4 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full inline-block mb-4">
            Suscribete
          </a>
          <a href="{{ route('courses') }}" class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full inline-block">
            Ver todos los Cursos
          </a>
        </div>
      </div>
      <div class="w-full lg:w-1/2 order-1 lg:order-2">
        <img class="w-5/5 lg:3/5 xl:3/5 ml-auto mr-auto" src="{{ asset('img/logo.svg') }}">
      </div>
    </section>

  </header>

  <main id="app" class="mx-auto">
    <section class="container mx-auto">
      <div class="text-center mt-10 mb-4">
        <h1 class="font-bold text-xl uppercase text-shadow">Habilidades / Categorías</h1>
      </div>
      <div class="flex justify-center flex-wrap pb-8">
        <div class="flex justify-center flex-wrap container">
          @foreach( $skills as $skill )
            @include('component.skill', [
              'skill' =>  $skill
            ])
          @endforeach
        </div>
      </div>
      <div class="text-center mb-10">
        <a href="{{ route('courses') }}" class="bg-white shadow hover:text-pink-700 py-3 px-8 border border-gray-400 hover:border-pink-700 rounded-full">
          VER TODOS LOS CURSOS
        </a>
      </div>
    </section>

    <section class="blog">
      <div class="container mx-auto py-2 lg:py-10">
        <div class="text-center lg:mt-10 mb-4">
          <h1 class="font-bold text-xl uppercase text-shadow">Post Destacados</h1>
        </div>
        <div class="flex justify-center flex-wrap pb-8">
          <div class="flex justify-center flex-wrap container">
            @foreach ( $posts as $post )
              <article class="max-w-sm w-full self-start lg:max-w-full lg:flex w-1/1 lg:w-1/2 p-2 mb-4">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" 
                  style="background-image: url('{{ asset($post->image) }}')" title="{{ $post->title }}">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                  <div class="mb-8">
                    <a href="{{ route('category', $post->category->slug) }}" class="text-sm text-gray-600 flex items-center mb-2">
                      <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"/></svg>
                      {{ $post->category->title }}
                    </a>
                    <a href="{{ route('post', $post->slug) }}" class="text-gray-900 font-bold text-xl mb-2 hover:text-gray-700">{{ $post->title }}</a>
                    <p class="text-gray-700 text-base mt-2">
                      {{ excerpt($post->content) }}
                    </p>
                  </div>
                  <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->author->photo }}" alt="{{ $post->author->email }}">
                    <div class="text-sm">
                      <a href="{{ route('me', $post->author->username) }}" class="text-gray-900 leading-none hover:text-gray-700">{{ $post->author->fullname }}</a>
                      <p class="text-gray-600">{{ format_date_post($post->published_at) }}</p>
                    </div>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
        </div>
        <div class="text-center mb-10">
          <a href="{{ route('blog') }}" class="bg-white shadow hover:text-orange-700 py-3 px-8 border border-gray-400 hover:border-orange-700 rounded-full">
            VER TODOS LOS POSTS
          </a>
        </div>
      </div>
    </section>
  </main>

  @include ('component.footer-home')
  <script>
    var ab=document.getElementById("userMenu");var userMenu=document.getElementById("userButton");document.onclick=check;
    function check(e){var target=(e&&e.target)||(event&&event.srcElement);if(!checkParent(target,ab)){if(checkParent(target,userMenu)){if(ab.classList.contains("invisible")){ab.classList.remove("invisible")}else{ab.classList.add("invisible")}}else{ab.classList.add("invisible")}}}
    function checkParent(t,elm){while(t.parentNode){if(t==elm){return true;}t=t.parentNode;}return false}
  </script>
</body>
</html>
