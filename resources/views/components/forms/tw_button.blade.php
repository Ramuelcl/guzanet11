@props([
    'name' => 'button',
    'type' => 'button',
    'color' => 'blue',
    'class' => '',
    'classFix' => 'inline-flex items-center justify-center min-w-20 rounded-md p-2 focus:outline-none focus:ring ',
    'icon' => null,
    'ejecuta' => '',
])
{{-- resources\views\components\tw_button.blade.php --}}
@php
  // if (isset($onclick)) {
  //     dump($onclick);
  // }
  $colors = [
      'blue' =>
          'bg-blue-600 dark:bg-blue-400 text-blue-100 dark:text-blue-800 hover:bg-blue-400 dark:hover:bg-blue-200 active:bg-blue-400 dark:active:bg-blue-200 focus:ring-blue-700 dark:focus:ring-blue-500 disabled:bg-blue-300 dark:disabled:bg-blue-200 disabled:cursor-not-allowed',
      'red' =>
          'bg-red-600 dark:bg-red-400 text-red-100 dark:text-red-800 hover:bg-red-400 dark:hover:bg-red-200 active:bg-red-400 dark:active:bg-red-200 focus:ring-red-700 dark:focus:ring-red-500 disabled:bg-red-300 dark:disabled:bg-red-200 disabled:cursor-not-allowed',
      'gray' =>
          'bg-gray-600 dark:bg-gray-400 text-gray-100 dark:text-gray-800 hover:bg-gray-400 dark:hover:bg-gray-200 active:bg-gray-400 dark:active:bg-gray-200 focus:ring-gray-700 dark:focus:ring-gray-500 disabled:bg-gray-300 dark:disabled:bg-gray-200 disabled:cursor-not-allowed',
      'green' =>
          'bg-green-600 dark:bg-green-400 text-green-100 dark:text-green-800 hover:bg-green-400 dark:hover:bg-green-200 active:bg-green-400 dark:active:bg-green-200 focus:ring-green-700 dark:focus:ring-green-500 disabled:bg-green-300 dark:disabled:bg-green-200 disabled:cursor-not-allowed',
      'yellow' =>
          'bg-yellow-600 dark:bg-yellow-400 text-yellow-100 dark:text-yellow-800 hover:bg-yellow-400 dark:hover:bg-yellow-200 active:bg-yellow-400 dark:active:bg-yellow-200 focus:ring-yellow-700 dark:focus:ring-yellow-500 disabled:bg-yellow-300 dark:disabled:bg-yellow-200 disabled:cursor-not-allowed',
      'black' =>
          'bg-black-600 dark:bg-black-400 text-black-100 dark:text-black-800 hover:bg-black-400 dark:hover:bg-black-200 active:bg-black-400 dark:active:bg-black-200 focus:ring-black-700 dark:focus:ring-black-500 disabled:bg-black-300 dark:disabled:bg-black-200 disabled:cursor-not-allowed',
      'violet' =>
          'bg-violet-600 dark:bg-violet-400 text-violet-100 dark:text-violet-800 hover:bg-violet-400 dark:hover:bg-violet-200 active:bg-violet-400 dark:active:bg-violet-200 focus:ring-violet-700 dark:focus:ring-violet-500 disabled:bg-violet-300 dark:disabled:bg-violet-200 disabled:cursor-not-allowed',
  ];
  $defaultColor = 'gray'; // Definir un color por defecto

  // Comprobar si el color existe en el arreglo, si no, usar el color por defecto
  $colorClass = array_key_exists($color, $colors) ? $colors[$color] : $colors[$defaultColor];

  $classFix = $classFix . $colorClass;

  if ($icon) {
      $iconPath = public_path('images/app/icons/outline/' . $icon . '.blade.php');
      $icon = file_exists($iconPath) ? file_get_contents($iconPath) : null;
  }
@endphp
<button class="{{ $classFix }} {{ $class }}"
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        @if ($ejecuta) wire:click="{{ $ejecuta }}" @endif>
  @if (isset($icon))
    {!! str_replace('<svg ', '<svg class="w-6 h-6" ', $icon) !!}
  @endif
  {{ $slot ?? null }}
</button>
