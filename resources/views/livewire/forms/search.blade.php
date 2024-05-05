{{-- resources/views/livewire/forms/search.blade.php --}}
<div>
  <div class="flex justify-between">
    <input type="search" wire:model.live="search" placeholder="{{ __('Input text...') }}"
      class="w-full my-2 mr-2 rounded-md" />
    <button class="m-2 py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500"
      wire:click="queBuscar" type="button">{{ __('Search') }}</button>
    {{-- Emitir un evento para notificar que la búsqueda ha sido actualizada --}}
  </div>
  <div>{{ $search }}</div>
</div>
