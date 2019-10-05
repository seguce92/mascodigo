@extends('layouts.admin')

@section('title', ' - Nueva Lección')

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
      'option'    =>  'courses'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full" action="{{ route('lessons.store') }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    <div class="flex flex-wrap w-full lg:w-8/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full my-2 flex content-between">
        <div class="flex-1">
          <a href="{{ route('courses.index') }}" class="form-button-red">
            <i class="fa fa-arrow-left mr-2"></i>
            <span>Atras</span>
          </a>
          @if ( \Auth::id() == $course->author_id )
            @can('editar cursos')
            <a href="{{ route('courses.edit', $course->id) }}" class="form-button-yellow">
              <i class="fa fa-pencil-alt mr-2"></i>
              <span>Editar Curso</span>
            </a>
            @endcan
          @endif
        </div>
        <div class="flex-1 text-right">
          <span class="font-bold">NUEVA LECCIÓN</span>
        </div>
      </div>
      @can('crear lecciones')
      <div class="w-full">
        <label class="form-label" for="title">Título de Lección</label>
        <input class="form-input" id="title" name="title" type="text" autofocus="true" placeholder="Titulo de Lección" value="{{ old('title') }}">
      </div>
      
      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label normal-case" for="slug">URL 
          <span id="server" class="youtube">YouTube</span>
          <span id="server" class="vimeo">Vimeo</span>
          <span id="server" class="local">Local</span>
        </label>
        <input class="form-input" id="url" name="url" type="url" placeholder="Video url" value="{{ old('url') }}">
      </div>

      <div class="w-4/5 lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label" for="repository">Repositorio</label>
        <input class="form-input" id="repository" name="repository" type="text" placeholder="https://github.com/project-example" value="{{ old('repository') }}">
      </div>
      <div class="w-1/5 pl-1">
        <label class="form-label" for="order">Orden</label>
        <input class="form-input" id="order" name="order" type="number" min="1" value="{{ old('order') ? old('order') : $order }}">
      </div>

      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">Notas de la lección</label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
      </div>

      <div class="w-1/3">
        <label class="form-label">estado de lección</label>
        <label class="inline-flex items-center mr-5">
          <input type="radio" class="form-radio h-6 w-6" name="is_publish" value="1" checked>
          <span class="ml-2">Publicar</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" class="form-radio h-6 w-6" name="is_publish" value="0">
          <span class="ml-2">Borrador</span>
        </label>
      </div>

      <div class="w-1/3">
        <label class="form-label">Tipo</label>
        <label class="inline-flex items-center mr-5">
          <input type="radio" class="form-radio h-6 w-6" name="is_private" value="1" checked>
          <span class="ml-2">Privado</span>
        </label>
        <label class="inline-flex items-center">
          <input type="radio" class="form-radio h-6 w-6" name="is_private" value="0">
          <span class="ml-2">Público</span>
        </label>
      </div>
      <div class="w-1/3 flex">
        <div class="mr-1">
            <label class="form-label" for="duration">Duracion</label>
            <input class="form-input" id="duration" name="duration" type="text" placeholder="00:00:00" value="{{ old('duration') ? old('duration') : '00:00:00' }}">
        </div>
        <div>
            <label class="form-label" for="points">Puntos XP</label>
            <input class="form-input" id="points" name="points" type="number" min="0" placeholder="0" value="{{ old('points') ? old('points') : '0' }}">
        </div>
      </div>
      @endcan

      <div class="w-full mt-2">
        <button type="reset" class="form-button-red">
          <i class="fa fa-times mr-2"></i>
          <span>Reiniciar</span>
        </button>
        @can('crear lecciones')
        <button type="submit" class="form-button-blue">
          <i class="fa fa-paper-plane mr-2"></i>
          <span>Enviar</span>
        </button>
        @endcan
      </div>
    </div>

    <div class="flex flex-wrap self-start justify-start w-full lg:w-4/12 rounded">
      
      <div class="w-full">
        <div class="flex flex-col w-full list-reset select-none">
          <div class="flex course {{ $course->color }} sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
            <img class="p-1 bg-black-trans flex justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-white mr-3" 
              src="{{ $course->icon }}">
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <a href="{{ route('skill', $course->skill->slug) }}" class="font-semibold text-xs cursor-pointer text-white skill px-2 rounded-lg">{{ $course->skill->name }}</a>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold text-white">{{ $course->title }}</span>
              </div>
            </div>
          </div>
        </div>
        <ul class="flex flex-col w-full list-reset select-none shadow">
          @foreach ( $course->lessons as $lesson )
            <li class="lesson {{ $course->skill->slug }} flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-3">
              <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
                {{ $lesson->order }}
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex justify-between mb-1">
                  <h2 class="font-semibold text-sm">
                    Lección {{ $lesson->order }}
                  </h2>
                  <time class="text-xs text-grey-dark">{{ $lesson->duration }}</time>
                </div>
                <div class="text-sm text-grey-dark truncate">
                  @if( auth()->user()->can('editar lecciones') )
                    <a href="{{ route('lessons.show', $lesson->id) }}" class="text-lg font-bold hover:underline">{{ $lesson->title }}</a>
                  @else
                    <a class="text-lg font-bold hover:underline">{{ $lesson->title }}</a>
                  @endif
                </div>
              </div>
            </li>
          @endforeach
        </ul>
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
  </script>
@endpush