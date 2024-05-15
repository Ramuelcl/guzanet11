@props(['value', 'for' => ''])

<label for="{{ $for }}"
       {{ $attributes->merge(['class' => 'block text-base font-semibold text-blue-500 dark:text-blue-100']) }}>
  {{ $value ?? $slot }}
</label>
