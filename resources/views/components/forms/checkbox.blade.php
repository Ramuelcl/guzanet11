@props(['disabled' => false, 'id' => null, 'value' => null])
<label
       {{ $attributes->merge(['class' => 'inline-flex items-center text-base font-normal text-blue-500 dark:text-blue-100']) }}>
  <input type="checkbox"
         value="{{ $value }}"
         {{ $disabled ? 'disabled' : '' }}
         {!! $attributes->merge([
             'class' => 'm-2 form-input form-checkbox mt-1 rounded-md border-blue-400 focus:border-blue-600',
         ]) !!} />
  {{ $slot }}
</label>
