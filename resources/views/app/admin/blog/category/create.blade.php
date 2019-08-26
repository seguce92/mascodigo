@extends('layouts.admin')

@section('title', 'Categorias')

@section ('menu')

  @include('component.menu', [
    'option'    =>  'categories'
  ])

@endsection

@section('content')    
  <div class="bg-white border rounded shadow p-2">
    <form class="w-full" action="{{ route('skills.store') }}" method="POST">
      @csrf
      <div class="flex flex-wrap">
        <div class="w-full">
          <label class="form-label" for="title">Categoría</label>
          <input class="form-input" id="title" name="title" type="text" placeholder="Categoría" onkeyup="generateSlug()" value="{{ old('title') }}">
        </div>
        
        <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
          <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
          <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') }}">
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pr-1">
          <label class="form-label" for="description">Descripción / Resumen</label>
          <textarea class="form-input" name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pl-1">
          <label class="form-label" for="icon">Icono</label>
          <textarea class="form-input" name="icon" id="icon">{{ old('icon') }}</textarea>
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
      var title = document.getElementById("title");
      var slug = document.getElementById("slug");
      slug.value = window.Helper.slugify(title.value);
    }
  </script>
@endpush