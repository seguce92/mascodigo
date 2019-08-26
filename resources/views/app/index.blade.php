<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  @include('component.icons')
</head>
<body class="leading-normal tracking-normal font-sans">
  <header class="hero-home box-shadow-hero" id="app">
    <menu-component :fixed="true"></menu-component>
    
    <section class="flex flex-wrap pt-20 lg:pt-40 lg:pb-40 pb-10 container px-3 mx-auto text-white">
      <div class="flex flex-col w-full pt-12 lg:pt-0 lg:w-1/2 order-2 lg:order-1 text-center lg:text-left">
        <p class="uppercase tracking-loose w-full">que quieres aprender hoy?</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">Main Hero Message to sell yourself!</h1>
        <p class="leading-normal text-2xl mb-8">Escoge un curso, mira las lecciones las veces que quieras</p>
        <div class="w-full">
          <a href="#" class="mr-4 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
            Suscribete
          </a>
          <a href="{{ route('courses') }}" class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
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
    <section id="courses" class="container mx-auto">
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
  </main>

  @include ('component.footer')
</body>
</html>
