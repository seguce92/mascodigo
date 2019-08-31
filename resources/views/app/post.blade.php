@extends('layouts.app')

@section('title', $post->title)

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ route('post', $post->slug) }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="object" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="{{ $post->title }}" />
  <meta property="og:description" content="{{ $post->description }}" />
  
  <meta property="og:image" content="{{ $post->image }}" />

  <meta itemprop="name" content="{{ $post->title }}">
  <meta itemprop="description" content="{{ $post->description }}">
  <meta itemprop="image" content="{{ $post->image }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="{{ $post->title }}">
  <meta name="twitter:description" content="{{ $post->description }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ $post->image }}">
@endsection

@push('style')
  <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
@endpush

@section('menu-component')
  <menu-component type="blog"></menu-component>
@endsection


@section('menu')
  @include('component.home-menu', [
    'opt' =>  'blog'
  ])
@endsection

@section('content')
  <main class="mx-auto container p-4">
    <article class="post-content mx-auto mb-8">
      <h1 class="text-center font-bold text-3xl py-3">{{ $post->title }}</h1>
      <h6 class="text-center text-base mb-6 text-gray-700">
        <time datetime="{{ $post->published_at->format('Y-m-d H:m:s') }}">{{ format_date_post($post->published_at) }}</time> - <span class="italic">{{ $post->author->username ? $post->author->username : $post->author->fullname  }}</span>
         - <a href="{{ route('category', $post->category->slug) }}" class="underline hover:text-gray-900 font-bold">{{ $post->category->title }}</a>
      </h6>
      <div class="markdown-body leading-loose">
        {!! \Illuminate\Mail\Markdown::parse($post->content) !!}
      </div>
    </article>
    
    <div class="post-content mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="bg-cover h-40" style="background-image: url('{{ asset('img/portlet/image4.jpg') }}');">
      </div>
      <div class="border-b px-4 pb-2">
        <div class="text-center sm:text-left sm:flex mb-2">
          <img class="mx-auto md:mx-0 h-32 w-32 rounded-full border-4 border-white -mt-16 lg:mr-4 lg:mx-0" src="https://randomuser.me/api/portraits/women/21.jpg" alt="">
          <div class="py-2 flex-col">
            <a href="{{ route('me', $post->author->username) }}" class="flex font-bold text-2xl mb-1" title="Ver más información de {{ $post->author->fullname }}">{{ $post->author->fullname }}</a>
            <div class="flex inline-flex text-gray-600 hover:text-gray-800 sm:flex items-center">
              <svg class="h-5 w-5 text-grey mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg>
              <a href="mailto:{{ $post->author->email }}" target="_blank">{{ $post->author->email }}</a>
            </div>
          </div>
        </div>
        <div class="flex justify-end text-gray-700 pb-2">
          @if ( $post->author->information && $post->author->information->facebook ) 
          <a class="hover:text-blue-700 ml-2" href="{{ $post->author->information }}" title="Facebook">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->twitter )
          <a class="hover:text-blue-500 ml-2" href="{{ $post->author->information->twitter }}" title="Twitter">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->youtube )
          <a class="hover:text-red-700 ml-2" href="{{ $post->author->information->youtube }}" title="Youtube">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->linkedin )
          <a class="hover:text-blue-600 ml-2" href="{{ $post->author->information->linkedin }}" title="Linkedin">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->medium )
          <a class="hover:text-gray-900 ml-2" href="{{ $post->author->information->medium }}" title="Medium">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 32v448h448V32H0zm372.2 106.1l-24 23c-2.1 1.6-3.1 4.2-2.7 6.7v169.3c-.4 2.6.6 5.2 2.7 6.7l23.5 23v5.1h-118V367l24.3-23.6c2.4-2.4 2.4-3.1 2.4-6.7V199.8l-67.6 171.6h-9.1L125 199.8v115c-.7 4.8 1 9.7 4.4 13.2l31.6 38.3v5.1H71.2v-5.1l31.6-38.3c3.4-3.5 4.9-8.4 4.1-13.2v-133c.4-3.7-1-7.3-3.8-9.8L75 138.1V133h87.3l67.4 148L289 133.1h83.2v5z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->pinterest )
          <a class="hover:text-red-900 ml-2" href="{{ $post->author->information->pinterest }}" title="Pinterest">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 80v352c0 26.5-21.5 48-48 48H154.4c9.8-16.4 22.4-40 27.4-59.3 3-11.5 15.3-58.4 15.3-58.4 8 15.3 31.4 28.2 56.3 28.2 74.1 0 127.4-68.1 127.4-152.7 0-81.1-66.2-141.8-151.4-141.8-106 0-162.2 71.1-162.2 148.6 0 36 19.2 80.8 49.8 95.1 4.7 2.2 7.1 1.2 8.2-3.3.8-3.4 5-20.1 6.8-27.8.6-2.5.3-4.6-1.7-7-10.1-12.3-18.3-34.9-18.3-56 0-54.2 41-106.6 110.9-106.6 60.3 0 102.6 41.1 102.6 99.9 0 66.4-33.5 112.4-77.2 112.4-24.1 0-42.1-19.9-36.4-44.4 6.9-29.2 20.3-60.7 20.3-81.8 0-53-75.5-45.7-75.5 25 0 21.7 7.3 36.5 7.3 36.5-31.4 132.8-36.1 134.5-29.6 192.6l2.2.8H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->github )
          <a class="hover:text-gray-900 ml-2" href="{{ $post->author->information->github }}" title="GitHub">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM277.3 415.7c-8.4 1.5-11.5-3.7-11.5-8 0-5.4.2-33 .2-55.3 0-15.6-5.2-25.5-11.3-30.7 37-4.1 76-9.2 76-73.1 0-18.2-6.5-27.3-17.1-39 1.7-4.3 7.4-22-1.7-45-13.9-4.3-45.7 17.9-45.7 17.9-13.2-3.7-27.5-5.6-41.6-5.6-14.1 0-28.4 1.9-41.6 5.6 0 0-31.8-22.2-45.7-17.9-9.1 22.9-3.5 40.6-1.7 45-10.6 11.7-15.6 20.8-15.6 39 0 63.6 37.3 69 74.3 73.1-4.8 4.3-9.1 11.7-10.6 22.3-9.5 4.3-33.8 11.7-48.3-13.9-9.1-15.8-25.5-17.1-25.5-17.1-16.2-.2-1.1 10.2-1.1 10.2 10.8 5 18.4 24.2 18.4 24.2 9.7 29.7 56.1 19.7 56.1 19.7 0 13.9.2 36.5.2 40.6 0 4.3-3 9.5-11.5 8-66-22.1-112.2-84.9-112.2-158.3 0-91.8 70.2-161.5 162-161.5S388 165.6 388 257.4c.1 73.4-44.7 136.3-110.7 158.3zm-98.1-61.1c-1.9.4-3.7-.4-3.9-1.7-.2-1.5 1.1-2.8 3-3.2 1.9-.2 3.7.6 3.9 1.9.3 1.3-1 2.6-3 3zm-9.5-.9c0 1.3-1.5 2.4-3.5 2.4-2.2.2-3.7-.9-3.7-2.4 0-1.3 1.5-2.4 3.5-2.4 1.9-.2 3.7.9 3.7 2.4zm-13.7-1.1c-.4 1.3-2.4 1.9-4.1 1.3-1.9-.4-3.2-1.9-2.8-3.2.4-1.3 2.4-1.9 4.1-1.5 2 .6 3.3 2.1 2.8 3.4zm-12.3-5.4c-.9 1.1-2.8.9-4.3-.6-1.5-1.3-1.9-3.2-.9-4.1.9-1.1 2.8-.9 4.3.6 1.3 1.3 1.8 3.3.9 4.1zm-9.1-9.1c-.9.6-2.6 0-3.7-1.5s-1.1-3.2 0-3.9c1.1-.9 2.8-.2 3.7 1.3 1.1 1.5 1.1 3.3 0 4.1zm-6.5-9.7c-.9.9-2.4.4-3.5-.6-1.1-1.3-1.3-2.8-.4-3.5.9-.9 2.4-.4 3.5.6 1.1 1.3 1.3 2.8.4 3.5zm-6.7-7.4c-.4.9-1.7 1.1-2.8.4-1.3-.6-1.9-1.7-1.5-2.6.4-.6 1.5-.9 2.8-.4 1.3.7 1.9 1.8 1.5 2.6z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->gitlab )
          <a class="hover:text-orange-700 ml-2" href="{{ $post->author->information->gitlab }}" title="GitLab">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M105.2 24.9c-3.1-8.9-15.7-8.9-18.9 0L29.8 199.7h132c-.1 0-56.6-174.8-56.6-174.8zM.9 287.7c-2.6 8 .3 16.9 7.1 22l247.9 184-226.2-294zm160.8-88l94.3 294 94.3-294zm349.4 88l-28.8-88-226.3 294 247.9-184c6.9-5.1 9.7-14 7.2-22zM425.7 24.9c-3.1-8.9-15.7-8.9-18.9 0l-56.6 174.8h132z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->codepen )
          <a class="hover:text-gray-900 ml-2" href="{{ $post->author->information->codepen }}" title="Codepen">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.285 159.704l-234-156c-7.987-4.915-16.511-4.96-24.571 0l-234 156C3.714 163.703 0 170.847 0 177.989v155.999c0 7.143 3.714 14.286 9.715 18.286l234 156.022c7.987 4.915 16.511 4.96 24.571 0l234-156.022c6-3.999 9.715-11.143 9.715-18.286V177.989c-.001-7.142-3.715-14.286-9.716-18.285zM278 63.131l172.286 114.858-76.857 51.429L278 165.703V63.131zm-44 0v102.572l-95.429 63.715-76.857-51.429L234 63.131zM44 219.132l55.143 36.857L44 292.846v-73.714zm190 229.715L61.714 333.989l76.857-51.429L234 346.275v102.572zm22-140.858l-77.715-52 77.715-52 77.715 52-77.715 52zm22 140.858V346.275l95.429-63.715 76.857 51.429L278 448.847zm190-156.001l-55.143-36.857L468 219.132v73.714z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->jsfiddle )
          <a class="hover:text-blue-900 ml-2" href="{{ $post->author->information->jsfiddle }}" title="JSFiddle">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M510.634 237.462c-4.727-2.621-5.664-5.748-6.381-10.776-2.352-16.488-3.539-33.619-9.097-49.095-35.895-99.957-153.99-143.386-246.849-91.646-27.37 15.25-48.971 36.369-65.493 63.903-3.184-1.508-5.458-2.71-7.824-3.686-30.102-12.421-59.049-10.121-85.331 9.167-25.531 18.737-36.422 44.548-32.676 76.408.355 3.025-1.967 7.621-4.514 9.545-39.712 29.992-56.031 78.065-41.902 124.615 13.831 45.569 57.514 79.796 105.608 81.433 30.291 1.031 60.637.546 90.959.539 84.041-.021 168.09.531 252.12-.48 52.664-.634 96.108-36.873 108.212-87.293 11.54-48.074-11.144-97.3-56.832-122.634zm21.107 156.88c-18.23 22.432-42.343 35.253-71.28 35.65-56.874.781-113.767.23-170.652.23 0 .7-163.028.159-163.728.154-43.861-.332-76.739-19.766-95.175-59.995-18.902-41.245-4.004-90.848 34.186-116.106 9.182-6.073 12.505-11.566 10.096-23.136-5.49-26.361 4.453-47.956 26.42-62.981 22.987-15.723 47.422-16.146 72.034-3.083 10.269 5.45 14.607 11.564 22.198-2.527 14.222-26.399 34.557-46.727 60.671-61.294 97.46-54.366 228.37 7.568 230.24 132.697.122 8.15 2.412 12.428 9.848 15.894 57.56 26.829 74.456 96.122 35.142 144.497zm-87.789-80.499c-5.848 31.157-34.622 55.096-66.666 55.095-16.953-.001-32.058-6.545-44.079-17.705-27.697-25.713-71.141-74.98-95.937-93.387-20.056-14.888-41.99-12.333-60.272 3.782-49.996 44.071 15.859 121.775 67.063 77.188 4.548-3.96 7.84-9.543 12.744-12.844 8.184-5.509 20.766-.884 13.168 10.622-17.358 26.284-49.33 38.197-78.863 29.301-28.897-8.704-48.84-35.968-48.626-70.179 1.225-22.485 12.364-43.06 35.414-55.965 22.575-12.638 46.369-13.146 66.991 2.474C295.68 280.7 320.467 323.97 352.185 343.47c24.558 15.099 54.254 7.363 68.823-17.506 28.83-49.209-34.592-105.016-78.868-63.46-3.989 3.744-6.917 8.932-11.41 11.72-10.975 6.811-17.333-4.113-12.809-10.353 20.703-28.554 50.464-40.44 83.271-28.214 31.429 11.714 49.108 44.366 42.76 78.186z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->reddit )
          <a class="hover:text-gray-900 ml-2" href="{{ $post->author->information->reddit }}" title="Reddit">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M283.2 345.5c2.7 2.7 2.7 6.8 0 9.2-24.5 24.5-93.8 24.6-118.4 0-2.7-2.4-2.7-6.5 0-9.2 2.4-2.4 6.5-2.4 8.9 0 18.7 19.2 81 19.6 100.5 0 2.4-2.3 6.6-2.3 9 0zm-91.3-53.8c0-14.9-11.9-26.8-26.5-26.8-14.9 0-26.8 11.9-26.8 26.8 0 14.6 11.9 26.5 26.8 26.5 14.6 0 26.5-11.9 26.5-26.5zm90.7-26.8c-14.6 0-26.5 11.9-26.5 26.8 0 14.6 11.9 26.5 26.5 26.5 14.9 0 26.8-11.9 26.8-26.5 0-14.9-11.9-26.8-26.8-26.8zM448 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-99.7 140.6c-10.1 0-19 4.2-25.6 10.7-24.1-16.7-56.5-27.4-92.5-28.6l18.7-84.2 59.5 13.4c0 14.6 11.9 26.5 26.5 26.5 14.9 0 26.8-12.2 26.8-26.8 0-14.6-11.9-26.8-26.8-26.8-10.4 0-19.3 6.2-23.8 14.9l-65.7-14.6c-3.3-.9-6.5 1.5-7.4 4.8l-20.5 92.8c-35.7 1.5-67.8 12.2-91.9 28.9-6.5-6.8-15.8-11-25.9-11-37.5 0-49.8 50.4-15.5 67.5-1.2 5.4-1.8 11-1.8 16.7 0 56.5 63.7 102.3 141.9 102.3 78.5 0 142.2-45.8 142.2-102.3 0-5.7-.6-11.6-2.1-17 33.6-17.2 21.2-67.2-16.1-67.2z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->telegram )
          <a class="hover:text-blue-700 ml-2" href="{{ $post->author->information->telegram }}" title="Telegram">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"/></svg>
          </a>
          @endif
          @if ( $post->author->information && $post->author->information->whatsapp )
          <a class="hover:text-green-800 ml-2" href="{{ $post->author->information->whatsapp }}" title="Whatsapp">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 122.8c-72.7 0-131.8 59.1-131.9 131.8 0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6 49.9-13.1 4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8 0-35.2-15.2-68.3-40.1-93.2-25-25-58-38.7-93.2-38.7zm77.5 188.4c-3.3 9.3-19.1 17.7-26.7 18.8-12.6 1.9-22.4.9-47.5-9.9-39.7-17.2-65.7-57.2-67.7-59.8-2-2.6-16.2-21.5-16.2-41s10.2-29.1 13.9-33.1c3.6-4 7.9-5 10.6-5 2.6 0 5.3 0 7.6.1 2.4.1 5.7-.9 8.9 6.8 3.3 7.9 11.2 27.4 12.2 29.4s1.7 4.3.3 6.9c-7.6 15.2-15.7 14.6-11.6 21.6 15.3 26.3 30.6 35.4 53.9 47.1 4 2 6.3 1.7 8.6-1 2.3-2.6 9.9-11.6 12.5-15.5 2.6-4 5.3-3.3 8.9-2 3.6 1.3 23.1 10.9 27.1 12.9s6.6 3 7.6 4.6c.9 1.9.9 9.9-2.4 19.1zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM223.9 413.2c-26.6 0-52.7-6.7-75.8-19.3L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5 29.9 30 47.9 69.8 47.9 112.2 0 87.4-72.7 158.5-160.1 158.5z"/></svg>
          </a>
          @endif
        </div>
      </div>
    </div>

    <div class="post-content mx-auto mt-4">
      <h4 class="text-center font-bold text-xl mt-8 mb-4">Post Relacionados</h4>
      <div class="flex justify-center flex-wrap container mx-auto">
        @foreach ( $posts as $post )
          <article class="w-full self-start md:w-1/2 lg:w-1/3 overflow-hidden mb-4 {{ $loop->index == 0 ? 'md:pr-1 lg:pr-1' : '' }} {{ $loop->index == 1 ? 'md:pl-1 lg:px-1' : '' }} {{ $loop->index == 2 ? 'lg:pl-1' : '' }}">
            <div class="rounded shadow-lg border post">
              <figure>
                <img class="w-full" src="{{ $post->image }}" alt="{{ $post->title }}" style="max-height:150px">
              </figure>
              <div class="px-4 py-4">
                <a href="{{ route('category', $post->category->slug) }}" class="text-sm text-gray-600 flex items-center">
                  {{ format_date_post($post->published_at) }}
                </a>
                <a href="{{ route('post', $post->slug) }}" class="font-bold hover:text-gray-700 mb-2">{{ $post->title }}</a>
              </div>
            </div>
          </article>
        @endforeach
        <aside class="w-full disqus mt-4">
          <div id="disqus_thread"></div>
        </aside>
      </div>
    </div>
  </main>
@endsection


@push('script')
  <script src="{{ asset('js/prism.js') }}"></script>
  <script>
    (function() {
      var d = document, s = d.createElement('script');
      s.src = 'https://https-mascodigo-net.disqus.com/embed.js';
      s.setAttribute('data-timestamp', +new Date());
      (d.head || d.body).appendChild(s);
    })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endpush