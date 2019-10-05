@extends('layouts.admin')

@section('title', ' - Habilidades')

@section('menu')
  @include('component.menu', [
    'option'  =>  'skills'
  ])
@endsection

@section('content')
  <div class="bg-white border rounded shadow p-2">
    <div class="flex mb-4">
      <div class="w-1/3 h-7">
        @can('crear habilidades')
        <a href="{{ route('skills.create') }}" class="form-button-blue">
          <i class="fa fa-plus mr-2"></i>
          <span>Nueva Habilidad</span>
        </a>
        @endcan
      </div>
      <div class="w-1/3 h-7"></div>
      <div class="w-1/3 h-7 text-right">
        <form class="relative pull-right pl-4 pr-4 md:pr-0" action="{{ route('skills.index') }}" method="GET">
          <input type="search" placeholder="Buscar" name="q" value="{{ $q }}" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
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
          <th class="table-head">HABILIDAD</th>
          <th class="table-head">SLUG</th>
          <th class="table-head">F. REGISTRO</th>
          <th class="table-head"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $skills as $skill )
          <tr class="hover:bg-gray-200">
            <td class="table-content">{{ $skill->id }}</td>
            <td class="table-content">{{ $skill->name }}</td>
            <td class="table-content">{{ $skill->slug }}</td>
            <td class="table-content">{{ $skill->created_at->format('d/m/Y H:m:s') }}</td>
            <td class="table-content">
              <a class="hover:text-blue-600" href="{{ route('skills.show', $skill->id) }}">
                <i class="fas fa-eye mr-2"></i>
              </a>
              @can('editar habilidades')
              <a class="hover:text-yellow-600 mr-2" href="{{ route('skills.edit', $skill->id) }}">
                <i class="fa fa-pencil-alt"></i>
              </a>
              @endcan
              @delete(['route' => route('skills.destroy', $skill->id)]) @enddelete
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    {!! $skills->links('vendor.pagination.default') !!}
  </div>
@endsection