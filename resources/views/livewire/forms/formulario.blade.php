<div>
  <div class="m-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

    <form action="">
      @csrf
      <div class="mb-4">
        <x-forms.input label="Título" />
      </div>
      <div class="mb-4">
        <x-forms.input type="textarea"
                       label="Descripción"></x-forms.input>
      </div>
      <div class="mb-4">
        <x-forms.label class="ml-4">Categorias</x-forms.label>
        <select
                class="form-input mt-1 block w-full rounded-md border-blue-400 font-normal text-blue-500 focus:border-blue-600 dark:text-blue-500">
          <option value="0">Seleccione</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-4">
        <x-forms.label class="ml-4">Marcas</x-forms.label>
        <ul>
          @foreach ($tags as $tag)
            <li>
              <x-forms.checkbox name="tags[]"
                                value="{{ $tag->id }}">{{ $tag->name }}</x-forms.checkbox>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="flex justify-end"><x-primary-button>Crear</x-primary-button></div>
    </form>
  </div>
</div>
