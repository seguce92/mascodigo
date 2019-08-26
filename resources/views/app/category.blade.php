@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'blog'
  ])
@endsection

@section('content')
  <main class="mx-auto">

    <courses :courses="{{ $courses }}" :skills="{{ $skills }}"></courses>

  </main>
@endsection
