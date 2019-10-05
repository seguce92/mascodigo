@extends('layouts.admin')

@section('title', ' - Cambiar Contraseña')

@section ('menu')

  @include('component.menu', [
    'option'    =>  ''
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full" action="{{ route('password.store') }}" method="POST">
    @csrf
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-transparent lg:bg-white md:bg-white lg:border md:border rounded lg:shadow md:shadow lg:p-2 md:p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="font-bold">CAMBIAR CONTRASEÑA</label>
      </div>
      <div class="w-full lg:w-6/12 md:w-6/12">
        <label class="form-label" for="password">Contraseña</label>
        <input class="form-input" id="password" name="password" type="password" autofocus="true" required>
      </div>

      <div class="w-full lg:w-6/12 md:w-6/12 pl-0 lg:pl-2 md:pl-2">
        <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
        <input class="form-input" id="password_confirmation" name="password_confirmation" type="password" required>
      </div>
      <div class="w-full mt-4">
          <button type="submit" class="form-button-blue">
            <i class="fa fa-paper-plane mr-2"></i>
            <span>Cambiar Contraseña</span>
          </button>
        </div>
    </div>
  </form>
@endsection