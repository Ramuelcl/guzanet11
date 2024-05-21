{{-- resources\views\components\tw_icons.blade.php --}}
@props(['name', 'defaultClass' => 'w-5 h-5', 'typeIcon' => 'outline'])

@php
  $iconPath = public_path("images/app/icons/{$typeIcon}/{$name}.blade.php");
@endphp

@if (file_exists($iconPath))
  {{-- Leer y mostrar el contenido del icono --}}
  <div {{ $attributes->merge(['class' => $defaultClass]) }}>
    {!! file_get_contents($iconPath) !!}
  </div>
@else
  {{-- Si el icono no se encuentra, mostrar un mensaje --}}
  <span class="text-pretty font-extralight text-red-900">Icono no está: {{ $name }}</span>
@endif
