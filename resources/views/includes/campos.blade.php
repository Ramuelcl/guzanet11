@foreach ($campos as $campoNombre => $campoInfo)
  @php
    // Obtén el valor del campo actual
    $valorCampo = $field->$campoNombre;
    // Obtén el tipo de campo
    $tipoCampo = $campoInfo['tipo'];
    $visible = $campoInfo['visible1'];
    // dump([$campoNombre . '=>' . $valorCampo, $tipoCampo]);
  @endphp
  @if ($visible)
    <td class="border-none px-4 py-1 text-gray-900 dark:text-white">
      @switch($tipoCampo)
        @case('integer')
        @case('decimal')
          <div class="text-right">
            {{ number_format($valorCampo, $campoInfo['decimal'], '.', ',') }}
          </div>
        @break

        @case('date')
          <div class="text-center">
            {{ date('d/m/Y', strtotime($valorCampo)) }}
          </div>
        @break

        @case('checkit')
          <div class="text-center">
            <x-forms.tw_onoff :valor="$valorCampo"
                              tipo="ticket-x" />
          </div>
        @break

        @case('tags')
          <div class="text-center">
            @if ($field->tags->isEmpty())
              No tags
            @else
              @foreach ($field->tags as $tag)
                <span>{{ $tag->name }}</span>
                @if (!$loop->last)
                  -
                @endif
              @endforeach
            @endif
          </div>
        @break

        @case('combo-box')
          <div class="text-left">
            @php
              // Encuentra la categoría cuyo ID coincide con $valorCampo
              $category = $categories->firstWhere('id', $valorCampo);
            @endphp
            {{ $category ? $category->name : 'no encontrada' }}
          </div>
        @break

        @case('image')
          <div class="h-10 w-10 text-center">
            @if (Storage::disk('public')->exists($valorCampo))
              <img src="{{ asset('storage/' . $valorCampo) }}"
                   alt="Foto">
            @endif

          </div>
        @break

        @default
          <div class="text-left">
            {{ $valorCampo }}
          </div>
      @endswitch
    </td>
  @endif
@endforeach
