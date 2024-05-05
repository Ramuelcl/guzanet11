<!-- resources/views/includes/menu.blade.php -->
<ul>
  <!-- Otros elementos del menú -->
  {{-- <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li> --}}
  <li class="px-2 py-1 transition-colors duration-150">
    <a class="w-full" href="{{ route('users') }}">Listado</a>
  </li>
  <li class="px-2 py-1 transition-colors duration-150">
    <a class="w-full" href="{{ route('users') }}">Roles</a>
  </li>
  <li class="px-2 py-1 transition-colors duration-150">
    <a class="w-full" href="{{ route('users') }}">Permisos</a>
  </li>
</ul>
