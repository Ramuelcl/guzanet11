@props(['disabled' => false, 'id' => null, 'value' => null, 'title' => null])
{{-- @dd($id); --}}
<div>
  <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
      'class' => 'm-2 form-input form-checkbox mt-1 rounded-md border-blue-400 focus:border-blue-600',
  ]) !!} id="{{ $id }}" type="checkbox"
    value="{{ $value }}" />
  @if ($title)
    <label
      {{ $attributes->merge(['class' => 'inline-flex items-center text-base font-normal text-blue-500 dark:text-blue-100']) }}
      for="{{ $id }}">{{ $title }}</label>
  @endif
</div>
