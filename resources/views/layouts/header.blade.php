<header class="flex items-center justify-between border-b-4 border-indigo-600 bg-white px-6 py-4">
  <div class="flex items-center">
    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 6H20M4 12H20M4 18H11" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          stroke="currentColor" />
      </svg>
    </button>
  </div>
  <!--primary naviation Menu -->
  <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex">
        {{-- LOGO --}}
        <div class="flex shrink-0 items-center"><a
            href="{{ route('acercade') }}">{{ config('guzanet.aplicacion', 'Guz@net') }}</a>
        </div>

        <!-- Navigation Links -->
        <div class="flex justify-start align-middle">
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')" wire:navigate.hover>
              {{ __('Dashboard') }}
            </x-nav-link>
          </div>
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :active="request()->routeIs('prueba')" :href="route('prueba')" wire:navigate.hover>
              {{ __('Prueba') }}
            </x-nav-link>
          </div>
          {{-- THEME TOGGLER --}}
          <ul class="flex flex-shrink-0 items-center space-x-6">
            <li class="flex">
              <button @click="toggleTheme" aria-label="Toggle color mode"
                class="focus:shadow-outline-purple rounded-md focus:outline-none">
                <template x-if="!dark">
                  <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                  </svg>
                </template>

                <template x-if="dark">
                  <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path clip-rule="evenodd"
                      d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                      fill-rule="evenodd"></path>
                  </svg>
                </template>
              </button>
            </li>
          </ul>
          <x-dropdown>
            <x-slot name="trigger">
              <button @click="dropdownOpen = ! dropdownOpen" class="relative block overflow-hidden">
                {{ Auth::user()->name ?? null }}
              </button>
            </x-slot>

            <x-slot name="content">
              <x-dropdown-link href="{{ route('profile.edit') }}">
                {{ __('Profile') }}
              </x-dropdown-link>

              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-dropdown-link href="{{ route('logout') }}"
                  onclick="event.preventDefault(); this.closest('form').submit();">
                  {{ __('Log out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>

        </div>
      </div>
    </div>
  </div>
</header>
