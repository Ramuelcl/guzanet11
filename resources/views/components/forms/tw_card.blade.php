<div class="container mx-auto sm:px-4">
  <div class="border-1 relative flex min-w-0 flex-col break-words rounded border border-gray-300 bg-white">
    @isset($encabezado)
      <div class="border-b-1 mb-0 border-blue-300 bg-blue-200 px-6 py-3 text-blue-900">
        {{ $encabezado }}
      </div>
    @endisset
    <div class="flex-auto p-6">
      {{ $slot }}
    </div>
    @isset($piePagina)
      <div class="border-t-1 border-blue-300 bg-blue-200 px-6 py-3">
        {{ $piePagina }}
      </div>
    @endisset
  </div>
</div>
