<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="{{ csrf_token() }}" name="csrf-token">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <title>{{ config('guzanet.Aplicacion') ?? '...Guzanet...' }}</title>
  @livewireStyles
</head>

<body>
  <div class="font-roboto flex h-screen bg-slate-200" x-data="{ sidebarOpen: false }">
    @include('layouts.navigation')

    <div class="flex flex-1 flex-col overflow-hidden">
      @include('layouts.header')

      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-slate-200">
        <div class="container mx-auto px-6 py-8">
          @if (isset($header))
            <h3 class="mb-4 text-3xl font-medium text-gray-700">
              {{ $header }}
            </h3>
          @endif

          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
  @stack('modals')
  @livewireScripts
  @stack('js')
</body>

</html>
