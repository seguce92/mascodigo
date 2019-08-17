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
  <header class="hero box-shadow-hero" id="hero">
    <nav id="header" class="w-full z-50 text-white hero">
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
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#"><i class="fa fa-search"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="flex flex-wrap container px-3 mx-auto text-white">
      <nav class="select-none bg-grey flex justify-between items-stretch w-full">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a class="flex-no-grow flex-no-shrink leading-normal text-white no-underline flex items-center font-bold">CURSOS</a>
        </div>
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
              Blog</a>
            <a href="#" class="border-b-4 font-bold flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
              Cursos</a>
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
              Acerca</a>
          </div>
        </div>
      </nav>
    </section>
  </header>

  <main id="app" class="mx-auto">
    <section class="sticky top-0 mx-auto bg-gray-200 z-50">
      <nav class="bg-grey px-3 flex justify-between items-stretch w-full text-black container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a href="#" class="flex-no-grow flex-no-shrink font-bold py-2 leading-normal flex items-center hover:text-gray-600">
            Todos</a>
          <a href="#" class="flex-no-grow flex-no-shrink py-2 px-4 leading-normal flex items-center hover:text-gray-600 text-gray-600">
            Por Categoría</a>
        </div>
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal no-underline flex items-center hover:bg-grey-dark">
              <i class="fa fa-users"></i>
            </a>
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center hover:bg-grey-dark">
              <i class="fa fa-search"></i>
            </a>
          </div>
        </div>
      </nav>
    </section>

    <section id="courses" class="mx-auto">
      <div class="flex justify-center flex-wrap pb-8">
        <div class="w-full sticky skill-group bg-gray-100 shadow-md mb-3">
          <h3 class="uppercase container font-bold py-2 px-3 mx-auto text-sm">
            <i class="far fa-bookmark mr-1"></i> Javascript
          </h3>
        </div>
        <div class="flex justify-center flex-wrap container">
          @for( $i = 0; $i < 12; $i++ )
            @include('component.course')
          @endfor
        </div>
      </div>
      <div class="flex justify-center flex-wrap pb-8">
        <div class="w-full sticky skill-group bg-gray-100 shadow-md mb-3">
          <h3 class="uppercase container font-bold py-2 px-3 mx-auto text-sm">
            <i class="far fa-bookmark mr-1"></i> Laravel
          </h3>
        </div>
        <div class="flex justify-center flex-wrap container">
          @for( $i = 0; $i < 12; $i++ )
            @include('component.course')
          @endfor
        </div>
      </div>
    </section>
  </main>

  @include ('component.footer')
</body>
</html>
