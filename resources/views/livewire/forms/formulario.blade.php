<div>
  {{-- resources\views\livewire\forms\formulario.blade.php --}}
  <div class="flex justify-between">
    <div class="inline-flex">
      {{-- @persist('player')
        <audio controls src="{{ asset('audios/Abba - Chiquitita.mp3') }}"></audio>
      @endpersist --}}
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
              {{-- @dump($image_path) --}}
              @if (!is_null($image_path) && Storage::disk('public')->exists($image_path))
                <img alt="Foto" class="w-24" src="{{ asset('storage/' . $image_path) }}">
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
@push('modals')
  <div aria-labelledby="modal-title" aria-modal="true" class="relative z-10" role="dialog">
    <!--
      Background backdrop, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <!--
          Modal panel, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div
                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg aria-hidden="true" class="h-6 w-6 text-red-600" fill="none" stroke-width="1.5"
                  stroke="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate account</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data
                    will be permanently removed. This action cannot be undone.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button
              class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
              type="button">Deactivate</button>
            <button
              class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
              type="button">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endpush
