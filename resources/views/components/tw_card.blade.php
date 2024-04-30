<x-layouts.app>
    <div class="container mx-auto sm:px-4">
        <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
            @isset($encabezado)
                <div class="py-3 px-6 mb-0 bg-blue-200 border-b-1 border-blue-300 text-blue-900">
                    {{ $encabezado }}
                </div>
            @endisset
            <div class="flex-auto p-6">
                {{ $slot }}
            </div>
            @isset($piePagina)
                <div class="py-3 px-6 bg-blue-200 border-t-1 border-blue-300">
                    {{ $piePagina }}
                </div>
            @endisset
        </div>
    </div>
</x-layouts.app>
