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