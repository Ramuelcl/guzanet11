@props(['active'])

@php
  $classes =
      $active ?? false
          ? 'flex items-center mt-4 py-2 px-6 text-blue-500 border-b border-blue-500 '
          : 'flex items-center mt-4 py-2 px-6 text-blue-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
  {{ $icon ?? '' }}
  <span class="mx-3">{{ $slot }}</span>
</a>
