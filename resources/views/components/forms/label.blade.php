@props(['label', 'for' => ''])

<label for="{{ $for }}"
       {{ $attributes->merge(['class' => 'block text-base font-semibold text-blue-500 dark:text-blue-100']) }}>
  {{ $label ?? $slot }}
</label>
