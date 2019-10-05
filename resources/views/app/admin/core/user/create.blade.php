@extends('layouts.admin')

@section('title', ' - Nuevo Usuario')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'users'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full justify-center" action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="font-bold">REGISTRO DE NUEVO USUARIO</label>
      </div>
      <div class="w-full lg:w-6/12 md:w-6/12">
        <label class="form-label" for="username">Usuario</label>
        <input class="form-input" id="username" name="username" type="text" autofocus="true" placeholder="usuario" value="{{ old('username') }}" required>
      </div>

      <div class="w-full lg:w-6/12 md:w-6/12 pl-0 lg:pl-2 md:pl-2">
        <label class="form-label" for="email">Correo Electrónico</label>
        <input class="form-input" id="email" name="email" type="email" placeholder="example@example.com" value="{{ old('email') }}" required>
      </div>

      <div class="w-full lg:mb-1 md:mb-0 sm:mb-0">
        <label class="form-label capitalize" for="fullname">Nombre Completo</label>
        <input class="form-input" id="fullname" name="fullname" type="text" placeholder="Nombre Completo" value="{{ old('fullname') }}" required>
      </div>

      <div class="relative w-full md:w-1/2 lg:w-1/2 my-3 pr-1">
        <label class="form-label" for="role">Rol</label>
        <select name="roles[]" class="form-select" id="role" multiple>
          @foreach ( $roles as $role )
            <option value="{{ $role }}" {{ $loop->last ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
          @endforeach
        </select>
      </div>

      <div class="w-full mt-2">
        <a href="{{ route('users.index') }}" class="form-button-red">
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