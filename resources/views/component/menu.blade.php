<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('home') }}" class="{{ $option == 'home' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-desktop mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Inicio</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="{{ $option == 'roles' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-shield-alt mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Roles</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('users.index') }}" class="{{ $option == 'users' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-users mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Usuarios</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('skills.index') }}" class="{{ $option == 'skills' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-tag mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Habilidades</span>
  </a>
</li>
<li class="mr-6 my-2 md:my-0">
  <a href="{{ route('courses.index') }}" class="{{ $option == 'courses' ? 'menu-active' : 'menu-item' }} md:py-3 hover:text-gray-900 hover:border-red-600">
    <i class="fas fa-book mr-3"></i>
    <span class="pb-1 md:pb-0 text-sm">Cursos</span>
  </a>
</li>