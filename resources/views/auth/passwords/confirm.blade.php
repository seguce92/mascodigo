@extends('layouts.app')

@section('content')
<section class="py-4 lg:py-10 lg:mt-10">
    <div class="container mx-auto flex flex-wrap max-900 justify-center">

        <div class="w-full max-w-md">
            <div class="flex flex-col break-words bg-white md:border md:border-2 md:rounded md:shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Confirmar Contraseña
                </div>
                <form class="w-full p-6 bg-gray-100" method="POST" action="{{ route('password.confirm') }}">
                    <p>Por favor confirma tu contraseña antes de continuar.</p>
                    @csrf

                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                        <input id="password" type="password" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('password') ? 'border-red-500' : '' }}" 
                            name="password" required autocomplete="current-password">

                        @if( $errors->has('password') )
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <button type="submit" class="text-xs bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Confirmar Contraseña
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-xs hover:text-blue-600 hover:underline text-blue-500" 
                                href="{{ route('password.request') }}">
                                Olvidaste tu Contraseña?
                            </a>
                        @endif
                    </div>
                </form>

            </div>
        </div>

    </div>
</section>
@endsection
