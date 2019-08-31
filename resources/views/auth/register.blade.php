@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('menu-component')
  <menu-component type="learn"></menu-component>
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
                    REGISTRATE
                </div>
                <h2 class="p-4">Esta opcion aun se encuentra en desarrollo</h2>
            </div>
        </div>
    </div>
</section>
@endsection
