@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('content')
  <main id="app" class="mx-auto">
    <courses :courses="{{ $courses }}" :skills="{{ $skills }}"></courses>
  </main>
@endsection
