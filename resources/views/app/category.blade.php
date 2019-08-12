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
            <nav class="select-none bg-grey flex justify-between items-stretch w-full">
                <div class="flex flex-no-shrink items-stretch h-12">
                    <a class="flex-no-grow flex-no-shrink leading-normal text-white no-underline flex items-center font-bold">CURSOS</a>
                </div>
                <div class="flex items-stretch flex-no-shrink h-12">
                    <div class="flex items-stretch justify-end ml-auto">
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                            Blog</a>
                        <a href="#" class="border-b-4 font-bold flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                            Cursos</a>
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                            Acerca</a>
                    </div>
                </div>
            </nav>
        </section>
    </header>

    <main id="app" class="mx-auto">

        <section class="sticky top-0 mx-auto bg-gray-200 z-50">
            <nav class="bg-grey px-3 flex justify-between items-stretch w-full text-black container mx-auto">
                <div class="flex flex-no-shrink items-stretch h-12">
                    <a href="#" class="flex-no-grow flex-no-shrink font-bold py-2 leading-normal flex items-center hover:text-gray-600">
                        Todos</a>
                    <a href="#" class="flex-no-grow flex-no-shrink py-2 px-4 leading-normal flex items-center hover:text-gray-600 text-gray-600">
                        Por Categoría</a>
                </div>
                <div class="flex items-stretch flex-no-shrink h-12">
                    <div class="flex items-stretch justify-end ml-auto">
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal no-underline flex items-center hover:bg-grey-dark">
                            <i class="fa fa-users"></i>
                        </a>
                        <a href="#" class="flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center hover:bg-grey-dark">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </section>

        <section id="courses" class="mx-auto">
            <div class="flex justify-center flex-wrap pb-8">
                <div class="flex justify-center flex-wrap container">
                    @for( $i = 0; $i < 12; $i++ )
                        @include('component.course')
                    @endfor
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
