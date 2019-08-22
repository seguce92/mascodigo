@extends('layouts.admin')

@section('title', 'Nuevo Curso')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'courses'
  ])

@endsection

@section('content')    
  <div class="bg-white border rounded shadow p-2">
    <form class="w-full" action="{{ route('courses.store') }}" method="POST">
      @csrf
      <div class="flex flex-wrap">
        <div class="w-full">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">Título</label>
          <input class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" id="title" name="title" type="text" placeholder="Titulo" onkeyup="generateSlug()" value="{{ old('title') }}">
        </div>
        
        <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
          <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
          <input class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') }}">
        </div>

        <div class="relative w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="skill_id">Habilidad</label>
          <select name="skill_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="skill_id">
            @foreach ( $skills as $skill )
              <option value="{{ $skill->id }}">{{ $skill->name }}</option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <i class="fa fa-chevron-down mt-5"></i>
          </div>
        </div>
        <div class="relative w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="skill_id">Nivel</label>
          <select name="level" id="level" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            @foreach ( config('seguce92.data.level') as $level )
              <option value="{{ $level }}">{{ $level }}</option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <i class="fa fa-chevron-down mt-5"></i>
          </div>
        </div>
        <div class="flex content-between w-full sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
          <div class="relative w-4/5 mb-1 pr-1">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="color">Color</label>
            <select name="color" onchange="changeColor()" id="color" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
              @foreach ( config('seguce92.data.colors') as $color )
                <option value="{{ $color }}">{{ $color }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <i class="fa fa-chevron-down mt-5"></i>
            </div>
          </div>
          <div class="w-1/5 mb-1">
            <div id="color-test" class="course h-12 mt-6 w-12 red"></div>
          </div>
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pr-1">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">Descripción / Resumen</label>
          <textarea class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" name="description" id="description">{{ old('description') }}</textarea>
        </div>

        <div class="w-full sm:w-1/1 md:w-1/2 lg:w-1/2 xl:w-1/2 mb-1 pl-1">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">Icono</label>
          <textarea class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none" name="icon" id="icon">{{ old('icon') }}</textarea>
        </div>
        
        <div class="w-full">
          <a href="{{ route('skills.index') }}" class="hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded inline-flex items-center">
            <i class="fa fa-times mr-2"></i>
            <span>Cancelar</span>
          </a>
          <button type="submit" class="g-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded inline-flex items-center">
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
    function changeColor() {
      var x = document.getElementById("color").value;
      document.getElementById('color-test').className = "course h-12 mt-6 w-12 " + x
    }
  </script>
@endpush