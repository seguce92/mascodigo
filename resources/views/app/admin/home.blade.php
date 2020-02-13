@extends('layouts.admin')

@section('title', ' - Home')

@section ('menu')

@include('component.menu', [
    'option'    =>  'home'
])

@endsection

@section('content')

@unless ( \Auth::user()->is_premium )
<div class="flex mb-5">
    <div class="w-full bg-orange-500 px-3 py-2 text-white rounded italic text-sm shadow-lg">
        <svg class="w-5 h-5 fill-current inline-block mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path d="M176 80c-52.94 0-96 43.06-96 96 0 8.84 7.16 16 16 16s16-7.16 16-16c0-35.3 28.72-64 64-64 8.84 0 16-7.16 16-16s-7.16-16-16-16zM96.06 459.17c0 3.15.93 6.22 2.68 8.84l24.51 36.84c2.97 4.46 7.97 7.14 13.32 7.14h78.85c5.36 0 10.36-2.68 13.32-7.14l24.51-36.84c1.74-2.62 2.67-5.7 2.68-8.84l.05-43.18H96.02l.04 43.18zM176 0C73.72 0 0 82.97 0 176c0 44.37 16.45 84.85 43.56 115.78 16.64 18.99 42.74 58.8 52.42 92.16v.06h48v-.12c-.01-4.77-.72-9.51-2.15-14.07-5.59-17.81-22.82-64.77-62.17-109.67-20.54-23.43-31.52-53.15-31.61-84.14-.2-73.64 59.67-128 127.95-128 70.58 0 128 57.42 128 128 0 30.97-11.24 60.85-31.65 84.14-39.11 44.61-56.42 91.47-62.1 109.46a47.507 47.507 0 0 0-2.22 14.3v.1h48v-.05c9.68-33.37 35.78-73.18 52.42-92.16C335.55 260.85 352 220.37 352 176 352 78.8 273.2 0 176 0z"/></svg>
        Con plan <strong>Premium</strong> tienes acceso a todo el contenido de <strong>Más Código</strong>. <a href="#" class="underline hover:text-orange-700">Obtener cuenta premium</a>
    </div>
</div>
@endunless

