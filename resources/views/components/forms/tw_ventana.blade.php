<!-- resources/views/components/forms/tw_ventana.blade.php -->
@props([
    'ancho' => 'w-full',
    'alto' => 'h-auto',
    'colorCuerpo' => 'bg-blue-300',
    'colorEncabezado' => 'bg-blue-400',
    'titulo' => null,
    'pie' => null,
])
<div class="{{ $colorCuerpo }} {{ $ancho }} text flex flex-col rounded-lg border border-gray-300 shadow-md">
  <!-- Slot para el encabezado -->
  @isset($titulo)
    <div class="tw_ventana_encabezado {{ $colorEncabezado }} flex items-center justify-between px-4 py-2">
      <h3 class="font-semibold">{{ $titulo }}</h3>
      {{-- TODO: implementar el cierre volviendo atras --}}
      {{-- <x-secondary-button class="focus:outline-none"
                          wire:click="$set('abrir',false)">Cerrar</x-secondary-button> --}}
    </div>
  @endisset


  <!-- Cuerpo -->
  <div class="tw_ventana_cuerpo {{ $colorCuerpo }} flex-grow px-4 py-6">
    <!-- Contenido del cuerpo -->
    {{ $slot }}
  </div>

  <!-- Slot para el pie -->
  @isset($pie)
    <div class="tw_ventana_pie {{ $colorEncabezado }} px-4 py-2">
      <!-- Contenido del pie -->
      {{ $pie }}
    </div>
  @endisset
</div>
