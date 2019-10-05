@extends('layouts.admin')

@section('title', ' - Ver Rol')

@section ('menu')

  @include('component.menu', [
      'option'    =>  'roles'
  ])

@endsection

@section('content')
  <form class="flex flex-wrap lg:flex-no-wrap w-full justify-center">
    <div class="flex flex-wrap self-start w-full lg:w-9/12 bg-white border rounded shadow p-2 mr-0 lg:mr-2">
      <div class="w-full">
        <label class="font-bold">VER INFORMACION DE ROL</label>
      </div>

      <div class="w-full">
        <label class="form-label" for="name">Nombre de Rol</label>
        <input class="form-input" id="name" name="name" type="text" autofocus="true" value="{{ $role->name }}" disabled>
      </div>
      @foreach ( $permissions->chunk(4) as $group )
        <div class="w-full md:w-1/3 lg:w-1/3 mt-4">
          @foreach ( $group as $permission )
          <label class="flex items-center cursor-pointer">
            <input name="permission[]" type="checkbox" class="form-checkbox" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} disabled>
            <span class="ml-2 capitalize">{{ $permission->name }}</span>
          </label>
          @endforeach
        </div>
      @endforeach

      <div class="w-full mt-6">
        <a href="{{ route('roles.index') }}" class="form-button-red">
          <i class="fa fa-arrow-left mr-2"></i>
          <span>Atras</span>
        </a>
      </div>
    </div>
  </form>
@endsection