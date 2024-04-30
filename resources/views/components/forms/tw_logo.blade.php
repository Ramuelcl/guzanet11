<div class="flex items-center justify-center md:justify-start">
  <a href="/" class="flex items-center space-x-2 md:space-x-4">
    @dd($logo)
    {!! $logo !!} <!-- Esta línea imprimirá el contenido de $logo y detendrá la ejecución -->
    <span class="text-sm md:text-lg text-gray-700 cursor-pointer">{{ $empresa }}</span>
  </a>
</div>
