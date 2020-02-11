@extends('layouts.admin')

@section('title', ' - Cursos')

@section('menu')
  @include('component.menu', [
    'option'  =>  'academic'
  ])
@endsection

@section('content')
  <academic></academic>
@endsection