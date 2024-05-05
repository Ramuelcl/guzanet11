@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text text-blue-700']) }}>
  {{ $value ?? $slot }}
</label>
