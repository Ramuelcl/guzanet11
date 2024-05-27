<!-- resources/views/components/admin-menu.blade.php -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')">
        {{ __('Settings') }}
    </x-nav-link>
    <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
        {{ __('Users') }}
    </x-nav-link>
    <!-- Agrega más enlaces según sea necesario -->
</div>
