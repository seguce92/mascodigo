@extends('layouts.admin')

@section('title', 'Editar Habilidad')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'skills'
  ])

@endsection

@section('content')    
  <div class="bg-white border rounded shadow p-2">
    <form class="w-full" action="{{ route('skills.update', $skill->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="flex flex-wrap">
        <div class="w-full">
          <label class="form-label" for="name">Habilidad</label>
          <input class="form-input" id="name" name="name" type="text" placeholder="Habilidad" onkeyup="generateSlug()" value="{{ old('name') ? old('name') : $skill->name }}">
        </div>
        
        <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
          <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
          <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') ? old('slug') : $skill->slug }}">
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pr-1">
          <label class="form-label" for="description">Descripción / Resumen</label>
          <textarea class="form-input" name="description" id="description">{{ old('description') ? old('description') : $skill->description }}</textarea>
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pl-1">
          <label class="form-label" for="description">Icono</label>
          <textarea class="form-input" name="icon" id="icon">{{ old('icon') ? old('icon') : $skill->icon }}</textarea>
        </div>
        
        <div class="w-full">
          <a href="{{ route('skills.index') }}" class="form-button-red">
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
  </div>
@endsection

@push('script')
  <script type="text/javascript">
    function generateSlug() {
      var title = document.getElementById("name");
      var slug = document.getElementById("slug");
      slug.value = window.Helper.slugify(title.value);
    }
  </script>
@endpush