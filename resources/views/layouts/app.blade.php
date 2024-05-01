<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()"
  lang="{{ str_replace('_', '-', config('guzanet.idioma')) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ramuel Gonzalez">
  <meta name="description" content="Laravel 11">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('guzanet.aplicacion', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body wire:poll.15s>
  <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-slate-200 font-roboto">
    @include('layouts.navigation')

    <div class="flex overflow-hidden flex-col flex-1">
      @include('layouts.header')

      <main class="overflow-y-auto overflow-x-hidden flex-1 bg-slate-200">
        <x-forms.tw_mensajes />
        <div class="container px-6 py-8 mx-auto">
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
  {{-- <script src="{{ 'resources/js/init-alpine.js' }}"></script> --}}
  <script rel="script" type="text/javascript" src="resources/js/mod-dark.js"></script>

  @livewireScripts
</body>

</html>
