@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - Cursos')

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
