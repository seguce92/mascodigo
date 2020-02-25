@extends('layouts.app')

@section('content')
<section class="py-4 lg:py-10 lg:mt-10">
    <div class="container mx-auto flex flex-wrap max-900 justify-center">

        <div class="w-full max-w-md">
            <div class="flex flex-col break-words bg-white md:border md:border-2 md:rounded md:shadow-md">
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Reestablecer Contraseña
                </div>
                <form class="w-full p-6 bg-gray-100" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="flex flex-wrap mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico</label>
                        <input id="email" type="email" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('email') ? 'border-red-500' : '' }}"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @if ( $errors->has('email') )
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                        <input id="password" type="password" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('password') ? 'border-red-500' : '' }}" 
                            name="password" required autocomplete="new-password">

                        @if ( $errors->has('password') )
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" 
                            class="text-xs bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Reestablecer Contraseña
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
