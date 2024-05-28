<!-- resources/views/components/admin-menu.blade.php -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
  <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')">
    {{ __('Dashboard') }}
  </x-nav-link>
  <x-nav-link :active="request()->routeIs('settings')" :href="route('settings')">
    {{ __('Settings') }}
  </x-nav-link>
  <x-nav-link :active="request()->routeIs('users')" :href="route('users')">
    {{ __('Users') }}
  </x-nav-link>
  <!-- Agrega más enlaces según sea necesario -->
</div>
