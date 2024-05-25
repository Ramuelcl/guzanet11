<div>
  {{-- resources\views\livewire\forms\formulario-prueba.blade.php --}}
  <div>
    <input class="my-5"
           wire:model.live="search">
    componente Padre: {{ $search }}
    <hr>
    <div class="flex items-center space-x-4">
      <livewire:forms.search-prueba wire:model="search" />
    </div>
  </div>
  <table class="min-w-full divide-y divide-gray-200">
    <thead>
      <tr>
        <th class="px-4 py-2 text-center text-gray-900 dark:text-white">ID</th>
        <th class="px-4 py-2 text-center text-gray-900 dark:text-white">Title</th>
        <th class="px-4 py-2 text-center text-gray-900 dark:text-white">Content</th>
        <th class="px-4 py-2 text-center text-gray-900 dark:text-white">Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fields as $field)
        <tr>
          <td class="px-4 py-2">{{ $field->id }}</td>
          <td class="px-4 py-2">{{ $field->title }}</td>
          <td class="px-4 py-2">{{ $field->content }}</td>
          <td class="px-4 py-2">{{ $field->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
