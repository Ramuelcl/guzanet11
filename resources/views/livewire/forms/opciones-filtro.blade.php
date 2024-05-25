<div class="flex items-center py-3">
  {{-- resources\views\livewire\forms\opciones-filtro.blade.php --}}
  <x-forms.tw_input class="font-normal"
                    idName="opciones"
                    type="select"
                    value="{{ $opciones }}"
                    wire:model.live="opciones"
                    label="{{ __($titulo) }}" />
  <x-forms.tw_input idName="opciones"
                    type="select"
                    label="{{ __($titulo) }}"
                    :options="{{ $opcionArr }}"
                    :disabled="$accion === 'eliminar'"
                    wire:model="opciones" />
</div>
