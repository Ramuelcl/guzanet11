<!-- resources/views/components/forms/tw_modal.blade.php -->
@props(['titulo' => null, 'footer' => null])

<div @show-modal.window="show = true" class="fixed inset-0 z-50 flex items-center justify-center" x-data="{ show: false }"
  x-show="show">
  <div @click="show = false" class="fixed inset-0 bg-gray-300 opacity-75"></div>
  <div class="relative m-auto w-full max-w-2xl rounded bg-white shadow-lg" style="max-height: 500px; overflow-y: auto;">
    <div class="flex h-full flex-col border border-blue-300">
      @isset($titulo)
        <div class="flex h-12 items-center justify-between border-b border-blue-500 bg-blue-200 p-4">
          <div class="text-2xl">{{ $titulo }}</div>
          <button @click="show = false" class="rounded-full bg-blue-300 p-1 text-white hover:bg-blue-400">
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
          </button>
        </div>
      @endisset
      <div class="{{ $titulo ? 'border-b border-blue-500' : '' }} flex-1 p-4">
        {{ $slot }}
      </div>
      @if ($footer)
        <div class="flex h-12 items-center justify-end border-t border-blue-500 bg-blue-200 p-4">
          <button @click="show = false" class="rounded bg-blue-300 px-4 py-2 hover:bg-blue-400">Cancelar</button>
        </div>
      @endif
    </div>
  </div>
</div>
