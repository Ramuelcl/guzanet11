{{-- resources\views\livewire\forms\opciones-filtro.blade.php --}}
<div class="flex items-center py-3">
  <x-forms.input class="font-normal"
                 idName="opciones"
                 type="checkbox"
                 value="{{ $opciones }}"
                 wire:model.live="opciones"
                 label="{{ __($titulo) }}" />
</div>
