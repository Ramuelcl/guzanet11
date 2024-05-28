<x-app-layout>
  <x-slot name="header">
    {{ __('Pruebas de Livewire 3') }}
  </x-slot>

  <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="border-b border-gray-200">

      @livewire('forms.formulario')
      {{-- <livewire:forms.formulario lazy /> --}}

    </div>
  </div>
</x-app-layout>
