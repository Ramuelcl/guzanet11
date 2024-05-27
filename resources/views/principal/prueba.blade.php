<x-app-layout>
  <div class="flex content-between justify-between">
    <h2 class="font-extrabold"> {{ __('prueba') }}</h2>

  </div>
  <div>
    <div>
      <div class="border-b border-gray-200 p-6">
        {{ __('Prueba') }}
        @persist('player')
          <audio controls src="{{ asset('audios/Abba - Chiquitita.mp3') }}"></audio>
        @endpersist
      </div>
    </div>
</x-app-layout>
