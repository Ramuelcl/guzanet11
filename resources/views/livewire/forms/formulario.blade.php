<div>
  <div class="m-0 rounded-md border border-l-2 border-t-2 border-blue-500 p-2 shadow-md shadow-blue-500">

    <form action="">
      <div class="mb-4">
        <x-forms.input class=""
                       title="Título" />
      </div>
      <div class="mb-4">
        <x-forms.input type="textarea"
                       title="Descripción">scsdc</x-forms.input>
      </div>
      <div class="mb-4">
        <x-forms.label>Categorias</x-forms.label>
        <select>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </form>
  </div>
</div>
