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
    <header class="hero box-shadow-hero" id="hero">
        <nav id="header" class="w-full z-50 text-white">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
                <div class="pl-4 flex items-center">
                    <a class="uppercase no-underline hover:no-underline font-bold text-2xl text-shadow-2xl"  href="{{ url('/') }}"> 
                        {{ config('app.name') }}
                    </a>
                </div>
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="items-center px-3 py-2 appearance-none focus:outline-none">
                        <div class="bar1"></div><div class="bar2"></div><div class="bar3"></div>
                    </button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20" id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                        <li class="mr-3">
                            <a class="w-full text-white font-bold uppercase inline-block py-2 px-4 text-black no-underline" href="#">Inicia Sesión</a>
                        </li>
                        <li class="mr-3 lg:hidden">
                            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                                Blog
                            </a>
                        </li>
                        <li class="mr-3 lg:hidden">
                            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="{{ route('courses') }}">
                                Cursos
                            </a>
                        </li>
                        <li class="mr-3 lg:hidden">
                            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                                Acerca
                            </a>
                        </li>
                        <li class="mr-3">
                            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="#">
                                <svg class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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

    @include ('component.footer')
    
</body>
</html>
