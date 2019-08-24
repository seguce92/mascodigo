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
  <header class="hero-home box-shadow-hero">
    <nav class="fixed w-full z-50 text-white hero">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="uppercase no-underline hover:no-underline font-bold text-2xl text-shadow-2xl"  href="{{ url('/') }}"> 
            {{ config('app.name') }}
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="items-center px-3 py-2 appearance-none focus:outline-none">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="w-full text-white font-bold uppercase inline-block py-2 px-4 text-black no-underline" href="#">Inicia Sesión</a>
            </li>
            <li class="mr-3">
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                <svg class="fa w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="flex flex-wrap pt-20 lg:pt-40 lg:pb-40 pb-10 container px-3 mx-auto text-white">
      <div class="flex flex-col w-full pt-12 lg:pt-0 lg:w-1/2 order-2 lg:order-1 text-center lg:text-left">
        <p class="uppercase tracking-loose w-full">What business are you?</p>
        <h1 class="my-4 text-5xl font-bold leading-tight">Main Hero Message to sell yourself!</h1>
        <p class="leading-normal text-2xl mb-8">Sub-hero message, not too long and not too short. Make it just right!</p>
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

  <script>
  var navMenuDiv = document.getElementById("nav-content");
  var navMenu = document.getElementById("nav-toggle");
  document.onclick = check;
  function check(e) {
    var target = (e && e.target) || (event && event.srcElement);
    if (!checkParent(target, navMenuDiv)) {
      
      if (checkParent(target, navMenu)) {
        console.log(navMenuDiv.classList)
        if (navMenuDiv.classList.contains("hidden")) {
          console.log("content")
          navMenuDiv.classList.toggle("hidden");
          navMenu.classList.toggle("change");
        } else {
          console.log("content no")
          navMenuDiv.classList.toggle("hidden");
          navMenu.classList.toggle("change")
        }
      } else {
        navMenuDiv.classList.add("hidden");
        navMenu.classList.remove("change")
      }
    }
  }
  function checkParent(t, elm) {
    while(t.parentNode) {
      if( t == elm ) {return true;}
      t = t.parentNode;
    }
    return false;
  }
  </script>
</body>
</html>
