<div class="flex items-center py-3">
  {{-- resources\views\livewire\forms\opciones-filtro.blade.php --}}
  <x-forms.input class="font-normal"
                 idName="opciones"
                 type="combobox"
                 value="{{ $opciones }}"
                 wire:model.live="opciones"
                 label="{{ __($titulo) }}" />
</div>
