@extends('layouts.admin')

@section('title', 'Ver Habilidad')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'skills'
  ])

@endsection

@section('content')    
  <div class="bg-white border rounded shadow p-2">
    <form class="w-full">
      <div class="flex flex-wrap">
        <div class="w-full mb-3">
          <a href="{{ route('skills.index') }}" class="form-button-red">
            <i class="fa fa-arrow-left mr-2"></i>
            <span>Atras</span>
          </a>
          <a href="{{ route('skills.edit', $skill->id) }}" class="form-button-yellow">
            <i class="fa fa-pencil-alt mr-2"></i>
            <span>Editar</span>
          </a>
        </div>
        <div class="w-full">
          <label class="form-label" for="name">Habilidad</label>
          <input class="form-input" id="name" name="name" type="text" placeholder="Habilidad" onkeyup="generateSlug()" value="{{ old('name') ? old('name') : $skill->name }}">
        </div>
        
        <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
          <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
          <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') ? old('slug') : $skill->slug }}">
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 pr-1">
          <label class="form-label" for="description">Descripción / Resumen</label>
          <textarea class="form-input" name="description" id="description">{{ old('description') ? old('description') : $skill->description }}</textarea>
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-2 pl-1">
          <label class="form-label" for="icon">Icono</label>
          <textarea class="form-input" name="icon" id="icon">{{ old('icon') ? old('icon') : $skill->icon }}</textarea>
        </div>

        <div class="flex flex-col w-1/3 mb-1 pl-1 text-center">
          <strong>Cursos Publicados</strong>
          <span>{{ $skill->courses->where('is_publish', 1)->count() }}</span>
        </div>

        <div class="flex flex-col w-1/3 mb-1 pl-1 text-center">
          <strong>Cursos Pendiente</strong>
          <span>{{ $skill->courses->where('is_publish', 0)->count() }}</span>
        </div>

        <div class="flex flex-col w-1/3 mb-1 pl-1 text-center">
          <strong>Total Cursos</strong>
          <span>{{ $skill->courses->count() }}</span>
        </div>

      </div>
    </form>
  </div>
@endsection