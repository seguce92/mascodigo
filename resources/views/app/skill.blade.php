@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'courses'
  ])
@endsection

@section('content')
  <main class="mx-auto">
    <skill-courses :courses="{{ $skill->courses }}" :skill="{{ $skill }}"></skill-courses>
  </main>
@endsection