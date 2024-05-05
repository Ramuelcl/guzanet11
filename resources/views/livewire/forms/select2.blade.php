<div class="min-h-36 m-0 max-h-36 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">
  <div class="text-nowrap text-base text-blue-500 dark:text-blue-100">
    {{-- <button class=""
            type="button"
            wire:click="$toggle('vIndex')">@</button> --}}
    <div class="scrollbar-w-2 scrollbar-track-blue-100 scrollbar-thumb-blue-400 max-h-32 overflow-y-auto"
         wire:poll.15s>

      @foreach ($opciones as $index => $opcion)
        <div class="flex items-center justify-between"
             wire:key="{{ $claveUnica }}-{{ $index }}">
          <label class="ml-1 flex items-center">
            <input class="mr-2 h-3 w-3 rounded-sm bg-blue-500 text-blue-500"
                   type="checkbox"
                   value="{{ $opcion['id'] }}"
                   wire:click.live="actualizarSeleccion('{{ $opcion['id'] }}')"
                   {{ in_array($opcion['id'], $seleccionadas) ? 'checked' : '' }} />
            <span>
              @if ($vIndex)
                {{ $opcion['id'] }}:
              @endif{{ $opcion['name'] }}
            </span> {{-- wire:mouseenter="changeActiva('{{ $claveUnica }}-{{ $index }}')" --}}

          </label>
          <button class="rounded-full bg-red-400 px-2"
                  type="button"
                  wire:click="delete({{ $opcion['id'] }})">x</button>
        </div>
      @endforeach

    </div>
    {{-- {{ $Activa }}   --}}
  </div>
</div>
