@extends('layouts.admin')

@section('title', ' - Editar Canal')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'channels'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full justify-center" action="{{ route('channels.update', $channel->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="form-label" for="title">Título de Canal</label>
        <input class="form-input" id="title" name="title" type="text" autofocus="true" placeholder="Titulo de Canal" onkeyup="generateSlug()" value="{{ old('title') ? old('title') : $channel->title }}">
      </div>
      
      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label normal-case" for="slug">URL PERMANENTE: {{ url('/') }}/</label>
        <input class="form-input" id="slug" name="slug" type="text" placeholder="{{ url('/') }}" value="{{ old('slug') ? old('slug') : $channel->slug }}">
      </div>

      <div class="flex content-between sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
        <div class="relative w-4/5 mb-1 pr-1">
          <label class="form-label" for="icon">Icon Color</label>
          <select name="icon" onchange="changeIconColor()" id="icon" class="form-select">
            @php $keys = array_keys(config('seguce92.data.hexadecimal'))  @endphp
            @foreach ( $keys as $key )
              <option value="{{ config('seguce92.data.hexadecimal.'.$key) }}" {{ {{ config('seguce92.data.hexadecimal.'.$key) ? 'selected' : '' }} }}>{{ $key }}</option>
            @endforeach
          </select>
        </div>
        <div class="w-1/5 mb-1 mt-2">
          <div id="icon-color" class="border font-bold rounded-lg h-12 mt-6 w-12 text-center pt-3 shadow-lg text-gray-400">T</div>
        </div>
      </div>

      <div class="flex content-between sm:w-1/1 md:w-1/3 lg:w-1/3 xl:w-1/3 mb-1 pr-1">
        <div class="relative w-4/5 mb-1 pr-1">
          <label class="form-label" for="color">Color</label>
          <select name="color" onchange="changeColor()" id="color" class="form-select">
            @foreach ( config('seguce92.data.colors') as $color )
              <option value="{{ $color }}" {{ $color ? 'selected' : '' }}>{{ $color }}</option>
            @endforeach
          </select>
        </div>
        <div class="w-1/5 mb-1 mt-2">
          <div id="color-test" class="course rounded-lg h-12 mt-6 w-12 red"></div>
        </div>
      </div>

      <div class="w-full mt-4">
        <a href="{{ route('channels.index') }}" class="form-button-red">
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
    function changeIconColor() {
      var x = document.getElementById("icon").value;
      document.getElementById('icon-color').className = "border font-bold rounded-lg h-12 mt-6 w-12 text-center pt-3 shadow-lg " + x
    }
  </script>
@endpush