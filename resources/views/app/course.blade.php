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
    <header class="hero box-shadow-hero" id="hero">
        <nav id="header" class="w-full z-50 text-white hero">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
                <div class="pl-4 flex items-center">
                    <a class="uppercase no-underline hover:no-underline font-bold text-2xl text-shadow-2xl"  href="{{ url('/') }}"> 
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 appearance-none focus:outline-none">
                        <svg class="fill-current h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20" id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                        <li class="mr-3">
                            <a class="w-full text-white font-bold uppercase inline-block py-2 px-4 text-black no-underline" href="#">Inicia Sesión</a>
                        </li>
                        <li class="mr-3">
                            <a class="w-full text-white inline-block py-2 px-4 text-black no-underline" href="#"><i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="flex flex-wrap container px-3 mx-auto text-white">
            <nav class="select-none bg-grey flex justify-end items-stretch w-full">
                <div class="flex items-stretch flex-no-shrink h-12">
                    <div class="flex items-stretch justify-end ml-auto">
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                            Blog</a>
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white border-b-4 font-bold flex items-center hover:bg-grey-dark">
                            Cursos</a>
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                            Acerca</a>
                    </div>
                </div>
            </nav>
        </section>
    </header>
    <section class="sticky top-0 px-3 mx-auto z-50 shadow hero">
        <nav class="flex justify-center items-stretch w-full container mx-auto">
            <div class="flex flex-no-shrink items-stretch h-12">
                <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
                    <i class="fa fa-list-alt mr-1"></i> 3 LECCIONES
                </a>
                <a class="border-r border-trans text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
                    <i class="far fa-clock mr-1"></i> 00:00:00
                </a>
                <a class="text-white text-xs md:text-sm lg:text-base font-mono px-6 flex-no-grow flex-no-shrink py-2 flex items-center">
                    <i class="fa fa-signal mr-1"></i> AVANZADO
                </a>
            </div>
        </nav>
    </section>
    <section class="pt-16 lg:pt-16 lg:pb-16 pb-16 px-3 text-white course laravel">
        <div class="flex flex-wrap container mx-auto">
            <div class="flex flex-col w-full pt-12 lg:pt-0 lg:w-2/3 order-2 lg:order-1 text-center lg:text-left">
                <p class="uppercase tracking-loose w-full">
                    <a href="#" class="skill rounded-full bg-gray-300 px-4 py-2 text-xs font-bold">Laravel</a>
                </p>
                <h1 class="my-4 text-3xl font-bold leading-tight">Main Hero Message to sell yourself!</h1>
                <p class="leading-normal text-lg mb-8">
                    Ut sunt aliqua incididunt sint ad et. Adipisicing consequat aliqua ad dolore dolor Lorem. Labore amet laboris anim voluptate sint nisi commodo minim sint nisi. Do cillum dolore anim laborum non occaecat culpa cupidatat ad exercitation labore.
                </p>
                <div class="w-full">
                    <a href="#" class="mr-4 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-3 px-8 border border-white hover:border-transparent rounded-full">
                        <i class="fa fa-play-circle mr-2"></i> INICIAR CURSO
                    </a>
                </div>
            </div>
            <div class="flex w-full lg:w-1/3 order-1 lg:order-2 justify-center">
                <div class="flex circle justify-center shadow-lg">
                    <svg class="w-5/5 lg:3/5 xl:3/5 ml-auto mr-auto text-5xl" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M637.5 241.6c-4.2-4.8-62.8-78.1-73.1-90.5-10.3-12.4-15.4-10.2-21.7-9.3-6.4.9-80.5 13.4-89.1 14.8-8.6 1.5-14 4.9-8.7 12.3 4.7 6.6 53.4 75.7 64.2 90.9l-193.7 46.4L161.2 48.7c-6.1-9.1-7.4-12.3-21.4-11.6-14 .6-120.9 9.5-128.5 10.2-7.6.6-16 4-8.4 22s129 279.6 132.4 287.2c3.4 7.6 12.2 20 32.8 15 21.1-5.1 94.3-24.2 134.3-34.7 21.1 38.3 64.2 115.9 72.2 127 10.6 14.9 18 12.4 34.3 7.4 12.8-3.9 199.6-71.1 208-74.5 8.4-3.5 13.6-5.9 7.9-14.4-4.2-6.2-53.5-72.2-79.3-106.8 17.7-4.7 80.6-21.4 87.3-23.3 7.9-2 9-5.8 4.7-10.6zm-352.2 72c-2.3.5-110.8 26.5-116.6 27.8-5.8 1.3-5.8.7-6.5-1.3-.7-2-129-266.7-130.8-270-1.8-3.3-1.7-5.9 0-5.9s102.5-9 106-9.2c3.6-.2 3.2.6 4.5 2.8 0 0 142.2 245.4 144.6 249.7 2.6 4.3 1.1 5.6-1.2 6.1zm306 57.4c1.7 2.7 3.5 4.5-2 6.4-5.4 2-183.7 62.1-187.1 63.6-3.5 1.5-6.2 2-10.6-4.5s-62.4-106.8-62.4-106.8L518 280.6c4.7-1.5 6.2-2.5 9.2 2.2 2.9 4.8 62.4 85.5 64.1 88.2zm12.1-134.1c-4.2.9-73.6 18.1-73.6 18.1l-56.7-77.8c-1.6-2.3-2.9-4.5 1.1-5s68.4-12.2 71.3-12.8c2.9-.7 5.4-1.5 9 3.4 3.6 4.9 52.6 67 54.5 69.4 1.8 2.3-1.4 3.7-5.6 4.7z"/></svg>
                </div>
            </div>
        </div>
    </section>

    <main id="app" class="mx-auto">
        <section class="sticky top-0 px-3 mx-auto bg-gray-200 z-50">
            <nav class="flex justify-between items-stretch w-full text-black container mx-auto">
                <div class="flex flex-no-shrink items-stretch h-12">
                    <a href="#" class="text-xs md:text-sm lg:text-base font-mono hover:bg-gray-300 px-3 text-gray-800 flex-no-grow flex-no-shrink py-2 flex items-center">
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
                        @for ( $i = 0; $i < 10; $i++ )
                            @include('component.lesson')
                        @endfor
                    </ul>
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
