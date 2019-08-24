<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  @include('component.icons')
</head>
<body class="leading-normal tracking-normal font-sans">
  <div id="app">
    <header class="hero box-shadow-hero">
      <menu-component></menu-component>
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
    @yield('content')
  </div>
  @include ('component.footer')
</body>
</html>
