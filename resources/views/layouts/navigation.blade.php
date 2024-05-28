<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
  class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
  class="fixed inset-y-0 left-0 z-30 w-64 transform overflow-y-auto bg-gray-900 transition duration-300 lg:static lg:inset-0 lg:translate-x-0">
  <div class="mt-8 flex items-center justify-center">
    <div class="flex items-center">
      <svg class="h-12 w-12" fill="none" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
          fill="#4C51BF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#4C51BF" />
        <path
          d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
          fill="white" />
      </svg>

      <span class="mx-2 text-2xl font-semibold text-white">{{ __('Dashboard') }}</span>
    </div>
  </div>

  <nav class="mt-10" x-data="{ isMultiLevelMenuOpen: false }">
    <x-nav-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}" wire:navigate>
      <x-slot name="icon">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" />
          <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" />
        </svg>
      </x-slot>
      {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link :active="request()->routeIs('users')" href="{{ route('users') }}" wire:navigate>
      <x-slot name="icon">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          </path>
        </svg>
      </x-slot>
      {{ __('Users') }}
    </x-nav-link>

    <x-nav-link :active="request()->routeIs('acercaDe')" href="{{ route('acercade') }}" wire:navigate>
      <x-slot name="icon">
        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
          stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
          <path
            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
          </path>
        </svg>
      </x-slot>
      {{ __('Acerca de...') }}
    </x-nav-link>

    <x-nav-link :active="request()->routeIs('iconos')" href="{{ route('iconos') }}" wire:navigate>
      <x-slot name="icon">
        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
          stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
          <path
            d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
          </path>
        </svg>
      </x-slot>
      {{ __('Muestra Icons') }}
    </x-nav-link>
    <x-nav-link :active="request()->routeIs('linkStorage')" :href="route('linkStorage')">
      {{ __('linkStorage') }}
    </x-nav-link>
    <x-nav-link :active="request()->routeIs('readStorage')" :href="route('readStorage')">
      {{ __('readStorage') }}
    </x-nav-link>
    <x-nav-link @click="isMultiLevelMenuOpen = !isMultiLevelMenuOpen" href="#">
      <x-slot name="icon">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          </path>
        </svg>
      </x-slot>
      Usuarios
    </x-nav-link>
    <template x-if="isMultiLevelMenuOpen">
      <ul aria-label="submenu"
        class="mx-4 mt-2 space-y-2 overflow-hidden rounded-md bg-gray-700 bg-opacity-50 p-2 text-sm font-medium text-white shadow-inner"
        x-transition:enter-end="opacity-100 max-h-xl" x-transition:enter-start="opacity-25 max-h-0"
        x-transition:enter="transition-all ease-in-out duration-300" x-transition:leave-end="opacity-0 max-h-0"
        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300">
        @include('includes.menu')
      </ul>
    </template>
  </nav>
</div>
