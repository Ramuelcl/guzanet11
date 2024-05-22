@if (Session::has('success'))
  {{-- SUCCESS --}}
  <div class="m-2 mb-4 inline-flex w-full overflow-hidden rounded-lg border-2 border-green-700 bg-white shadow-md">
    <div class="flex w-12 items-center justify-center bg-green-500">
      <svg class="h-6 w-6 fill-current text-white"
           xmlns="http://www.w3.org/2000/svg"
           viewBox="0 0 20 20"
           fill="currentColor">
        <path fill-rule="evenodd"
              d="M9.293 16.293a1 1 0 0 1-1.414 0l-5-5a1 1 0 1 1 1.414-1.414L9 13.586l9.293-9.293a1 1 0 1 1 1.414 1.414l-10 10z"
              clip-rule="evenodd" />
      </svg>
    </div>

    <div class="-mx-3 px-4 py-2">
      <div class="mx-3">
        <span class="font-semibold text-green-500">Success</span>
        <p class="text-sm text-gray-600">{{ Session::get('success') }}</p>
      </div>
    </div>
  </div>
@elseif (Session::has('info'))
  {{-- INFO --}}
  <div class="m-2 mb-4 inline-flex w-full overflow-hidden rounded-lg border-2 border-blue-700 bg-white shadow-md">
    <div class="flex w-12 items-center justify-center bg-blue-500">
      <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-blue-700">
        !
      </div>

    </div>

    <div class="-mx-3 px-4 py-2">
      <div class="mx-3">
        <span class="font-semibold text-blue-500">Info</span>
        <p class="text-sm text-gray-600">{{ Session::get('info') }}</p>
      </div>
    </div>
  </div>
@elseif (Session::has('error'))
  {{-- Error --}}
  <div class="m-2 mb-4 inline-flex w-full rounded-lg border-2 border-red-700 bg-white shadow-md">
    <div class="flex w-12 items-center justify-center bg-red-500">
      <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white text-red-700">
        X
      </div>
    </div>

    <div class="-mx-3 px-4 py-2">
      <div class="mx-3">
        <span class="font-semibold text-red-500">Error</span>
        <p class="text-sm text-gray-600">{{ Session::get('error') }}</p>
      </div>
    </div>
  </div>
@endif