@if ( \Auth::user()->hasRole('administrador') )

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-orange-600">
                    <svg class="fas fa-2x fa-fw fa-inverse mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M552 64H112c-20.858 0-38.643 13.377-45.248 32H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h496c13.255 0 24-10.745 24-24V88c0-13.255-10.745-24-24-24zM48 392V144h16v248c0 4.411-3.589 8-8 8s-8-3.589-8-8zm480 8H111.422c.374-2.614.578-5.283.578-8V112h416v288zM172 280h136c6.627 0 12-5.373 12-12v-96c0-6.627-5.373-12-12-12H172c-6.627 0-12 5.373-12 12v96c0 6.627 5.373 12 12 12zm28-80h80v40h-80v-40zm-40 140v-24c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H172c-6.627 0-12-5.373-12-12zm192 0v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-144v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0 72v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Total Posts</h5>
                <h3 class="font-normal text-3xl text-gray-700">{{ $posts->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-pink-600">
                    <svg class="fa fa-2x fa-fw mr-3 fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M239.1 6.3l-208 78c-18.7 7-31.1 25-31.1 45v225.1c0 18.2 10.3 34.8 26.5 42.9l208 104c13.5 6.8 29.4 6.8 42.9 0l208-104c16.3-8.1 26.5-24.8 26.5-42.9V129.3c0-20-12.4-37.9-31.1-44.9l-208-78C262 2.2 250 2.2 239.1 6.3zM256 68.4l192 72v1.1l-192 78-192-78v-1.1l192-72zm32 356V275.5l160-65v133.9l-160 80z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Total Cursos</h5>
                <h3 class="font-normal text-3xl text-gray-700">{{ $courses->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-blue-600">
                    <svg class="fa fa-2x fa-fw fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M496 224c-79.6 0-144 64.4-144 144s64.4 144 144 144 144-64.4 144-144-64.4-144-144-144zm64 150.3c0 5.3-4.4 9.7-9.7 9.7h-60.6c-5.3 0-9.7-4.4-9.7-9.7v-76.6c0-5.3 4.4-9.7 9.7-9.7h12.6c5.3 0 9.7 4.4 9.7 9.7V352h38.3c5.3 0 9.7 4.4 9.7 9.7v12.6zM320 368c0-27.8 6.7-54.1 18.2-77.5-8-1.5-16.2-2.5-24.6-2.5h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h347.1c-45.3-31.9-75.1-84.5-75.1-144zm-96-112c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Total Visitas</h5>
                <h3 class="font-normal text-3xl text-gray-700">{{ $posts->sum('view_count') }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="flex mt-5">
    <div class="w-full">
        <div class="bg-white border rounded shadow p-2 overflow-auto">
            @foreach ( $posts->take(10) as $post )
            <div class="flex">
                <div class="flex-initial text-gray-700 text-center bg-gray-200 px-4 py-2 m-2">
                    {{ $loop->iteration }}
                </div>
                <div class="flex-initial text-gray-700 text-center bg-gray-200 px-4 py-2 m-2">
                    {{ $post->view_count }}
                </div>
                <div class="flex-auto text-gray-700 bg-gray-200 px-4 py-2 m-2">
                    {{ $post->title }}
                </div>
                <div class="flex-auto text-gray-700 bg-gray-200 px-4 py-2 m-2 text-xs">
                    {{ url('/'.$post->slug) }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-pink-600">
                    <svg class="fa fa-2x fa-fw fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Cursos Disponibles</h5>
                <h3 class="font-normal text-2xl text-gray-700">{{ $courses->where('is_publish', 1)->count() }}</h3>
            </div>
        </div>
    </div>
    
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-orange-600">
                    <svg class="fas fa-2x fa-fw fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Total Lecciones</h5>
                <h3 class="font-normal text-2xl text-gray-700">{{ total_lessons() }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white border rounded shadow p-2">
        <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-blue-600">
                    <svg class="fa fa-2x fa-fw fa-inverse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"/></svg>
                </div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-700">Tiempo Total</h5>
                <h3 class="font-normal text-2xl text-gray-700">{{ total_time() }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1">
    <div class="mt-8 mb-3">
        <h2 class="font-semibold text-lg">Lecciones de {{ to_month(date('m')) }}</h2>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach ( $news as $lesson)
        <div class="bg-white border rounded shadow">
            <div class="flex flex-row p-2">
                <div class="flex-shrink pr-2">
                    <div class="rounded-full border-white border-2 p-3 bg-blue-600 course {{ $lesson->course->color }} shadow">
                        <img class="w-12 h-12" src="{{ $lesson->course->icon }}" alt="Icon">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="grid grid-cols-2">
                        <div class="font-semibold text-gray-700 text-xs uppercase">Lección {{ $lesson->order }}</div>
                        <time datetime="{{ $lesson->published_at->toDateString() }}" class="text-gray-600 text-xs text-right">{{ $lesson->published_human }}</time>
                    </div>
                    <a href="{{ route('lesson', ['order' => $lesson->order, 'course' => $lesson->course->slug]) }}"
                        class="text-base text-gray-700 hover:underline leading-tight tracking-tighter">
                        {{ $lesson->title }}
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 border-t font-mono">
                <time class="text-xs p-2 text-center">{{ $lesson->duration }}</time>
                <div class="text-xs text-center p-2 border-l border-r">
                    @if ( $lesson->is_private && $lesson->is_premium )
                        Premium
                    @elseif ( $lesson->is_private )
                        Estandar
                    @else
                        Gratis
                    @endif
                </div>
                <div class="text-xs text-center p-2">{{ $lesson->course->level }}</div>
            </div>
            <div class="flex">
                <div class="w-full bg-gray-300 p-2 rounded-b truncate">
                    <a href="{{ route('course', $lesson->course->slug) }}" 
                        title="{{ $lesson->course->title }}"
                        class="font-bold text-xs text-gray-800 hover:text-gray-900 hover:underline">
                        {{ $lesson->course->title }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="grid grid-cols-1">
    <div class="mt-6 mb-3">
        <h2 class="font-semibold text-lg">Contenido Pasado</h2>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    @foreach ( $lasted as $lesson )
        <div class="bg-white border rounded shadow">
            <div class="flex flex-row p-2">
                <div class="flex-shrink pr-2">
                    <div class="rounded-full border-white border-2 p-3 bg-blue-600 course {{ $lesson->course->color }} shadow">
                        <img class="w-12 h-12" src="{{ $lesson->course->icon }}" alt="Icon">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="grid grid-cols-2">
                        <div class="font-semibold text-gray-700 text-xs uppercase">Lección {{ $lesson->order }}</div>
                        <time datetime="{{ $lesson->created_at->toDateString() }}" class="text-gray-600 text-xs text-right">{{ $lesson->published_human }}</time>
                    </div>
                    <a href="{{ route('lesson', ['order' => $lesson->order, 'course' => $lesson->course->slug]) }}" class="text-base text-gray-700 hover:underline leading-tight tracking-tighter">
                        {{ $lesson->title }}
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 border-t font-mono">
                <time class="text-xs p-2 text-center">{{ $lesson->duration }}</time>
                <div class="text-xs text-center p-2 border-l border-r">
                    @if ( $lesson->is_private && $lesson->is_premium )
                        Premium
                    @elseif ( $lesson->is_private )
                        Estandar
                    @else
                        Gratis
                    @endif
                </div>
                <div class="text-xs text-center p-2">{{ $lesson->course->level }}</div>
            </div>
            <div class="flex">
                <div class="w-full bg-gray-300 p-2 rounded-b truncate">
                    <a href="{{ route('course', $lesson->course->slug) }}" 
                        title="{{ $lesson->course->title }}"
                        class="font-bold text-xs text-gray-800 hover:text-gray-900 hover:underline">
                        {{ $lesson->course->title }}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif

@endsection