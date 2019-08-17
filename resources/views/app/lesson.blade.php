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
            <li class="mr-3 lg:hidden">
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                Blog
              </a>
            </li>
            <li class="mr-3 lg:hidden">
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="{{ route('courses') }}">
                Cursos
              </a>
            </li>
            <li class="mr-3 lg:hidden">
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                Acerca
              </a>
            </li>
            <li class="mr-3">
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#"><i class="fa fa-search"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="flex hidden lg:flex flex-wrap container mx-auto text-white">
      <nav class="select-none bg-grey flex justify-end items-stretch w-full">
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
              Blog</a>
            <a href="{{ route('courses') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white border-b-4 font-bold flex items-center hover:bg-grey-dark">
              Cursos</a>
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
              Acerca</a>
          </div>
        </div>
      </nav>
    </section>
  </header>
  <section class="text-white course {{ $course->skill->slug }}">
    <div class="px-3 mx-auto z-50 shadow">
      <nav class="flex items-stretch w-full container mx-auto">
        <div class="flex w-full justify-between items-stretch h-12">
          <a href="{{ route('courses') }}" class="border-r border-trans lg:border-0 text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="fa w-4 h-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/></svg>
            TODOS LOS CURSOS
          </a>
          <a class="border-r border-trans lg:border-0 text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> 
            {{ course_time($course) }}
          </a>
          <a class="uppercase text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M216 288h-48c-8.84 0-16 7.16-16 16v192c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V304c0-8.84-7.16-16-16-16zM88 384H40c-8.84 0-16 7.16-16 16v96c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16v-96c0-8.84-7.16-16-16-16zm256-192h-48c-8.84 0-16 7.16-16 16v288c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V208c0-8.84-7.16-16-16-16zm128-96h-48c-8.84 0-16 7.16-16 16v384c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V112c0-8.84-7.16-16-16-16zM600 0h-48c-8.84 0-16 7.16-16 16v480c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16z"/></svg>
            {{ $course->level }}
          </a>
        </div>
      </nav>
    </div>
  </section>
  <main id="app" class="mx-auto">
    <lesson-component :course="{{ $course }}" :lesson="{{ $lesson }}"></lesson-component>
  </main>

  @include ('component.footer')

</body>
</html>
