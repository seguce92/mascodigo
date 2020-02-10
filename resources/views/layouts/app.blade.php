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
    <div class="hidden lg:inline-block w-full lg:w-1/2 pl-2 md:pl-0">
      <span class="text-gray-400 ml-2 text-xs italic">{{ config('seguce92.data.message') }}</span>
    </div>
    <div class="w-full lg:w-1/2  pr-0">
      <div class="flex relative inline-block float-right">
        <div class="relative text-sm">
          <button id="userButton" class="flex items-center focus:outline-none mr-3 text-white">
            <img class="w-6 h-6 rounded-full mr-4" src="{{ \Auth::user()->photo }}" alt="{{ \Auth::user()->email }}">
            <span class="inline-block">Hola, {{ \Auth::user()->username }} </span>
            <svg class="pl-2 h-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
          </button>
          <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-8 top-0 right-0 min-w-full overflow-auto z-30 invisible">
            <ul class="list-reset">
              <li><a href="{{ route('profile') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mi Cuenta</a></li>
              <li><hr class="border-t mx-2 border-gray-400"></li>
              <li>
                <a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Cerrar Sesion</a>
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
