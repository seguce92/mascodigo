@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('menu-component')
  <menu-component type="learn" :logged="false"></menu-component>
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'courses'
  ])
@endsection

@section('content')
<section class="lg:py-10 lg:mt-10">
    <div class="container mx-auto flex flex-wrap pt-4 lg:py-12 max-900 justify-center">

        <div class="w-full max-w-sm mt-10">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Iniciar Sesión
                </div>
                <form class="w-full p-6 bg-gray-100" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            Correo Electrónico:
                        </label>
                        <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            Contraseña:
                        </label>
                        <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap items-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

            </div>
        </div>
        
    </div>
</section>
@endsection
