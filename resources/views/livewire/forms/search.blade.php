{{-- resources/views/livewire/forms/search.blade.php --}}
<div>
  <div class="flex items-center space-x-1">
    <x-forms.input class="my-1 w-full rounded-md"
                   type="search"
                   wire:model.live="search"
                   wire:keydown.enter="queBuscar"
                   placeholder="{{ __('Input text...') }}" />
    <x-forms.tw_button class="h-8"
                       ejecuta="queBuscar()"
                       icon="search"
                       color="gray">
    </x-forms.tw_button>
    {{-- Emitir un evento para notificar que la búsqueda ha sido actualizada --}}
  </div>
  <div>{{ $search }}</div>
</div>
