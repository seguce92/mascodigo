@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

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
  @if (\Auth::check())
    <menu-component type="learn" :logged="true"></menu-component>
  @else
    <menu-component type="learn" :logged="false"></menu-component>
  @endif
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'courses'
  ])
@endsection

@section('content')
  <section class="text-white course {{ $course->color }}">
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
  <main class="mx-auto">
    @if (\Auth::check())
      <lesson-component :course="{{ $course }}" :lesson="{{ $lesson }}" :logged="true" :user="{{ \Auth::user() }}"></lesson-component>
    @else
      <lesson-component :course="{{ $course }}" :lesson="{{ $lesson }}" :logged="false"></lesson-component>
    @endif
  </main>
@endsection
