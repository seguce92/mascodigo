@extends('layouts.app')

@section('title', config('app.name', 'Más Código'))

@section('menu-component')
  <menu-component type="learn" :logged="false"></menu-component>
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'verify'
  ])
@endsection

@section('content')
<section class="lg:py-2">
    <div class="container mx-auto flex flex-wrap pt-4  max-900 justify-center">
        <div class="max-w-lg">
            <div class="flex flex-col break-words bg-white md:border md:border-2 md:rounded md:shadow-md">
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">Verifica tu Correo Electrónico</div>

                <div class="w-full p-6 bg-gray-100">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                        </div>
                    @endif

                    Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.
                    Si no recibiste el correo electrónico, <a class="text-blue-400 hover:underline hover:text-blue-600" href="{{ route('verification.resend') }}">haga clic aquí para solicitar otro</a>.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
