@extends('layouts.app')

@section('title', $course->title)

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ route('course', $course->slug) }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="object" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="{{ $course->title }}" />
  <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
  <meta property="og:image" content="{{ $course->icon }}" />

  <meta itemprop="name" content="{{ $course->title }}">
  <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
  <meta itemprop="image" content="{{ $course->icon }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="{{ $course->title }}">
  <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ $course->icon }}">
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
  <section class="text-white course {{ $course->color }}">
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
          @if ($course->lessons->count() > 0)
          <a href="{{ route('lesson', ['course' => $course->slug, 'order' => 1]) }}" 
            class="shadow hover:bg-white inline-flex items-center text-white-700 font-semibold hover:text-black py-2 px-8 border border-white rounded-full">
            <svg class="h-4 w-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm115.7 272l-176 101c-15.8 8.8-35.7-2.5-35.7-21V152c0-18.4 19.8-29.8 35.7-21l176 107c16.4 9.2 16.4 32.9 0 42z"/></svg>
            <span>INICIAR CURSO</span>
          </a>
          @endif
        </div>
      </div>
      <div class="flex w-full lg:w-1/3 order-1 lg:order-2 justify-center lg:justify-end">
        <img class="icon ml-auto mr-auto text-5xl" src="{{ asset($course->icon) }}" alt="">
      </div>
    </div>
  </section>
  <main class="mx-auto">
    <section class="sticky top-0 px-3 mx-auto bg-gray-200 z-50">
      <nav class="flex justify-between items-stretch w-full text-black container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a href="{{ route('courses') }}" class="text-xs md:text-sm lg:text-base font-mono hover:bg-gray-300 px-3 text-gray-800 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="fa w-4 h-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/></svg>
            TODOS LOS CURSOS
          </a>
        </div>
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a class="text-xs md:text-sm lg:text-base font-mono text-gray-800 flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center">
              COMPARTIR:
            </a>
            <a href="#" title="FACEBOOK" class="text-gray-600 hover:text-blue-700 flex-no-grow flex-no-shrink relative py-2 pl-3 pr-2 leading-normal no-underline flex items-center ">
              <svg class="fa w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
            </a>
            <a href="#" title="TWITTER" class="text-gray-600 hover:text-blue-500 flex-no-grow flex-no-shrink relative py-2 px-2 leading-normal no-underline flex items-center">
              <svg class="fa w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
            </a>
            <a href="#" title="WHATSAPP" class="text-gray-600 hover:text-green-700 flex-no-grow flex-no-shrink relative py-2 px-2 leading-normal no-underline flex items-center">
              <svg class="fa w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
            </a>
            <a href="#" title="TELEGRAM" class="text-gray-600 hover:text-blue-800 flex-no-grow flex-no-shrink relative py-2 px-2 leading-normal no-underline flex items-center">
              <svg class="fa w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z"/></svg>
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
@endsection
