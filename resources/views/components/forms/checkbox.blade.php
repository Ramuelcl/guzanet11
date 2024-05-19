@props(['disabled' => false, 'id' => null, 'value' => null, 'title' => null])
{{-- @dd($id); --}}
@if ($title)
  <label for="{{ $id }}"
         {{ $attributes->merge(['class' => 'inline-flex whitespace-nowrap items-center text-base font-normal text-blue-500 dark:text-blue-100']) }}>
    <input id="{{ $id }}"
           type="checkbox"
           value="{{ $value }}"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge([
               'class' => 'm-2 form-input form-checkbox mt-1 rounded-md border-blue-400 focus:border-blue-600',
           ]) !!} />
    {{ $title }}
  </label>
@else
  <div class="flex items-center">
    <input id="{{ $id }}"
           type="checkbox"
           value="{{ $value }}"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge([
               'class' => 'm-2 form-input form-checkbox mt-1 rounded-md border-blue-400 focus:border-blue-600',
           ]) !!} />
  </div>
@endif
