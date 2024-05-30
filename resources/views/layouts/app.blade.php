<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" lang="{{ str_replace('_', '-', config('guzanet.idioma')) }}"
  x-data="data()">

<head>
  <meta charset="utf-8">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Ramuel Gonzalez" name="author">
  <meta content="Laravel 11" name="description">
  <meta content="{{ csrf_token() }}" name="csrf-token">

  <title>{{ config('guzanet.aplicacion', 'Guz@net') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body>
  <div class="font-roboto flex h-screen bg-slate-200" x-data="{ sidebarOpen: false }">
    @include('layouts.navigation')

    <div class="flex flex-1 flex-col overflow-hidden">
      @include('layouts.header')

      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-slate-200">
        <x-forms.tw_mensajes />
        <div class="container mx-auto px-6 py-8">
          @if (isset($header))
            <h3 class="mb-4 text-3xl font-medium text-gray-700">
              {{ $header }}
            </h3>
          @endif
          {{-- USADO --}}
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
