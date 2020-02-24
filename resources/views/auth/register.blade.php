<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <meta property="fb:app_id" content="334747354108904">
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="Más Código">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="es_ES" />
    <meta property="og:title" content="Más Código" />
    <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
    <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1200" />

    <meta itemprop="name" content="Más Código">
    <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
    <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@seguce92">
    <meta name="twitter:title" content="Más Código">
    <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
    <meta name="twitter:creator" content="@seguce92">
    <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">

    @include('component.icons')
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
        <menu-component type="learn"></menu-component>
        <section class="flex hidden lg:flex flex-wrap container mx-auto text-white">
            <nav class="select-none bg-grey flex justify-end items-stretch w-full">
                <div class="flex items-stretch flex-no-shrink h-12">
                    <div class="flex items-stretch justify-end ml-auto">            
                        @include('component.home-menu', [
                            'opt' =>  'register'
                        ])
                    </div>
                </div>
            </nav>
        </section>
        </header>
    </div>
    
    <section class="lg:py-2">
        <div class="container mx-auto flex flex-wrap pt-4  max-900 justify-center">
    
            <div class="w-full max-w-md">
                <div class="flex flex-col break-words bg-white md:border md:border-2 md:rounded md:shadow-md">
    
                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        FORMULARIO DE REGISTRO
                    </div>
                    <form class="w-full p-6 bg-gray-100" autocomplete="off" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="flex flex-wrap mb-6">
                            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                                Nombre de Usuario:
                            </label>
                            <input id="username" 
                                name="username"
                                type="text" 
                                autocomplete="off" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none {{ $errors->has('username') ? ' border-red-500' : '' }}"  
                                value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('username') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="fullname" class="block text-gray-700 text-sm font-bold mb-2">
                                Nombres y Apellidos:
                            </label>
                            <input id="fullname" 
                                type="text" 
                                autocomplete="off" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none {{ $errors->has('fullname') ? ' border-red-500' : '' }}" 
                                name="fullname" 
                                value="{{ old('fullname') }}" 
                                required>
                            @if ($errors->has('fullname'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('fullname') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Correo Electrónico:
                            </label>
                            <input id="email" 
                                type="email" 
                                autocomplete="off" 
                                placeholder="example@gmail.com" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none {{ $errors->has('email') ? ' border-red-500' : '' }}" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required>
                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                Contraseña:
                            </label>
                            <input id="password" 
                                type="password"
                                autocomplete="off"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none {{ $errors->has('password') ? ' border-red-500' : '' }}" 
                                name="password" 
                                required>
                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <progress id="progress" value="0" max="100" class="w-full h-1 bg-gray-200 mt-1 mb-1">70</progress>
                            <span id="progresslabel" class="text-xs text-gray-600"></span>
                        </div>
    
                        <div class="flex flex-wrap mb-6">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
                                Repite Contraseña:
                            </label>
                            <input id="password_confirmation" 
                                type="password"
                                autocomplete="off"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none {{ $errors->has('password_confirmation') ? ' border-red-500' : '' }}" 
                                name="password_confirmation" 
                                required>
                            @if ($errors->has('password_confirmation'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('password_confirmation') }}
                                </p>
                            @endif
                        </div>
    
                        <div class="flex flex-wrap items-center">
                            <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none">
                                Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
    @include ('component.footer')
    @if (\Auth::check() )
        <script>var ab=document.getElementById("userMenu");var userMenu=document.getElementById("userButton");document.onclick=check;document.addEventListener("#header_menu", function(evt){check()});function check(e){var target=(e&&e.target)||(event && event.srcElement);if(!checkParent(target,ab)){if(checkParent(target,userMenu)){if(ab.classList.contains("invisible")){ab.classList.remove("invisible")}else{ab.classList.add("invisible")}}else{ab.classList.add("invisible")}}}function checkParent(t,elm){while(t.parentNode){if(t==elm){return true}t=t.parentNode}return false}</script>
    @endif
    <script>
        var password=document.getElementById("password");password.addEventListener('keyup',function(){var pwd=password.value;if(pwd.length===0){document.getElementById("progresslabel").innerHTML="";document.getElementById("progress").value="0";return}var prog=[/[$@$!%*#?&]/,/[A-Z]/,/[0-9]/,/[a-z]/].reduce((memo,test)=>memo+test.test(pwd),0);if(prog>2&&pwd.length>7){prog++;}var progress="";var strength="";switch(prog){case 0:break;case 1:break;case 2:strength="25%  - La seguridad de la contraseña es mala";progress="25";break;case 3:strength="50% - La seguridad de la contraseña es aceptable";progress="50";break;case 4:strength="75% - La seguridad de la contraseña es buena";progress="75";break;case 5:strength="100% - La seguridad de la contraseña es muy buena";progress="100";break}document.getElementById("progresslabel").innerHTML=strength;document.getElementById("progress").value=progress;});
</script>
</body>
</html>
