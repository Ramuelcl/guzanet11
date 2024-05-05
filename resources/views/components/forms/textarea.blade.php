@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }}
          {!! $attributes->merge(['class' => 'block mt-1 w-full rounded-md form-input focus:border-blue-400']) !!}>{{ $slot }}</textarea>
