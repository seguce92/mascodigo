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
  <a href="{{ route('academic.index') }}" class="{{ $option == 'academic' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.667 21.333H21.333C9.536 21.333 0 30.869 0 42.667V384c0 11.776 9.536 21.333 21.333 21.333h256v64c0 8.619 5.184 16.405 13.163 19.691 8 3.307 17.152 1.493 23.253-4.608l48.917-48.917 48.917 48.917a21.34 21.34 0 0015.083 6.251c2.752 0 5.525-.533 8.171-1.643 7.979-3.285 13.163-11.072 13.163-19.691v-64h42.667c11.797 0 21.333-9.557 21.333-21.333V42.667c0-11.798-9.536-21.334-21.333-21.334zM170.667 320h-64c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h64c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333zm42.666-85.333H106.667c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h106.667c11.797 0 21.333 9.536 21.333 21.333 0 11.775-9.536 21.333-21.334 21.333zm-106.666-85.334c-11.797 0-21.333-9.557-21.333-21.333 0-11.797 9.536-21.333 21.333-21.333h170.667c11.797 0 21.333 9.536 21.333 21.333 0 11.776-9.536 21.333-21.333 21.333H106.667zm298.666 180.548v87.953l-27.584-27.584c-4.16-4.181-9.621-6.251-15.083-6.251s-10.923 2.069-15.083 6.251L320 417.835v-87.957c.555.32-42.667-29.227-42.667-73.877 0-47.147 38.208-85.333 85.333-85.333C409.792 170.667 448 208.853 448 256c0 51.581-41.907 73.551-42.667 73.881z"/><path d="M405.333 329.881v-.004c-.02.012-.015.011 0 .004z"/></svg>
    <span class="pb-1 md:pb-0 text-sm">Perfil Académico</span>
  </a>
</li>