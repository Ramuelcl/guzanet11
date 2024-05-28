<div>
  {{-- resources\views\livewire\forms\formulario.blade.php --}}
  <div class="flex justify-between">
    <div class="inline-flex">
      @persist('player')
        <audio controls src="{{ asset('audios/Abba - Chiquitita.mp3') }}"></audio>
      @endpersist
      <x-forms.tw_button class="ml-4 mr-1 mt-2 h-8 w-8" color="gray" ejecuta="resetFilters" icon="table">
      </x-forms.tw_button>
      <div>
        @livewire('forms.lwSearch')
      </div>
    </div>
    {{-- <div>{{ $search }}</div> --}}
    {{-- <div>@livewire('forms.opcionesFiltro', ['titulo' => 'publicado', 'opcionArr' => $opcionArr])</div> --}}
    <div class="inline-flex">
      <label class="mr-2 mt-3" for="opciones">Publicados:</label>
      <select
        class="form-input mt-1 block h-10 w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-100"
        id="opciones" name="opciones" wire:model="opciones">
        <option selected value="0">Todos</option>
        <option value="1">publicado</option>
      </select>
    </div>
    <x-forms.tw_button class="mb-1 mr-4 justify-self-stretch" color="blue" ejecuta="btnCrear"
      icon="plus">Crear</x-forms.tw_button>
  </div>
  <div class="rounded-md border border-b-2 border-l-2 border-blue-500 p-2 shadow-md shadow-blue-500">
    <table class="min-w-full table-auto" wire:poll.3000ms>
      <thead class="rounded-t-md bg-gray-400 dark:bg-gray-700">
        <tr>
          @include('includes.titulos')
          <th class="px-4 py-1 text-center text-gray-900 dark:text-white">{{ __('Actions') }}</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($fields as $index => $field)
          <tr class="{{ $loop->index % 2 === 0 ? '' : 'bg-gray-100' }}">
            @include('includes.campos')

            <td class="px-4 py-1 text-center">

              {{-- ver un registro --}}
              {{-- <x-forms.tw_button color="gray" icon='eye' class="" name="ver"
                    ejecuta="fncVerCrearEditarEliminar($field->id, 'ver')">
                  </x-forms.tw_button> --}}

              {{-- editar un registro --}}
              {{-- <button wire:click="btnEditar({{ $field->id }})">{{ __('Edit') }}</button> --}}
              <x-forms.tw_button color="green" ejecuta="btnEditar({{ $field->id }})" icon="pencil">
              </x-forms.tw_button>

              {{-- borrar un registro --}}
              <x-forms.tw_button color="red" ejecuta="btnEliminar({{ $field->id }})" icon="x">
              </x-forms.tw_button>
              {{-- roles --}}
              {{-- <x-forms.tw_button wire:click="fncRoles($field->id)"
                                 color="violet">{{ __('Role') }}
              </x-forms.tw_button> --}}
              {{-- <x-forms.tw_button wire:click="fncPermisos($field->id)" color="yellow">{{ __('Permission') }}
                  </x-forms.tw_button> --}}
            </td>
          </tr>
        @empty
          Not records
        @endforelse
      </tbody>
    </table>
    {{-- {{ $fields->links() }} --}}
  </div>
  @if ($abrir)
    {{-- modal --}}
    <div class="fixed inset-0 ml-10 flex items-center justify-center bg-gray-800 bg-opacity-25">
      <div class="w-full max-w-3xl rounded-lg bg-white shadow-md sm:p-4 lg:p-4">
        {{-- modal --}}
        <x-forms.tw_ventana colorCuerpo="bg-blue-300" colorEncabezado="bg-blue-400"
          titulo="{{ $titulo }} {{ $post_id == 0 ? '' : ' - ' . $post_id }}">
          <div class="mt-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

            <form enctype="multipart/form-data>
              {{-- @csrf --}}
              <div class="grid
              gap-2" grid-cols-2 wire:submit="fncSave({{ $accion == 'crear' ? null : $post_id }})">
              <div class="mb-4">
                <x-forms.tw_input disabled="{{ $accion === 'eliminar' }}" idName="title" label="Título" required
                  wire:model="title" />
              </div>
              <div class="mb-4">
                <x-forms.tw_input disabled="{{ $accion === 'eliminar' }}" idName="content" label="Descripción" required
                  type="textarea" wire:model="content" />
              </div>
          </div>
          <div class="grid grid-cols-2 gap-2">
            <div class="mb-4">
              <x-forms.tw_input :disabled="$accion === 'eliminar'" :options="$categories->pluck('name', 'id')" idName="categoryId" label="Categoría" type="select"
                wire:model="categoryId" />
            </div>
            <div class="mb-4">
              <x-forms.label class="ml-4">Marcas</x-forms.label>
              @livewire('forms.select2', [($opciones = $tags), ($seleccionadas = $selectedTags)], key('select01'))
            </div>
          </div>
          <div class="mb-4 grid grid-cols-2 gap-2">
            <div>
              <x-forms.tw_input :disabled="$accion === 'eliminar'" idName="image_path" label="Imagen" type="file"
                wire:key="{{ $image_key }}" wire:model="image_path" />
            </div>
            <div>
              @if ($image_path)
                <img alt="img" class="w-24" src="{{ $temporaryUrl }}">
              @endif
            </div>
          </div>
      </div>
      <div class="mt-4 flex justify-end">
        <x-forms.tw_button class="mr-2" color="white" ejecuta="$set('abrir',false)"
          icon="reply">Cancelar</x-forms.tw_button>
        <x-forms.tw_button ejecuta="fncSave" icon="save"
          type="submit">{{ $accion == 'crear' ? 'Crear' : ($accion == 'editar' ? 'Actualizar' : 'Eliminar') }}</x-forms.tw_button>
      </div>
      </form>
    </div>
    </x-forms.tw_ventana>
</div>
@endif
</div>
