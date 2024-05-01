@if (Session::has('success'))
  {{-- SUCCESS --}}
  <div class="mb-4 inline-flex overflow-hidden w-full m-2 bg-white rounded-lg shadow-md border-2 border-green-700">
    <div class="flex justify-center items-center w-12 bg-green-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white fill-current" viewBox="0 0 20 20"
        fill="currentColor">
        <path fill-rule="evenodd"
          d="M9.293 16.293a1 1 0 0 1-1.414 0l-5-5a1 1 0 1 1 1.414-1.414L9 13.586l9.293-9.293a1 1 0 1 1 1.414 1.414l-10 10z"
          clip-rule="evenodd" />
      </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
      <div class="mx-3">
        <span class="font-semibold text-green-500">Success</span>
        <p class="text-sm text-gray-600">{{ Session::get('success') }}</p>
      </div>
    </div>
  </div>
@elseif (Session::has('info'))
  {{-- INFO --}}
  <div class="mb-4 inline-flex overflow-hidden w-full m-2 bg-white rounded-lg shadow-md border-2 border-blue-700">
    <div class="flex justify-center items-center w-12 bg-blue-500">
      <div class="flex items-center justify-center w-8 h-8 text-blue-700 bg-white rounded-full">
        !
      </div>

    </div>

    <div class="px-4 py-2 -mx-3">
      <div class="mx-3">
        <span class="font-semibold text-blue-500">Info</span>
        <p class="text-sm text-gray-600">{{ Session::get('info') }}</p>
      </div>
    </div>
  </div>
@elseif (Session::has('error'))
  {{-- Error --}}
  <div class="mb-4 inline-flex w-full m-2 bg-white rounded-lg shadow-md border-2 border-red-700">
    <div class="flex justify-center items-center w-12 bg-red-500">
      <div class="flex items-center justify-center w-8 h-8 text-red-700 bg-white rounded-full">
        X
      </div>
    </div>

    <div class="px-4 py-2 -mx-3">
      <div class="mx-3">
        <span class="font-semibold text-red-500">Error</span>
        <p class="text-sm text-gray-600">{{ Session::get('error') }}</p>
      </div>
    </div>
  </div>
@endif
