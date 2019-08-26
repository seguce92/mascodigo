@extends('layouts.app')

@section('title', config('app.name', 'Laravel').' - '.$post->title)

@section('menu')
  @include('component.home-menu', [
    'opt' =>  'blog'
  ])
@endsection

@section('content')
  <main class="mx-auto">
    
  </main>
@endsection
