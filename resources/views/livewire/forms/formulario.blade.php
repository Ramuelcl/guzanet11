<div>
  <div class="mt-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

    <form wire:submit="fncAccion({{ $accion == 'crear' ? null : $item_id }})">
      @csrf
      <div class="grid grid-cols-2 gap-4">
        <div class="mb-4 w-1/2">
          <x-forms.input label="Título"
                         required
                         wire:model="title" />
        </div>
        <div class="mb-4 w-1/2">
          <x-forms.input type="textarea"
                         label="Descripción"
                         required
                         wire:model="content"></x-forms.input>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div class="mb-4 w-1/2">
          <x-forms.label class="ml-4">Categoria</x-forms.label>
          <select class="form-input mt-1 block w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-500"
                  required
                  wire:model="categoryId">
            <option value=""
                    disabled>Seleccione</option>
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
                <x-forms.checkbox id="{{ $tag->id }}"
                                  value="{{ $tag->id }}"
                                  title="{{ $tag->name }}"
                                  wire:model="selectedTags"></x-forms.checkbox>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="flex justify-end"><x-primary-button>Crear</x-primary-button></div>
    </form>
  </div>
  <div class="mt-8 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">
    <ul class="grid list-inside list-disc gap-2 pl-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
      @foreach ($filas as $item)
        <li>{{ $item->title }}</li>
      @endforeach
    </ul>
  </div>
</div>
