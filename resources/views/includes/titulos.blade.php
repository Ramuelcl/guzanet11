<div>
  {{-- resources\views\includes\titulos.blade.php --}}
  @foreach ($campos as $campoNombre => $campoInfo)
    @php
      // Obtén el valor del campo actual
      $titulo1 = $campoInfo['titulo1'];
      $visible1 = $campoInfo['visible1'];
      $orderBy = $campoInfo['orderBy']; // Nuevo: Obtén la configuración de orderBy
    @endphp
    @if ($visible1)
      @if ($orderBy)
        <th class="px-4 py-2 text-center text-black dark:text-white"
            style="cursor: pointer;"
            wire:click="sortBy('{{ $campoNombre }}')">
        @else
        <th class="px-4 py-2 text-center text-black dark:text-white">
      @endif
      <div class="flex items-center justify-center">
        <span wire:click="sortBy('{{ $campoNombre }}')">{{ $titulo1 }}</span>
        {{-- <th class="px-4 py-2 text-center text-black dark:text-white"
          @if ($orderBy) wire:click="sortBy('{{ $campoNombre }}')" style="cursor: pointer;" @endif>
        <div class="flex items-center justify-center">
          <span>{{ $titulo1 }}</span>

      <th class="cursor-pointer"
          wire:click="fncOrden('{{ $field['name'] }}')"
          scope="col">
        <div class="flex items-center">
          {{ __($field['table']['titre']) }}
          <x-sort-icon campo="{{ $field['name'] }}"
                       :sortDir="$sortDir"
                       :sortField="$sortField" /> --}}


        @if ($orderBy && $sortBy === $campoNombre)
          {{-- Mostrar el icono de orden ascendente o descendente según la dirección --}}
          <x-forms.tw_icons :name="$sortDirection === 'asc' ? 'arrow-circle-up' : 'arrow-circle-down'" />
        @endif
      </div>
      </th>
    @endif
  @endforeach
</div>
