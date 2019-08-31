@extends('layouts.admin')

@section('title', ' - Nuevo Post')

@push('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.writer@latest/css/tail.writer-white.min.css">
  <style scoped>
    .tail-writer {
      border-color: #b0b4b854!important;
      box-shadow: 0 0 0 4px #fff!important;
      -moz-box-shadow: 0 0 0 4px #fff!important;
      -webkit-box-shadow: 0 0 0 4px #fff!important;
    }
  </style>
@endpush

@section ('menu')

  @include('component.menu', [
      'option'    =>  'posts'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full" action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="form-label" for="title">Título de Post</label>
        <input class="form-input" id="title" name="title" type="text" autofocus="true" placeholder="Titulo de Post" onkeyup="generateSlug()" value="{{ old('title') }}">
      </div>
      
      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
        <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') }}">
      </div>

      <div class="w-full">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">Contenido de Post</label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
      </div>

      <div class="w-full mt-2">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">Descripción</label>
        <textarea class="form-input" name="description" id="description" maxlength="180">{{ old('description') }}</textarea>
      </div>
    </div>

    <div class="flex flex-wrap self-start w-full lg:w-3/12 bg-white border rounded shadow p-2">
      <div class="w-full mb-1">
        <label class="form-label" for="description">Icono / Imagen(JPG,PNG,JPEG)</label>
        <file-upload id="image" url="admin/media/icon/post" :options="{ mime: 'image/jpg,image/png,image/jpeg' }"></file-upload>
      </div>

      <div class="relative w-full my-3 pr-1">
        <label class="form-label" for="category_id">Categoría</label>
        <select name="category_id" class="form-select" id="category_id">
          @foreach ( $categories as $category )
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div>

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
      <div class="w-full mt-4">
        <a href="{{ route('posts.index') }}" class="form-button-red">
          <i class="fa fa-times mr-2"></i>
          <span>Cancelar</span>
        </a>
        <button type="submit" class="form-button-blue">
          <i class="fa fa-paper-plane mr-2"></i>
          <span>Enviar</span>
        </button>
      </div>
    </div>
  </form>
@endsection

@push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.9.0/showdown.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tail.writer@latest/js/tail.writer-markdown.min.js"></script>
  <script src="{{ asset('js/es.js') }}"></script>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
      tail.writer("textarea#content",{resize:true,indentTab:false,indentSize:4,height:["200px","500px"],locale:"es",markup:"markdown",statusbar:true,toolbar:'full',tooltip:"top",width:"100%"});
    });
    function generateSlug() {
      var title = document.getElementById("title");
      var slug = document.getElementById("slug");
      slug.value = window.Helper.slugify(title.value);
    }
  </script>
@endpush