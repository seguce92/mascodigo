@extends('layouts.admin')

@section('title', ' - Categorias')

@section ('menu')

  @include('component.menu', [
    'option'    =>  'categories'
  ])

@endsection

@section('content')    
  <div class="bg-white border rounded shadow p-2">
    <div class="w-full">
      <div class="flex flex-wrap">
        <div class="w-full mt-4">
          <a href="{{ route('categories.index') }}" class="form-button-red">
            <i class="fa fa-arrow-left mr-2"></i>
            <span>Atras</span>
          </a>
          <button type="submit" class="form-button-yellow">
            <i class="fa fa-pencil-alt mr-2"></i>
            <span>Editar</span>
          </button>
        </div>
        <div class="w-full">
          <label class="form-label" for="title">Título</label>
          <input class="form-input" id="title" name="title" type="text" readonly value="{{ $category->title }}">
        </div>
        
        <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
          <label class="form-label normal-case" for="slug">SLUG - URL PERMANENTE: {{ url('/') }}/</label>
          <input class="form-input" id="slug" name="slug" type="text" readonly value="{{ $category->slug }}">
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection