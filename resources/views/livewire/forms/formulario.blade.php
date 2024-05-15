<div>
  <x-primary-button class="mb-2 w-full"
                    wire:click="btnCrear">Crear</x-primary-button>

  <div class="rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">
    @foreach ($filas as $key => $item)
      <li class="flex justify-between space-y-2"
          wire:key="{{ 'post' . '-' . $key }}">
        <p class="text-right">{{ $item->id }}</p>
        <p class="text-left">{{ $item->title }}</p>
        <p class="text-right">{{ $item->created_at->format('d/m/Y') }}</p>
        <p class="text-left">{{ $item->category->name }}</p>
        <div>
          <button class="m-2 rounded-full bg-green-500 px-2"
                  wire:click='btnEditar("{{ $item->id }}")'>=</button>
          <button class="rounded-full bg-red-500 px-2"
                  wire:click='btnEliminar("{{ $item->id }}")'>X</button>
        </div>
      </li>
    @endforeach
    </ul>
  </div>
  @if ($abrir)
    {{-- modal --}}
    <div class="fixed inset-0 ml-10 flex items-center justify-center bg-gray-800 bg-opacity-25">
      <div class="w-full max-w-3xl rounded-lg bg-white shadow-md sm:p-4 lg:p-4">
        {{-- modal --}}
        <x-forms.tw_ventana colorCuerpo="bg-blue-300"
                            colorEncabezado="bg-blue-400"
                            titulo="{{ $titulo . ' - ' . $post_id }}">
          <div class="mt-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

            <form wire:submit="fncSave({{ $accion == 'crear' ? null : $post_id }})">
              {{-- @csrf --}}
              <div class="grid grid-cols-2 gap-2">
                <div class="mb-4">
                  <label class = 'text-base font-semibold text-blue-500 dark:text-blue-100'
                         for="title">
                    Título
                    <input class='form-input mt-1 w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-100'
                           id   ="title"
                           name="title"
                           type="text"
                           required
                           wire:model="title" />
                  </label>
                  @error('title')
                    <span class="mt-2 text-xs text-red-600 dark:text-red-500">{{ $message }}</span>
                  @enderror


                  {{-- <x-forms.input id="title"
                                 label="Título"
                                 disabled="{{ $accion === 'eliminar' }}"
                                 required
                                 wire:model="title" /> --}}
                </div>
                <div class="mb-4">
                  <x-forms.input id="content"
                                 type="textarea"
                                 label="Descripción"
                                 disabled="{{ $accion === 'eliminar' }}"
                                 required
                                 wire:model="content"></x-forms.input>
                </div>
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div class="mb-4">
                  <x-forms.label class="ml-4">Categoria</x-forms.label>
                  <select class="form-input mt-1 block w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-500"
                          required
                          wire:model="categoryId">
                    <option value=""
                            disabled>Seleccione</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"
                              :disabled="{{ $accion === 'eliminar' }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-4">
                  <x-forms.label class="ml-4">Marcas</x-forms.label>
                  <ul class="grid gap-2 pl-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    @foreach ($tags as $tag)
                      <li class="ml-4">
                        <x-forms.checkbox id="{{ $tag->id }}"
                                          value="{{ $tag->id }}"
                                          title="{{ $tag->name }}"
                                          disabled="{{ $accion === 'eliminar' }}"
                                          wire:model="selectedTags"></x-forms.checkbox>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
          </div>
          <div class="mt-4 flex justify-end">
            <x-secondary-button class="mr-2"
                                wire:click="$set('abrir',false)">Cancelar</x-secondary-button>
            <x-primary-button
                              wire:click="fncSave">{{ $accion == 'crear' ? 'Crear' : ($accion == 'editar' ? 'Actualizar' : 'Eliminar') }}</x-primary-button>
          </div>
          </form>
      </div>
      </x-forms.tw_ventana>
    </div>

  @endif
</div>
