<div
     class="container w-48 rounded-lg border-2 border-blue-300 bg-gray-200 p-1 text-blue-800 shadow-lg dark:bg-gray-800 dark:text-blue-400">
  <form class="col-span-2 flex w-40 justify-between"
        wire:submit="submitForm">
    <input class="mr-2 w-36 rounded-lg"
           id="pais"
           wire:model="pais"
           placeholder="Pais"
           @keydown.enter="submitForm" />
    <button class="rounded-lg border-blue-800 bg-blue-400 px-2"
            type="submit">+</button>
  </form>
  <div class="mt-1">
    @livewire('forms.select2', [$opciones, $seleccionadas])
  </div>
</div>
</div>
