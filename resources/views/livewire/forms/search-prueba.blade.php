<div>
  {{-- resources\views\livewire\forms\search-prueba.blade.php --}}
  <input class="input-search"
         type="search"
         wire:model.live="search"
         placeholder="Buscar...">
  <br>Componente Hijo: {{ $search }}
</div>
