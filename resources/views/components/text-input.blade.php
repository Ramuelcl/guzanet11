@props(['disabled' => false, 'type' => 'text'])

<input type="{{ $type }}"
       {{ $disabled ? 'disabled' : '' }}
       {!! $attributes->merge(['class' => 'block mt-1 w-full rounded-md form-input focus:border-indigo-600']) !!}>
