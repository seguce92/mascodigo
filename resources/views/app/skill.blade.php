@extends('layouts.app')

@section('title', $skill->name)

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ route('skill', $skill->slug) }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="object" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="{{ $skill->name }}" />
  <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
  <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />

  <meta itemprop="name" content="{{ $skill->name }}">
  <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
  <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="{{ $skill->name }}">
  <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">
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
  <section class="text-white course {{ $skill->slug }}">
    <div class="sticky top-0 px-3 mx-auto z-50 shadow bg-black-trans">
      <nav class="flex justify-center items-stretch w-full container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            @php $amount = $skill->courses->count() @endphp
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg>
            {{ $amount }} <span class="ml-1">{{ $amount < 1 || $amount > 1 ? 'Cursos' : 'Curso' }}</span>
          </a>
          <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>
            @php $lessons = skill_lessons($skill) @endphp
            {{ $lessons }} <span class="ml-1">{{ $lessons < 1 || $lessons > 1 ? 'Lecciones' : 'Lección' }}</span>
          </a>
          <a class="text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="h-4 w-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg> 
            {{ skill_time($skill) }} <span class="ml-2 hidden md:inline-block">Hrs.</span>
          </a>
        </div>
      </nav>
    </div>
    <div class="flex flex-wrap container mx-auto py-8 lg:py-16">
      <div class="flex flex-col w-full pt-12 pl-4 pr-4 lg:pt-0 lg:w-2/3 order-2 lg:order-1 text-center lg:text-left">
        <h1 class="my-4 text-3xl font-bold leading-tight">{{ $skill->name }}</h1>
        <p class="leading-normal text-lg mb-8 px-2 xl:px-0">
          {{ $skill->description }}
        </p>
      </div>
      <div class="flex w-full lg:w-1/3 order-1 lg:order-2 justify-center skill-icon">
        {!! $skill->icon !!}
      </div>
    </div>
  </section>
  <main class="mx-auto">
    <skill-courses :courses="{{ $skill->courses }}" :skill="{{ $skill }}"></skill-courses>
  </main>
@endsection