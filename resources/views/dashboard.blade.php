<x-app-layout>
  <x-slot name="header">
    {{ __('Pruebas de Livewire 3') }}
  </x-slot>

  <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="border-b border-gray-200 p-6">

      @livewire('forms.formulario')

      <br>
      @php
        $opciones = [
            ['id' => 1, 'name' => 'uno'],
            ['id' => 2, 'name' => 'dos'],
            ['id' => 3, 'name' => 'tres'],
            ['id' => 4, 'name' => 'cuatro'],
            ['id' => 55, 'name' => 'cinco'],
            ['id' => 44, 'name' => 'seis'],
        ];
        $seleccionadas = [2, 44, 4];
      @endphp

      @livewire('forms.select2', [$opciones, $seleccionadas])

    </div>
  </div>
</x-app-layout>
