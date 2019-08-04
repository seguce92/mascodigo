<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
        .hero {
            background-color: #ff9d00;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23b71c1c' stroke-width='66.7' stroke-opacity='0' %3E%3Ccircle fill='%23ff9d00' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23fd9211' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23fb871c' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23f87d24' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23f4722b' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23ef6831' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%23ea5e36' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23e4543a' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%23dd4b3e' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23d64242' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23ce3945' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%23c53148' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23bc2a4a' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23b2234c' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%23a81c4e' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%239e174f' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%2393124f' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23880e4f' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
            /*
            background-color: #c62828;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='2000' height='2000' viewBox='0 0 800 800'%3E%3Cg fill='none' %3E%3Cg stroke='%23b71c1c' stroke-width='17'%3E%3Cline x1='-8' y1='-8' x2='808' y2='808'/%3E%3Cline x1='-8' y1='792' x2='808' y2='1608'/%3E%3Cline x1='-8' y1='-808' x2='808' y2='8'/%3E%3C/g%3E%3Cg stroke='%23b81d1d' stroke-width='16'%3E%3Cline x1='-8' y1='767' x2='808' y2='1583'/%3E%3Cline x1='-8' y1='17' x2='808' y2='833'/%3E%3Cline x1='-8' y1='-33' x2='808' y2='783'/%3E%3Cline x1='-8' y1='-783' x2='808' y2='33'/%3E%3C/g%3E%3Cg stroke='%23b91e1e' stroke-width='15'%3E%3Cline x1='-8' y1='742' x2='808' y2='1558'/%3E%3Cline x1='-8' y1='42' x2='808' y2='858'/%3E%3Cline x1='-8' y1='-58' x2='808' y2='758'/%3E%3Cline x1='-8' y1='-758' x2='808' y2='58'/%3E%3C/g%3E%3Cg stroke='%23ba1e1e' stroke-width='14'%3E%3Cline x1='-8' y1='67' x2='808' y2='883'/%3E%3Cline x1='-8' y1='717' x2='808' y2='1533'/%3E%3Cline x1='-8' y1='-733' x2='808' y2='83'/%3E%3Cline x1='-8' y1='-83' x2='808' y2='733'/%3E%3C/g%3E%3Cg stroke='%23bb1f1f' stroke-width='13'%3E%3Cline x1='-8' y1='92' x2='808' y2='908'/%3E%3Cline x1='-8' y1='692' x2='808' y2='1508'/%3E%3Cline x1='-8' y1='-108' x2='808' y2='708'/%3E%3Cline x1='-8' y1='-708' x2='808' y2='108'/%3E%3C/g%3E%3Cg stroke='%23bc2020' stroke-width='12'%3E%3Cline x1='-8' y1='667' x2='808' y2='1483'/%3E%3Cline x1='-8' y1='117' x2='808' y2='933'/%3E%3Cline x1='-8' y1='-133' x2='808' y2='683'/%3E%3Cline x1='-8' y1='-683' x2='808' y2='133'/%3E%3C/g%3E%3Cg stroke='%23bd2121' stroke-width='11'%3E%3Cline x1='-8' y1='642' x2='808' y2='1458'/%3E%3Cline x1='-8' y1='142' x2='808' y2='958'/%3E%3Cline x1='-8' y1='-158' x2='808' y2='658'/%3E%3Cline x1='-8' y1='-658' x2='808' y2='158'/%3E%3C/g%3E%3Cg stroke='%23be2121' stroke-width='10'%3E%3Cline x1='-8' y1='167' x2='808' y2='983'/%3E%3Cline x1='-8' y1='617' x2='808' y2='1433'/%3E%3Cline x1='-8' y1='-633' x2='808' y2='183'/%3E%3Cline x1='-8' y1='-183' x2='808' y2='633'/%3E%3C/g%3E%3Cg stroke='%23be2222' stroke-width='9'%3E%3Cline x1='-8' y1='592' x2='808' y2='1408'/%3E%3Cline x1='-8' y1='192' x2='808' y2='1008'/%3E%3Cline x1='-8' y1='-608' x2='808' y2='208'/%3E%3Cline x1='-8' y1='-208' x2='808' y2='608'/%3E%3C/g%3E%3Cg stroke='%23bf2323' stroke-width='8'%3E%3Cline x1='-8' y1='567' x2='808' y2='1383'/%3E%3Cline x1='-8' y1='217' x2='808' y2='1033'/%3E%3Cline x1='-8' y1='-233' x2='808' y2='583'/%3E%3Cline x1='-8' y1='-583' x2='808' y2='233'/%3E%3C/g%3E%3Cg stroke='%23c02424' stroke-width='7'%3E%3Cline x1='-8' y1='242' x2='808' y2='1058'/%3E%3Cline x1='-8' y1='542' x2='808' y2='1358'/%3E%3Cline x1='-8' y1='-558' x2='808' y2='258'/%3E%3Cline x1='-8' y1='-258' x2='808' y2='558'/%3E%3C/g%3E%3Cg stroke='%23c12424' stroke-width='6'%3E%3Cline x1='-8' y1='267' x2='808' y2='1083'/%3E%3Cline x1='-8' y1='517' x2='808' y2='1333'/%3E%3Cline x1='-8' y1='-533' x2='808' y2='283'/%3E%3Cline x1='-8' y1='-283' x2='808' y2='533'/%3E%3C/g%3E%3Cg stroke='%23c22525' stroke-width='5'%3E%3Cline x1='-8' y1='292' x2='808' y2='1108'/%3E%3Cline x1='-8' y1='492' x2='808' y2='1308'/%3E%3Cline x1='-8' y1='-308' x2='808' y2='508'/%3E%3Cline x1='-8' y1='-508' x2='808' y2='308'/%3E%3C/g%3E%3Cg stroke='%23c32626' stroke-width='4'%3E%3Cline x1='-8' y1='467' x2='808' y2='1283'/%3E%3Cline x1='-8' y1='317' x2='808' y2='1133'/%3E%3Cline x1='-8' y1='-333' x2='808' y2='483'/%3E%3Cline x1='-8' y1='-483' x2='808' y2='333'/%3E%3C/g%3E%3Cg stroke='%23c42726' stroke-width='3'%3E%3Cline x1='-8' y1='342' x2='808' y2='1158'/%3E%3Cline x1='-8' y1='442' x2='808' y2='1258'/%3E%3Cline x1='-8' y1='-458' x2='808' y2='358'/%3E%3Cline x1='-8' y1='-358' x2='808' y2='458'/%3E%3C/g%3E%3Cg stroke='%23c52727' stroke-width='2'%3E%3Cline x1='-8' y1='367' x2='808' y2='1183'/%3E%3Cline x1='-8' y1='417' x2='808' y2='1233'/%3E%3Cline x1='-8' y1='-433' x2='808' y2='383'/%3E%3Cline x1='-8' y1='-383' x2='808' y2='433'/%3E%3C/g%3E%3Cg stroke='%23c62828' stroke-width='1'%3E%3Cline x1='-8' y1='392' x2='808' y2='1208'/%3E%3Cline x1='-8' y1='-408' x2='808' y2='408'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            */
            /*background-color: #280042;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 1000'%3E%3Cg %3E%3Ccircle fill='%23280042' cx='50' cy='0' r='50'/%3E%3Cg fill='%23320044' %3E%3Ccircle cx='0' cy='50' r='50'/%3E%3Ccircle cx='100' cy='50' r='50'/%3E%3C/g%3E%3Ccircle fill='%233b0045' cx='50' cy='100' r='50'/%3E%3Cg fill='%23440046' %3E%3Ccircle cx='0' cy='150' r='50'/%3E%3Ccircle cx='100' cy='150' r='50'/%3E%3C/g%3E%3Ccircle fill='%234d0046' cx='50' cy='200' r='50'/%3E%3Cg fill='%23560046' %3E%3Ccircle cx='0' cy='250' r='50'/%3E%3Ccircle cx='100' cy='250' r='50'/%3E%3C/g%3E%3Ccircle fill='%235e0046' cx='50' cy='300' r='50'/%3E%3Cg fill='%23670045' %3E%3Ccircle cx='0' cy='350' r='50'/%3E%3Ccircle cx='100' cy='350' r='50'/%3E%3C/g%3E%3Ccircle fill='%236f0044' cx='50' cy='400' r='50'/%3E%3Cg fill='%23770043' %3E%3Ccircle cx='0' cy='450' r='50'/%3E%3Ccircle cx='100' cy='450' r='50'/%3E%3C/g%3E%3Ccircle fill='%237e0041' cx='50' cy='500' r='50'/%3E%3Cg fill='%2386003f' %3E%3Ccircle cx='0' cy='550' r='50'/%3E%3Ccircle cx='100' cy='550' r='50'/%3E%3C/g%3E%3Ccircle fill='%238d003c' cx='50' cy='600' r='50'/%3E%3Cg fill='%23940039' %3E%3Ccircle cx='0' cy='650' r='50'/%3E%3Ccircle cx='100' cy='650' r='50'/%3E%3C/g%3E%3Ccircle fill='%239a0036' cx='50' cy='700' r='50'/%3E%3Cg fill='%23a00033' %3E%3Ccircle cx='0' cy='750' r='50'/%3E%3Ccircle cx='100' cy='750' r='50'/%3E%3C/g%3E%3Ccircle fill='%23a5002f' cx='50' cy='800' r='50'/%3E%3Cg fill='%23aa002b' %3E%3Ccircle cx='0' cy='850' r='50'/%3E%3Ccircle cx='100' cy='850' r='50'/%3E%3C/g%3E%3Ccircle fill='%23af0027' cx='50' cy='900' r='50'/%3E%3Cg fill='%23b30f22' %3E%3Ccircle cx='0' cy='950' r='50'/%3E%3Ccircle cx='100' cy='950' r='50'/%3E%3C/g%3E%3Ccircle fill='%23b71c1c' cx='50' cy='1000' r='50'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: contain;*/
            /*height: 80vh;*/
        }
    </style>
</head>
<body class="leading-normal tracking-normal font-sans">
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
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
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
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

    <section class="hero" id="hero">
        <div class="pt-24 text-white">
            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                    <p class="uppercase tracking-loose w-full">What business are you?</p>
                    <h1 class="my-4 text-5xl font-bold leading-tight">Main Hero Message to sell yourself!</h1>
                    <p class="leading-normal text-2xl mb-8">Sub-hero message, not too long and not too short. Make it just right!</p>
                    <button class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-2 px-4 border border-white hover:border-transparent rounded-full">
                        Suscribete
                    </button>
                </div>
                <div class="w-full md:w-3/5 py-6 text-center">
                    <img class="w-full md:w-3/5 z-50 ml-auto mr-auto" src="{{ asset('img/logo.png') }}">
                </div>
            </div>
        </div>
    </section>

    <main id="app">

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
</body>
</html>
