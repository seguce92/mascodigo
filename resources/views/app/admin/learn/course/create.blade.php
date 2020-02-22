@extends('layouts.admin')

@section('title', ' - Nuevo Curso')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'courses'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full" action="{{ route('courses.store') }}" method="POST">
    @csrf
    <div class="flex flex-wrap w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="form-label" for="title">Título de Curso</label>
        <input class="form-input" id="title" name="title" type="text" autofocus="true" placeholder="Titulo de Curso" onkeyup="generateSlug()" value="{{ old('title') }}">
      </div>
      
      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
        <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') }}">
      </div>

      <div class="w-full">
        <label class="form-label" for="template">Plantilla de Certificado</label>
        <input class="form-input" id="template" name="template" type="text" placeholder="Plantilla para el certificado" value="{{ old('template') }}">
      </div>

      <div class="relative w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
        <label class="form-label" for="skill_id">Habilidad</label>
        <select name="skill_id" class="form-select" id="skill_id">
          @foreach ( $skills as $skill )
            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="relative w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
        <label class="form-label" for="skill_id">Nivel</label>
        <select name="level" id="level" class="form-select">
          @foreach ( config('seguce92.data.level') as $level )
            <option value="{{ $level }}">{{ $level }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex content-between w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
        <div class="relative w-4/5 mb-1 pr-1">
          <label class="form-label" for="color">Color</label>
          <select name="color" onchange="changeColor()" id="color" class="form-select">
            @foreach ( config('seguce92.data.colors') as $color )
              <option value="{{ $color }}">{{ $color }}</option>
            @endforeach
          </select>
        </div>
        <div class="w-1/5 mb-1 mt-2">
          <div id="color-test" class="course rounded-lg h-12 mt-6 w-12 red"></div>
        </div>
      </div>

      <div class="w-full mb-1 pr-1">
        <label class="form-label" for="content">Descripción / Resumen</label>
        <textarea class="form-input h-32" name="content" id="content">{{ old('content') }}</textarea>
      </div>
    </div>

    <div class="flex flex-wrap self-start w-full lg:w-3/12 bg-white border rounded shadow p-2">
      <div class="w-full mb-1">
        <label class="form-label" for="description">Icono / Imagen(SVG)</label>
        <file-upload id="image" url="admin/media/icon/course" :options="{ mime: 'image/svg+xml' }"></file-upload>
      </div>
      <div class="w-full mb-1">
        <label class="form-label">estado de curso</label>
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
        <a href="{{ route('courses.index') }}" class="form-button-red">
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
  <script type="text/javascript">
    function generateSlug() {
      var title = document.getElementById("title");
      var slug = document.getElementById("slug");
      slug.value = window.Helper.slugify(title.value);
    }
    function changeColor() {
      var x = document.getElementById("color").value;
      document.getElementById('color-test').className = "course rounded-lg h-12 mt-6 w-12 " + x
    }
  </script>
@endpush