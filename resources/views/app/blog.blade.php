@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Blog')

@section('seo')
  <meta property="fb:app_id" content="334747354108904">
  <meta property="og:url" content="{{ url('/blog') }}" />
  <meta property="og:site_name" content="Más Código">
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="es_ES" />
  <meta property="og:title" content="Más Código - Blog" />
  <meta property="og:description" content="{{ config('seguce92.data.description') }}" />
  
  <meta property="og:image" content="{{ asset('img/mc_logo.png') }}" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="1200" />

  <meta itemprop="name" content="Más Código - Blog">
  <meta itemprop="description" content="{{ config('seguce92.data.description') }}">
  <meta itemprop="image" content="{{ asset('img/mc_logo.png') }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@seguce92">
  <meta name="twitter:title" content="Más Código - Blog">
  <meta name="twitter:description" content="{{ config('seguce92.data.description') }}">
  <meta name="twitter:creator" content="@seguce92">
  <meta name="twitter:image:src" content="{{ asset('img/mc_logo.png') }}">
@endsection

@section('menu-component')
  @if (\Auth::check())
    <menu-component type="blog" :logged="true"></menu-component>
  @else
    <menu-component type="blog" :logged="false"></menu-component>
  @endif
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'blog'
  ])
@endsection

@section('content')
  <main class="mx-auto">
    <div class="flex justify-center flex-wrap container mx-auto mt-6 lg:mt-16">

      @foreach ( $posts as $post )
        <article class="max-w-sm w-full self-start lg:max-w-full lg:flex w-1/1 lg:w-1/2 p-2 mb-4">
          <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" 
            style="background-image: url('{{ asset($post->image) }}')" title="{{ $post->title }}">
          </div>
          <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
              <a href="{{ route('category', $post->category->slug) }}" class="text-sm text-gray-600 flex items-center mb-2">
                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"/></svg>
                {{ $post->category->title }}
              </a>
              <a href="{{ route('post', $post->slug) }}" class="text-gray-900 font-bold text-xl mb-2 hover:text-gray-700">{{ $post->title }}</a>
              <p class="text-gray-700 text-base mt-2">
                {{ excerpt($post->content) }}
              </p>
            </div>
            <div class="flex items-center">
              <img class="w-10 h-10 rounded-full mr-4" src="{{ $post->author->photo }}" alt="">
              <div class="text-sm">
                <a href="{{ url('/') }}" class="text-gray-900 leading-none hover:text-gray-700">{{ $post->author->fullname }}</a>
                <p class="text-gray-600">{{ format_date_post($post->published_at) }}</p>
              </div>
            </div>
          </div>
        </article>
      @endforeach

      <div class="w-full">
        {!! $posts->links('vendor.pagination.default') !!}
      </div>

    </div>
  </main>
@endsection
