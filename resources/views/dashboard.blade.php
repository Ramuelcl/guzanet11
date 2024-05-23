<x-app-layout>
  <x-slot name="header">
    {{ __('Pruebas de Livewire 3') }}
  </x-slot>

  <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="border-b border-gray-200">
      {{-- <x-forms.tw_button class="additional-class"
                         type="button"
                         color="blue"
                         icon="archive">
        Guardar
      </x-forms.tw_button> --}}
      {{-- <x-forms.tw_icons name="archive"
                        typeIcon="solid" /> --}}
      <div class="mb-1">
        @livewire('forms.mensajes')
      </div>
      @livewire('forms.formulario')

    </div>
  </div>
</x-app-layout>
