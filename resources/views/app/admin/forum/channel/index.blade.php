@extends('layouts.admin')

@section('title', ' - Canales')

@section('menu')
  @include('component.menu', [
    'option'  =>  'channels'
  ])
@endsection

@section('content')
  <div class="bg-white border rounded shadow p-2">
    <div class="flex mb-4">
      <div class="w-1/3 h-7">
        @can('crear posts')
        <a href="{{ route('channels.create') }}" class="hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded inline-flex items-center">
          <i class="fa fa-plus mr-2"></i>
          <span>Nuevo Canal</span>
        </a>
        @endcan
      </div>
      <div class="w-1/3 h-7"></div>
      <div class="w-1/3 h-7 text-right">
        <form class="relative pull-right pl-4 pr-4 md:pr-0" action="{{ route('channels.index') }}" method="GET">
          @csrf
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
          <th class="table-head">TÍTULO</th>
          <th class="table-head">SLUG</th>
          <th class="table-head">F. REGISTRO</th>
          <th class="table-head"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $channels as $channel )
          <tr class="hover:bg-gray-200">
            <td class="table-content">{{ $channel->id }}</td>
            <td class="table-content">
              <a class="text-blue-500 hover:text-blue-600 hover:underline" href="{{ route('channels.show', $channel->id) }}">{{ $channel->title }}</a>
            </td>
            <td class="table-content">{{ $channel->slug }}</td>
            <td class="table-content">{{ $channel->created_at->format('d/m/Y H:m:s') }}</td>
            <td class="table-content">
              <a class="hover:text-blue-600" href="{{ route('channels.show', $channel->id) }}">
                <i class="fas fa-eye mr-2"></i>
              </a>
              @can('editar canales')
                <a class="hover:text-yellow-600 mr-2" href="{{ route('channels.edit', $channel->id) }}">
                  <i class="fa fa-pencil-alt"></i>
                </a>
              @endcan
              @can('eliminar canales')
                @delete(['route' => route('channels.destroy', $channel->id)])  @enddelete
              @endcan
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    {!! $channels->links('vendor.pagination.default') !!}
  </div>
@endsection