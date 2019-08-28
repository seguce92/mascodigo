@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - '.$post->title)

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
    <article class="post-content mx-auto">
      <h1 class="text-center font-bold text-3xl py-3">{{ $post->title }}</h1>
      <h6 class="text-center text-sm">{{ format_date_post($post->published_at) }}</h6>
      <h6 class="text-center mt-6 mb-4 pb-4 border-b">
        <a href="{{ route('category', $post->category->slug) }}" class="border border-red-500 hover:bg-red-500 hover:text-white text-red-500 font-bold py-2 px-4 rounded-full">{{ $post->category->title }}</a>
      </h6>
      <div class="markdown-body leading-loose">
        {!! \Illuminate\Mail\Markdown::parse($post->content) !!}
      </div>
    </article>
    
    <div class="post-content mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="bg-cover h-40" style="background-image: url('https://images.unsplash.com/photo-1522093537031-3ee69e6b1746?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a634781c01d2dd529412c2d1e2224ec0&auto=format&fit=crop&w=2098&q=80');"></div>
      <div class="border-b px-4 pb-6">
        <div class="text-center sm:text-left sm:flex mb-4">
          <img class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4" src="https://randomuser.me/api/portraits/women/21.jpg" alt="">
          <div class="py-2">
            <a href="{{ url('/') }}" class="font-bold text-2xl mb-1" title="{{ $post->author->fullname }}">{{ $post->author->fullname }}</a>
            <div class="inline-flex text-gray-700 sm:flex items-center">
              <svg class="h-5 w-5 text-grey mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg>
              <a href="mailto:{{ $post->author->email }}" target="_blank">{{ $post->author->email }}</a>
            </div>
          </div>
        </div>
        <div class="flex">
            
        </div>
      </div>
    </div>

    <div class="post-content mx-auto mt-4">
      <h4 class="text-center font-bold text-xl mt-8 mb-4">Post Relacionados</h4>
      <div class="flex justify-center flex-wrap container mx-auto">
        @foreach ( $posts as $post )
          <article class="w-full self-start md:w-1/2 lg:w-1/3 overflow-hidden mb-4 {{ $loop->index == 0 ? 'md:pr-1 lg:pr-1' : '' }} {{ $loop->index == 1 ? 'md:pl-1 lg:px-1' : '' }} {{ $loop->index == 2 ? 'lg:pl-1' : '' }}">
            <div class="rounded shadow-lg border">
              <img class="w-full" src="{{ $post->image }}" alt="{{ $post->title }}" style="max-height:150px">
              <div class="px-4 py-4">
                <a href="{{ route('category', $post->category->slug) }}" class="text-sm text-gray-600 flex items-center">
                  {{ format_date_post($post->published_at) }}
                </a>
                <a href="{{ route('post', $post->slug) }}" class="font-bold hover:text-gray-700 mb-2">{{ $post->title }}</a>
              </div>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </main>
@endsection


@push('script')
  <script src="{{ asset('js/prism.js') }}"></script>
@endpush