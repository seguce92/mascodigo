<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('home') }}" class="{{ $option == 'home' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-desktop mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Inicio</span>
  </a>
</li>
@can('listar roles')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('roles.index') }}" class="{{ $option == 'roles' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-shield-alt mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Roles</span>
  </a>
</li>
@endcan
@can('listar usuarios')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="{{ $option == 'users' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-users mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Usuarios</span>
  </a>
</li>
@endcan
@can('listar habilidades')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('skills.index') }}" class="{{ $option == 'skills' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-bookmark mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Habilidades</span>
  </a>
</li>
@endcan
@can('listar cursos')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('courses.index') }}" class="{{ $option == 'courses' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-book mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Cursos</span>
  </a>
</li>
@endcan
@can('listar categorias')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('categories.index') }}" class="{{ $option == 'categories' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-tag mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Categorías</span>
  </a>
</li>
@endcan
@can('listar posts')
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('posts.index') }}" class="{{ $option == 'posts' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-newspaper mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Posts</span>
  </a>
</li>
@endcan
{{-- Learn Academy Section --}}

<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('channels.index') }}" class="{{ $option == 'channels' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M576 240c0-23.63-12.95-44.04-32-55.12V32.01C544 23.26 537.02 0 512 0c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64h33.7c-1.39 10.48-2.18 21.14-2.18 32 0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h74.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13C563.05 284.04 576 263.63 576 240zm-96 141.42l-33.05-26.44C392.95 311.78 325.12 288 256 288v-96c69.12 0 136.95-23.78 190.95-66.98L480 98.58v282.84z"/></svg>
    <span class="pb-1 md:pb-0 text-sm">Canales</span>
  </a>
</li>

<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('academic.index') }}" class="{{ $option == 'academic' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.667 21.333H21.333C9.536 21.333 0 30.869 0 42.667V384c0 11.776 9.536 21.333 21.333 21.333h256v64c0 8.619 5.184 16.405 13.163 19.691 8 3.307 17.152 1.493 23.253-4.608l48.917-48.917 48.917 48.917a21.34 21.34 0 0015.083 6.251c2.752 0 5.525-.533 8.171-1.643 7.979-3.285 13.163-11.072 13.163-19.691v-64h42.667c11.797 0 21.333-9.557 21.333-21.333V42.667c0-11.798-9.536-21.334-21.333-21.334zM170.667 320h-64c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h64c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333zm42.666-85.333H106.667c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h106.667c11.797 0 21.333 9.536 21.333 21.333 0 11.775-9.536 21.333-21.334 21.333zm-106.666-85.334c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h170.667c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333H106.667zm298.666 180.548v87.953l-27.584-27.584c-4.16-4.181-9.621-6.251-15.083-6.251s-10.923 2.069-15.083 6.251L320 417.835v-87.957c.555.32-42.667-29.227-42.667-73.877 0-47.147 38.208-85.333 85.333-85.333C409.792 170.667 448 208.853 448 256c0 51.581-41.907 73.551-42.667 73.881z"/><path d="M405.333 329.881v-.004c-.02.012-.015.011 0 .004z"/></svg>
    <span class="pb-1 md:pb-0 text-sm">Perfil Académico</span>
  </a>
</li>