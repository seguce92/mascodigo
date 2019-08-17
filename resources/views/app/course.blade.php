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
              <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                <svg class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
              </a>
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
    <div class="sticky top-0 px-3 mx-auto z-50 shadow bg-black-trans">
      <nav class="flex justify-center items-stretch w-full container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>
            {{ $course->lessons->count() }} LECCIONES
          </a>
          <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> 
            {{ course_time($course) }}
          </a>
          <a class="uppercase text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M216 288h-48c-8.84 0-16 7.16-16 16v192c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V304c0-8.84-7.16-16-16-16zM88 384H40c-8.84 0-16 7.16-16 16v96c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16v-96c0-8.84-7.16-16-16-16zm256-192h-48c-8.84 0-16 7.16-16 16v288c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V208c0-8.84-7.16-16-16-16zm128-96h-48c-8.84 0-16 7.16-16 16v384c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V112c0-8.84-7.16-16-16-16zM600 0h-48c-8.84 0-16 7.16-16 16v480c0 8.84 7.16 16 16 16h48c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16z"/></svg>
            {{ $course->level }}
          </a>
        </div>
      </nav>
    </div>
    <div class="flex flex-wrap container mx-auto py-8 lg:py-16">
      <div class="flex flex-col w-full pt-12 pl-4 pr-4 lg:pt-0 lg:w-2/3 order-2 lg:order-1 text-center lg:text-left">
        <p class="uppercase tracking-loose w-full">
          <a href="{{ route('skill', $course->skill->slug) }}" class="skill rounded-full bg-gray-300 px-4 py-2 text-xs font-bold">{{ $course->skill->name }}</a>
        </p>
        <h1 class="my-4 text-3xl font-bold leading-tight">{{ $course->title }}</h1>
        <p class="leading-normal text-lg mb-8 px-2 xl:px-0">
          {{ $course->content }}
        </p>
        <div class="w-full">
          <a href="{{ route('lesson', ['course' => $course->slug, 'order' => 1]) }}" class="mr-4 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
            <svg class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z"/></svg> INICIAR CURSO
          </a>
        </div>
      </div>
      <div class="flex w-full lg:w-1/3 order-1 lg:order-2 justify-center lg:justify-end">
        <img class="icon ml-auto mr-auto text-5xl" src="{{ asset($course->icon) }}" alt="">
      </div>
    </div>
  </section>
  <main id="app" class="mx-auto">
    <section class="sticky top-0 px-3 mx-auto bg-gray-200 z-50">
      <nav class="flex justify-between items-stretch w-full text-black container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a href="{{ route('courses') }}" class="text-xs md:text-sm lg:text-base font-mono hover:bg-gray-300 px-3 text-gray-800 flex-no-grow flex-no-shrink py-2 flex items-center">
            <i class="fa fa-arrow-left mr-2"></i> TODOS LOS CURSOS
          </a>
        </div>
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a class="text-xs md:text-sm lg:text-base font-mono text-gray-800 flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center">
              COMPARTIR:
            </a>
            <a href="#" title="FACEBOOK" class="text-gray-600 hover:text-blue-700 flex-no-grow flex-no-shrink relative py-2 pl-3 pr-2 leading-normal no-underline flex items-center ">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="#" title="TWITTER" class="text-gray-600 hover:text-blue-500 flex-no-grow flex-no-shrink relative py-2 px-2 leading-normal no-underline flex items-center">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" title="WHATSAPP" class="text-gray-600 hover:text-green-700 flex-no-grow flex-no-shrink relative py-2 px-2 leading-normal no-underline flex items-center">
              <i class="fab fa-whatsapp"></i>
            </a>
          </div>
        </div>
      </nav>
    </section>

    <section id="course" class="container mx-auto pt-10 pb-10">
      <div class="flex justify-center flex-wrap">
        <div class="flex flex-wrap w-full lg:2-4/5 xl:w-4/5  items-start content-start mx-auto">
          <ul class="flex flex-col w-full list-reset select-none">
            @foreach ( $course->lessons as $lesson )
              @include('component.lesson', [
                'lesson'  =>  $lesson,
                'course'  =>  $course
              ])
            @endforeach
          </ul>
        </div>
      </div>
    </section>
  </main>

  @include ('component.footer')
</body>
</html>
