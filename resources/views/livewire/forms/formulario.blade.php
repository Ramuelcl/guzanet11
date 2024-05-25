<div>
  {{-- resources\views\livewire\forms\formulario.blade.php --}}
  <div class="flex justify-between">
    <div class="inline-flex">
      <x-forms.tw_button class="ml-4 mr-1 mt-2 h-8 w-8"
                         ejecuta="resetFilters"
                         icon="table"
                         color="gray">
      </x-forms.tw_button>
      <div>
        @livewire('forms.lwSearch')
      </div>
    </div>
    {{-- <div>{{ $search }}</div> --}}
    {{-- <div>@livewire('forms.opcionesFiltro', ['titulo' => 'publicado', 'opcionArr' => $opcionArr])</div> --}}
    <div class="inline-flex">
      <label class="mr-2 mt-2"
             for="opciones">Publicados:</label>
      <select class="form-input mt-1 block h-10 w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-100"
              id="opciones"
              name="opciones"
              wire:model="opciones">
        <option value="0"
                selected>Todos</option>
        <option value="1">publicado</option>
      </select>
    </div>
    <x-forms.tw_button class="mb-1 mr-4 justify-self-stretch"
                       color="blue"
                       icon="plus"
                       ejecuta="btnCrear">Crear</x-forms.tw_button>
  </div>
  <div class="rounded-md border border-b-2 border-l-2 border-blue-500 p-2 shadow-md shadow-blue-500">
    <table class="min-w-full table-auto"
           wire:poll.3000ms>
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
              <x-forms.tw_button ejecuta="btnEditar({{ $field->id }})"
                                 icon="pencil"
                                 color="transparent">
              </x-forms.tw_button>

              {{-- borrar un registro --}}
              <x-forms.tw_button ejecuta="btnEliminar({{ $field->id }})"
                                 icon="x"
                                 color="red">
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
        <x-forms.tw_ventana colorCuerpo="bg-blue-300"
                            colorEncabezado="bg-blue-400"
                            titulo="{{ $titulo }} {{ $post_id == 0 ? '' : ' - ' . $post_id }}">
          <div class="mt-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

            <form wire:submit="fncSave({{ $accion == 'crear' ? null : $post_id }})">
              {{-- @csrf --}}
              <div class="grid grid-cols-2 gap-2">
                <div class="mb-4">
                  <x-forms.tw_input idName="title"
                                    label="Título"
                                    disabled="{{ $accion === 'eliminar' }}"
                                    required
                                    wire:model="title" />
                </div>
                <div class="mb-4">
                  <x-forms.tw_input idName="content"
                                    type="textarea"
                                    label="Descripción"
                                    required
                                    disabled="{{ $accion === 'eliminar' }}"
                                    wire:model="content" />
                </div>
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div class="mb-4">
                  <x-forms.tw_input idName="categoryId"
                                    type="select"
                                    label="Categoría"
                                    :options="$categories->pluck('name', 'id')"
                                    :disabled="$accion === 'eliminar'"
                                    wire:model="categoryId" />
                </div>
                <div class="mb-4">
                  <x-forms.label class="ml-4">Marcas</x-forms.label>
                  @livewire('forms.select2', [($opciones = $tags), ($seleccionadas = $selectedTags)])
                </div>
              </div>
          </div>
          <div class="mt-4 flex justify-end">
            <x-forms.tw_button class="mr-2"
                               color="white"
                               icon="reply"
                               ejecuta="$set('abrir',false)">Cancelar</x-forms.tw_button>
            <x-forms.tw_button type="submit"
                               icon="save"
                               ejecuta="fncSave">{{ $accion == 'crear' ? 'Crear' : ($accion == 'editar' ? 'Actualizar' : 'Eliminar') }}</x-forms.tw_button>
          </div>
          </form>
      </div>
      </x-forms.tw_ventana>
    </div>
  @endif
</div>
