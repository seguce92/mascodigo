@extends('layouts.admin')

@section('title', 'Home')

@section ('menu')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('home') }}" class="block py-1 md:py-3 pl-1 align-middle text-orange-600 no-underline hover:text-gray-900 border-b-2 border-orange-600 hover:border-orange-600">
    <i class="fas fa-desktop mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Inicio</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
    <i class="fas fa-shield-alt mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Roles</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
    <i class="fas fa-users mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Usuarios</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
    <i class="fas fa-book mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Cursos</span>
  </a>
</li>
@endsection

@section('content')
<div class="flex flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600">
                        <svg class="fas fa-2x fa-fw fa-inverse mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M552 64H112c-20.858 0-38.643 13.377-45.248 32H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h496c13.255 0 24-10.745 24-24V88c0-13.255-10.745-24-24-24zM48 392V144h16v248c0 4.411-3.589 8-8 8s-8-3.589-8-8zm480 8H111.422c.374-2.614.578-5.283.578-8V112h416v288zM172 280h136c6.627 0 12-5.373 12-12v-96c0-6.627-5.373-12-12-12H172c-6.627 0-12 5.373-12 12v96c0 6.627 5.373 12 12 12zm28-80h80v40h-80v-40zm-40 140v-24c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H172c-6.627 0-12-5.373-12-12zm192 0v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-144v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0 72v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12z"/></svg>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Total Posts</h5>
                    <h3 class="font-bold text-3xl">0 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-pink-600">
                        <svg class="fa fa-2x fa-fw mr-3 fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 68.4l192 72v1.1l-192 78-192-78v-1.1l192-72zm32 356V275.5l160-65v133.9l-160 80z"/></svg>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Total Proyectos</h5>
                    <h3 class="font-bold text-3xl">0 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-blue-600">
                        <svg class="fa fa-2x fa-fw fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M496 224c-79.6 0-144 64.4-144 144s64.4 144 144 144 144-64.4 144-144-64.4-144-144-144zm64 150.3c0 5.3-4.4 9.7-9.7 9.7h-60.6c-5.3 0-9.7-4.4-9.7-9.7v-76.6c0-5.3 4.4-9.7 9.7-9.7h12.6c5.3 0 9.7 4.4 9.7 9.7V352h38.3c5.3 0 9.7 4.4 9.7 9.7v12.6zM320 368c0-27.8 6.7-54.1 18.2-77.5-8-1.5-16.2-2.5-24.6-2.5h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h347.1c-45.3-31.9-75.1-84.5-75.1-144zm-96-112c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128z"/></svg>
                    </div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Total Visitas</h5>
                    <h3 class="font-bold text-3xl">0 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-3">
        <div class="bg-white border rounded shadow p-2">
            {{--@foreach ( $posts->limit(10)->get() as $post )
            <div class="flex">
                <div class="flex-initial text-gray-700 text-center bg-gray-200 px-4 py-2 m-2">
                    {{ $loop->iteration }}
                </div>
                <div class="flex-initial text-gray-700 text-center bg-gray-200 px-4 py-2 m-2">
                    {{ $post->visit }}
                </div>
                <div class="flex-auto text-gray-700 bg-gray-200 px-4 py-2 m-2">
                    {{ $post->title }}
                </div>
                <div class="flex-auto text-gray-700 bg-gray-200 px-4 py-2 m-2 text-xs">
                    {{ url('/'.$post->slug) }}
                </div>
            </div>
            @endforeach--}}
        </div>
    </div>
</div>

@endsection