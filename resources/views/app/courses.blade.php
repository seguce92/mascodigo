@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Cursos')

@section('menu-component')
  <menu-component type="learn"></menu-component>
@endsection

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'courses'
  ])
@endsection

@section('content')
  <main class="mx-auto">
    <courses :courses="{{ $courses }}" :skills="{{ $skills }}"></courses>
  </main>
@endsection
