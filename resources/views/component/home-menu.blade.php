@php
  $opt = isset($opt) ? $opt : 'default';
@endphp

<a href="{{ route('blog') }}" class="{{ $opt == 'blog' ? 'border-b-4 font-bold' : '' }} flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300">
  Blog</a>

<a href="{{ route('courses') }}" class="{{ $opt == 'courses' ? 'border-b-4 font-bold' : '' }} flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white flex items-center hover:text-gray-300">
  Cursos</a>

<a href="{{ route('discussions.index') }}" class="{{ $opt == 'discussions' ? 'border-b-4 font-bold' : '' }} flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white flex items-center hover:text-gray-300">
  Discusiones</a>

<!--a href="#" class="{{ $opt == 'about' ? 'border-b-4 font-bold' : '' }} flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300">
  Acerca</a-->