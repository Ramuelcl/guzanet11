@props(['disabled' => false, 'type' => 'text', 'label' => null, 'id' => null, 'value' => null])
@if ($label)
  <x-forms.label class="ml-4"
                 for="{{ $id }}">{{ $label }}</x-forms.label>
@endif
@if ($type == 'textarea')
  <textarea id="{{ $id }}"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' =>
                    'font-normal text-blue-500 dark:text-blue-100 block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
            ]) !!}>{{ $slot }}</textarea>
@else
  <input id="{{ $id }}"
         type="$type"
         {{ $disabled ? 'disabled' : '' }}
         {!! $attributes->merge([
             'class' =>
                 'font-normal text-blue-500 dark:text-blue-100 block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
         ]) !!} />
@endif
<x-forms.error name="{{ $id }}"></x-forms.error>
