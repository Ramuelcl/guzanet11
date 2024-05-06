@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-semibold text-blue-500 dark:text-blue-100']) }}>
  {{ $value ?? $slot }}
</label>
