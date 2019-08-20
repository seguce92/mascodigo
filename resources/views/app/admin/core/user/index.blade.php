@extends('layouts.admin')

@section('menu')
  <li class="mr-6 my-2 md:my-0">
    <a href="{{ route('home') }}" class="block py-1 md:py-3 pl-1 align-middle text-orange-600 no-underline hover:text-gray-900 border-b-2 hover:border-orange-600">
      <i class="fas fa-desktop mr-3"></i>
      <span class="pb-1 md:pb-0 text-sm">Inicio</span>
    </a>
  </li>
  <li class="mr-6 my-2 md:my-0">
    <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-pink-500 no-underline border-b-2 border-pink-500 hover:border-pink-500">
      <i class="fas fa-shield-alt mr-3"></i>
      <span class="pb-1 md:pb-0 text-sm">Roles</span>
    </a>
  </li>
  <li class="mr-6 my-2 md:my-0">
    <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
      <i class="fas fa-users mr-3"></i>
      <span class="pb-1 md:pb-0 text-sm">Usuarios</span>
    </a>
  </li>
  <li class="mr-6 my-2 md:my-0">
    <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
      <i class="fas fa-book mr-3"></i>
      <span class="pb-1 md:pb-0 text-sm">Cursos</span>
    </a>
  </li>
@endsection

@section('content')
  <div class="bg-white border rounded shadow p-2">
    <div class="flex mb-4">
      <div class="w-1/3 h-7">
        <a href="{{ route('users.create') }}" class="g-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded inline-flex items-center">
          <i class="fa fa-plus mr-2"></i>
          <span>Nuevo Usuario</span>
        </a>
      </div>
      <div class="w-1/3 h-7"></div>
      <div class="w-1/3 h-7 text-right">
        <div class="relative pull-right pl-4 pr-4 md:pr-0">
          <input type="search" placeholder="Buscar" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
          <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
            <i class="fa fa-search fill-current pointer-events-none text-gray-800 w-4 h-4"></i>
          </div>
        </div>
      </div>
    </div>
    <table class="text-left w-full border-collapse">
      <thead>
        <tr class="bg-gray-200">
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500">ID</th>
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500">NOMBRES</th>
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500">EMAIL</th>
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500">ROL</th>
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500">REGISTRADO</th>
          <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-500"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $users as $user )
          <tr class="hover:bg-gray-200">
            <td class="py-4 px-6 border-b text-gray-700 border-gray-300">{{ $user->id }}</td>
            <td class="py-4 px-6 border-b text-gray-700 border-gray-300">{{ $user->fullname }}</td>
            <td class="py-4 px-6 border-b text-gray-700 border-gray-300">{{ $user->email }}</td>
            <td class="py-4 px-6 border-b text-gray-700 border-gray-300"></td>
            <td class="py-4 px-6 border-b text-gray-700 border-gray-300">{{ $user->created_at->format('d/m/Y H:m') }}</td>
            <td class="py-4 px-6 border-b text-gray-500 border-gray-300">
              <a class="hover:text-blue-600" href="{{ route('users.show', $user->id) }}">
                <i class="fas fa-eye mr-2"></i>
              </a>
              <a class="hover:text-yellow-600 mr-2" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-pencil-alt"></i>
              </a>
              <a href="#" class="delete hover:text-red-600" data-route="{{ route('users.destroy', $user->id) }}">
                <i class="fa fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <hr>
    {!! $users->links('vendor.pagination.default') !!}
  </div>
@endsection