@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('content')
    <main id="app" class="mx-auto">
        <skill-courses :courses="{{ $skill->courses }}" :skill="{{ $skill }}"></skill-courses>
    </main>
@endsection