@extends('layouts.admin')

@section('title', ' - Nuevo Rol')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'roles'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full justify-center" action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="font-bold">REGISTRO DE NUEVO USUARIO</label>
      </div>

      <div class="w-full">
        <label class="form-label" for="name">Nombre de Rol</label>
        <input class="form-input" id="name" name="name" type="text" autofocus="true" value="{{ old('name') }}" required>
      </div>
      @foreach ( $permissions->chunk(4) as $group )
        <div class="w-full md:w-1/3 lg:w-1/3 mt-4">
          @foreach ( $group as $permission )
          <label class="flex items-center cursor-pointer">
            <input name="permission[]" type="checkbox" value="{{ $permission->id }}" class="form-checkbox">
            <span class="ml-2 capitalize">{{ $permission->name }}</span>
          </label>
          @endforeach
        </div>
      @endforeach

      <div class="w-full mt-2">
        <a href="{{ route('roles.index') }}" class="form-button-red">
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