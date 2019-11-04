@extends('layouts.admin')

@section('title', ' - Roles')

@section('menu')
  @include('component.menu', [
    'option'  =>  'roles'
  ])
@endsection

@section('content')
  <div class="bg-white border rounded shadow p-2">
    <div class="flex mb-4">
      <div class="w-1/3 h-7">
        @can('crear roles')
        <a href="{{ route('roles.create') }}" class="g-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded inline-flex items-center">
          <i class="fa fa-plus mr-2"></i>
          <span>Nuevo Rol</span>
        </a>
        @endcan
      </div>
      <div class="w-1/3 h-7"></div>
      <div class="w-1/3 h-7 text-right">
        <form class="relative pull-right pl-4 pr-4 md:pr-0" action="{{ route('roles.index') }}" method="GET">
          <input type="search" placeholder="Buscar" value="{{ $q }}" name="q" id="q" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
          <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
            <i class="fa fa-search fill-current pointer-events-none text-gray-800 w-4 h-4"></i>
          </div>
          <button type="submit"></button>
        </form>
      </div>
    </div>
    <table class="text-left w-full border-collapse table-auto">
      <thead>
        <tr class="bg-gray-200">
          <th class="table-head">ID</th>
          <th class="table-head">ROL</th>
          <th class="table-head">REGISTRADO</th>
          <th class="table-head"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $roles as $role )
          <tr class="hover:bg-gray-200">
            <td class="table-content">{{ $role->id }}</td>
            <td class="table-content">{{ $role->name }}</td>
            <td class="table-content">{{ $role->created_at->format('d/m/Y H:m') }}</td>
            <td class="table-content">
              <a class="hover:text-blue-600" href="{{ route('roles.show', $role->id) }}">
                <i class="fas fa-eye mr-2"></i>
              </a>
              @can('editar roles')
              <a class="hover:text-yellow-600 mr-2" href="{{ route('roles.edit', $role->id) }}">
                <i class="fa fa-pencil-alt"></i>
              </a>
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    {!! $roles->links('vendor.pagination.default') !!}
  </div>
@endsection