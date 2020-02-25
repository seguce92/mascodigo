<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  @yield('seo')

  @include('component.icons')
  @stack('style')
</head>
<body class="leading-normal tracking-normal font-sans">
  @if (\Auth::check())
  <div id="header_menu" class="w-full px-2 lg:px-0 mx-auto flex flex-wrap items-center h-10 bg-gray-800" style="z-index:51">
    <div class="hidden md:inline-block w-full md:w-2/3 lg:w-1/2 pl-2 md:pl-0">
      <div class="h-5 text-gray-400 ml-2 text-xs italic md:text-xs overflow-hidden">{{ config('seguce92.data.message') }}</div>
    </div>
    <div class="w-full md:w-1/3 lg:w-1/2  pr-0">
      <div class="flex relative inline-block float-right">
        <div class="relative text-sm">
          <button id="userButton" class="flex items-center focus:outline-none mr-3 text-white">
            <img class="w-6 h-6 rounded-full mr-4" src="{{ \Auth::user()->photo }}" alt="{{ \Auth::user()->email }}">
            <span class="inline-block">Hola, {{ \Auth::user()->username }} </span>
            <svg class="pl-2 h-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
          </button>
          <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-8 top-0 right-0 min-w-full overflow-auto z-30 invisible">
            <ul class="list-reset">
              <li>
                <a href="{{ route('profile') }}" 
                  class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                  <svg class="w-4 h-4 fill-current inline-block text-gray-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                  Mi Cuenta
                </a>
              </li>
              <li><hr class="border-t mx-2 border-gray-400"></li>
              <li>
                <a href="{{ route('academic.index') }}" 
                  class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                  <svg class="w-4 h-4 fill-current inline-block text-gray-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.667 21.333H21.333C9.536 21.333 0 30.869 0 42.667V384c0 11.776 9.536 21.333 21.333 21.333h256v64c0 8.619 5.184 16.405 13.163 19.691 8 3.307 17.152 1.493 23.253-4.608l48.917-48.917 48.917 48.917a21.34 21.34 0 0015.083 6.251c2.752 0 5.525-.533 8.171-1.643 7.979-3.285 13.163-11.072 13.163-19.691v-64h42.667c11.797 0 21.333-9.557 21.333-21.333V42.667c0-11.798-9.536-21.334-21.333-21.334zM170.667 320h-64c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h64c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333zm42.666-85.333H106.667c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h106.667c11.797 0 21.333 9.536 21.333 21.333 0 11.775-9.536 21.333-21.334 21.333zm-106.666-85.334c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h170.667c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333H106.667zm298.666 180.548v87.953l-27.584-27.584c-4.16-4.181-9.621-6.251-15.083-6.251s-10.923 2.069-15.083 6.251L320 417.835v-87.957c.555.32-42.667-29.227-42.667-73.877 0-47.147 38.208-85.333 85.333-85.333C409.792 170.667 448 208.853 448 256c0 51.581-41.907 73.551-42.667 73.881z"/><path d="M405.333 329.881v-.004c-.02.012-.015.011 0 .004z"/></svg>
                  Académico
                </a>
              </li>
              <li><hr class="border-t mx-2 border-gray-400"></li>
              <li>
                <a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <svg class="w-4 h-4 fill-current inline-block text-gray-700 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168a24.2 24.2 0 010 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg>
                  Cerrar Sesión</a>
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
  <div id="app">
  <header class="hero box-shadow-hero" >
  @else
  <div id="app">
    <header class="hero box-shadow-hero">
    @endif
      @yield('menu-component')
      <section class="flex hidden lg:flex flex-wrap container mx-auto text-white">
        <nav class="select-none bg-grey flex justify-end items-stretch w-full">
          <div class="flex items-stretch flex-no-shrink h-12">
            <div class="flex items-stretch justify-end ml-auto">            
              @yield('menu')
            </div>
          </div>
        </nav>
      </section>
    </header>
    @yield('content')
  </div>
  @include ('component.footer')
  @if (\Auth::check() )
  <script>
    var ab=document.getElementById("userMenu");var userMenu=document.getElementById("userButton");//document.onclick=check;
    document.onclick=check;
    document.addEventListener("#header_menu", function(evt){
      check()
    });
    function check(e){var target=(e&&e.target)||(event && event.srcElement);if(!checkParent(target,ab)){if(checkParent(target,userMenu)){if(ab.classList.contains("invisible")){ab.classList.remove("invisible")}else{ab.classList.add("invisible")}}else{ab.classList.add("invisible")}}}
    function checkParent(t,elm){while(t.parentNode){if(t==elm){return true}t=t.parentNode}return false}
  </script>
  @endif
  @stack('script')
</body>
</html>
