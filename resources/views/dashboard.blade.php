<x-app-layout>
  <x-slot name="header">
    {{ __('Pruebas de Livewire 3') }}
  </x-slot>

  <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="border-b border-gray-200">

      {{-- @livewire('forms.formulario') --}}
      {{-- <livewire:forms.formulario lazy /> --}}
      <div x-data="{ showModal: false }">
        <button @click="showModal = true">Open Modal</button>
        <div x-show="showModal">Contenido del modal</div>
      </div>

      <x-forms.tw_modal :footer="false" :titulo="''">
        <p>This is the content of the modal.</p>
      </x-forms.tw_modal>
    </div>
  </div>
  <script>
    document.querySelector('button').addEventListener('click', () => {
      console.log('Evento emitido correctamente');
      document.dispatchEvent(new Event('show-modal'));
    });
  </script>
</x-app-layout>
