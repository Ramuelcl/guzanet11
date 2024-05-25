<div>
  {{-- resources\views\livewire\forms\lwsearch.blade.php --}}
  <div class="flex items-center space-x-1">
    <x-forms.tw_input class="my-1 w-full rounded-md"
                      type="search"
                      value="{{ $search }}"
                      wire:model.live="search"
                      wire:keydown.enter="queBuscar"
                      placeholder="{{ __('Search...') }}" />
    <x-forms.tw_button class="h-8"
                       ejecuta="queBuscar()"
                       icon="search"
                       color="gray">
    </x-forms.tw_button>
    {{-- Emitir un evento para notificar que la búsqueda ha sido actualizada --}}
  </div>
  {{-- <div>{{ $search }}</div> --}}
</div>
