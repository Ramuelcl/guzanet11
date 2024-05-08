<div>

  <div class="mt-8 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">
    <ul class="grid list-inside list-disc gap-2 pl-2 sm:grid-cols-1">
      @foreach ($filas as $item)
        <li class="flex justify-between space-y-2">{{ $item->title }}
          <div>
            <button class="m-2 rounded-full bg-green-500 px-2">=</button>
            <button class="rounded-full bg-red-500 px-2">X</button>
          </div>
        </li>
      @endforeach
    </ul>
  </div>

  {{-- modal --}}
  <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-25">
    <div class="w-full max-w-4xl rounded-lg bg-white shadow-md sm:p-6 lg:p-8">
      <x-forms.tw_ventana colorCuerpo="bg-blue-300" colorEncabezado="bg-blue-400" pie="pie de ventana" titulo="Título">
        <div class="mt-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

          <form wire:submit="fncAccion({{ $accion == 'crear' ? null : $item_id }})">
            @csrf
            <div class="grid grid-cols-2 gap-4">
              <div class="mb-4 w-1/2">
                <x-forms.input label="Título" required wire:model="title" />
              </div>
              <div class="mb-4 w-1/2">
                <x-forms.input label="Descripción" required type="textarea" wire:model="content"></x-forms.input>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div class="mb-4 w-1/2">
                <x-forms.label class="ml-4">Categoria</x-forms.label>
                <select
                  class="form-input mt-1 block w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-500"
                  required wire:model="categoryId">
                  <option disabled value="">Seleccione</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-4 w-1/2">
                <x-forms.label class="ml-4">Marcas</x-forms.label>
                <ul class="grid gap-2 pl-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                  @foreach ($tags as $tag)
                    <li class="ml-4">
                      <x-forms.checkbox id="{{ $tag->id }}" title="{{ $tag->name }}" value="{{ $tag->id }}"
                        wire:model="selectedTags"></x-forms.checkbox>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="flex justify-end"><x-primary-button>Crear</x-primary-button></div>
          </form>
        </div>
      </x-forms.tw_ventana>
    </div>
  </div>
