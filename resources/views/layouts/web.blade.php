<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

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

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body class="leading-normal tracking-normal font-sans">
    <header class="hero" id="hero">
        <nav id="header" class="fixed w-full z-30 text-white hero">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
                <div class="pl-4 flex items-center">
                    <a class="uppercase no-underline hover:no-underline font-bold text-2xl text-shadow-2xl"  href="#"> 
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-800 hover:border-teal-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20" id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                        <li class="mr-3">
                            <a class="text-white font-bold uppercase inline-block py-2 px-4 text-black no-underline" href="#">Inicia Sesión</a>
                        </li>
                        <li class="mr-3">
                            <a class="text-white inline-block py-2 px-4 text-black no-underline" href="#"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="flex flex-wrap pt-12 lg:pt-32 pb-10 text-white container px-3 mx-auto">
            <div class="flex flex-col w-full pt-12 lg:pt-0 lg:w-1/2 order-2 lg:order-1 text-center lg:text-left">
                <p class="uppercase tracking-loose w-full">What business are you?</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">Main Hero Message to sell yourself!</h1>
                <p class="leading-normal text-2xl mb-8">Sub-hero message, not too long and not too short. Make it just right!</p>
                <div class="w-full">
                    <a href="#" class="mr-4 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
                        Suscribete
                    </a>
                    <a href="#" class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
                        Explorar Cursos
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2 order-1 lg:order-2">
                <img class="w-3/5 lg:2/5 ml-auto mr-auto" src="{{ asset('img/logo.png') }}">
            </div>
        </section>
    </header>

    <main id="app" class="mx-auto">

        <section id="courses" class="container mx-auto">
            <div class="text-center mt-10">
                <h1 class="font-bold text-xl uppercase text-shadow">Cursos Populares</h1>
            </div>
            <div class="flex justify-center">
                <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-6 px-3">
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                        <div class="bg-cover bg-center h-56 p-4" style="background-image: url(https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)">
                            <div class="flex justify-end">
                                <span class="bg-green-600 shadow px-2 text-sm text-white rounded-full">Gratis</span>
                                <span class="bg-yellow-600 shadow px-2 text-sm text-white rounded-full">Privado</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">titulo de curso</p>
                            <p class="text-gray-700">742 Evergreen Terracea lskdñalskdñlaks lñdkalñsdk ñlaskd ñlask ldñañlsdk ñlask dñaklsdñlka sñldk</p>
                        </div>
                        <div class="flex p-4 border-t border-gray-300 text-gray-600">
                            <div class="flex-1 inline-flex items-center text-xs">
                                <i class="far fa-list-alt mr-2"></i>
                                <p>3 Lecciones</p>
                            </div>
                            <div class="flex-1 inline-flex items-center text-xs text-gray-600">
                                <i class="far fa-clock mr-2"></i>
                                <p>01:00:00</p>
                            </div>
                        </div>
                        <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                            <div class="flex items-center pt-2">
                                <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3" style="background-image: url(https://images.unsplash.com/photo-1500522144261-ea64433bbe27?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=751&q=80)">
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Tiffany Heffner</p>
                                    <p class="text-sm text-gray-700">(555) 555-4321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="h-64" style="background:#880e4f">

    </footer>
    <script>
        var navMenuDiv = document.getElementById("nav-content");
	    var navMenu = document.getElementById("nav-toggle");
	    document.onclick = check;
	    function check(e) {
	        var target = (e && e.target) || (event && event.srcElement);
	        if (!checkParent(target, navMenuDiv)) {
		        if (checkParent(target, navMenu)) {
		            if (navMenuDiv.classList.contains("hidden")) {
			            navMenuDiv.classList.remove("hidden");
		            } else {navMenuDiv.classList.add("hidden");}
		        } else {
                    navMenuDiv.classList.add("hidden");
                }
	        }
	    }
	    function checkParent(t, elm) {
	        while(t.parentNode) {
		        if( t == elm ) {return true;}
		            t = t.parentNode;
	        }
	        return false;
	    }
    </script>
</body>
</html>
