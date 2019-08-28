@extends('layouts.admin')

@section('title', ' - Ver Post')

@push('style')
  <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
@endpush

@section ('menu')

  @include('component.menu', [
      'option'    =>  'posts'
  ])

@endsection

@section('content')
  <div class="flex flex-wrap lg:flex-no-wrap w-full">
    
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full mt-4">
        <a href="{{ route('posts.index') }}" class="form-button-red">
          <i class="fa fa-arrow-left mr-2"></i>
          <span>Atras</span>
        </a>
        <button type="submit" class="form-button-yellow">
          <i class="fa fa-pencil-alt mr-2"></i>
          <span>Editar</span>
        </button>
      </div>
      <div class="w-full">
        <h1 class="font-bold text-lg mt-4">{{ $post->title }}</h1>
      </div>
      
      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label normal-case" for="slug">{{ route('post', $post->slug) }}/</label>
      </div>

      <div class="w-full">
        <div class="w-full markdown-body">
          {!! \Illuminate\Mail\Markdown::parse($post->content) !!}
        </div>
      </div>
    </div>

    <div class="flex flex-wrap self-start w-full lg:w-3/12 bg-white border rounded shadow p-2">
      <div class="w-full mb-1">
        <label class="form-label">estado de post</label>
        <label class="inline-flex items-center mr-5">
          <input type="radio" class="form-radio h-6 w-6" name="is_publish" value="1" checked>
          <span class="ml-2">Publicar</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" class="form-radio h-6 w-6" name="is_publish" value="0">
          <span class="ml-2">Borrador</span>
        </label>
      </div>

    </div>
  </div>
@endsection

@push('script')
  <script src="{{ asset('js/prism.js') }}"></script>
@endpush