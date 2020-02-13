<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Personal Portafolio Sergio Gualberto Cruz Espinoza">
  <meta name="author" content="Sergio Gualberto Cruz Espinoza">
  <meta name="keywords" content="mascodigo">
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">
  
  <script src="{{ mix('js/manifest.js') }}" defer></script>
  <script src="{{ mix('js/vendor.js') }}" defer></script>
  <script src="{{ mix('js/app.js') }}" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
  <!--link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"-->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @stack('style')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <nav id="header" class="bg-white fixed w-full z-40 top-0 shadow md:mb-3">
		<div class="w-full container px-3 xl:px-0 mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-3">
			<div class="w-1/2 pl-2 md:pl-0">
				<a href="{{ url('/') }}" class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold font-mono"> 
         {{ config('app.name') }}
        </a>
        @if ( \Auth::user()->is_premium )
          <span class="bg-orange-500 text-white text-xs px-2 py-05 rounded italic shadow">Premium</span>
        @endif
      </div>
			<div class="w-1/2 pr-0">
				<div class="flex relative inline-block float-right">
				  <div class="relative text-sm">
					  <button id="userButton" class="flex items-center focus:outline-none mr-3">
              <img class="w-8 h-8 rounded-full mr-4" src="{{ \Auth::user()->photo }}" alt="{{ \Auth::user()->email }}">
              <span class="hidden md:inline-block">Hola, {{ first_name(\Auth::user()->fullname) }} </span>
              <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/></g></svg>
            </button>
            <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
              <ul class="list-reset">
                <li><a href="{{ route('profile') }}" 
                  class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                  <svg class="w-4 h-4 fill-current inline-block mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"/></svg>
                  Mi Cuenta</a></li>
                <li><a href="{{ route('password.index') }}" 
                  class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">
                  <svg class="w-4 h-4 fill-current inline-block mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 256H152V152.9c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v16c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-16C376 68 307.5-.3 223.5 0 139.5.3 72 69.5 72 153.5V256H48c-26.5 0-48 21.5-48 48v160c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zM264 408c0 22.1-17.9 40-40 40s-40-17.9-40-40v-48c0-22.1 17.9-40 40-40s40 17.9 40 40v48z"/></svg>
                  Contraseña</a></li>
                <li><hr class="border-t mx-2 border-gray-400"></li>
                <li>
                  <a href="{{ route('logout') }}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <svg class="w-4 h-4 fill-current inline-block mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg>
                    Cerrar Sesion</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </div>
          </div>
          <div class="block lg:hidden">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>
        </div>
      </div>
      <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
        <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
          @yield('menu')
        </ul>				
      </div>
    </div>
  </nav>

	<div class="container w-full mx-auto pt-20 sm:pt-20 md:pt-10 lg:pt-24 xl:pt-20">
		<div id="app" class="w-full px-3 xl:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
			@error @enderror
			@alert @endalert
			@yield('content')	
		</div>
  </div> 
  
	<footer class="bg-white border-t border-gray-400 shadow inset-x-0 bottom-0 relative sm:absolute md:fixed lg:fixed xl:fixed">	
		<div class="py-2 text-center text-sm">
      Copyright &copy; <strong>Más Código</strong> {{ \Carbon\Carbon::now()->year }}
		</div>
	</footer>

<script>var ab=document.getElementById("userMenu");var userMenu=document.getElementById("userButton");var z=document.getElementById("nav-content");var x=document.getElementById("nav-toggle");document.onclick=check;function check(e){var target=(e&&e.target)||(event&&event.srcElement);if(!checkParent(target,ab)){if(checkParent(target,userMenu)){if(ab.classList.contains("invisible")){ab.classList.remove("invisible")}else{ab.classList.add("invisible")}}else{ab.classList.add("invisible")}}if(!checkParent(target,z)){if(checkParent(target,x)){if(z.classList.contains("hidden")){z.classList.remove("hidden")}else{z.classList.add("hidden")}}else{z.classList.add("hidden")}}}function checkParent(t,elm){while(t.parentNode){if(t==elm){return true}t=t.parentNode}return false}</script>
@stack('script')
</body>
</html>
