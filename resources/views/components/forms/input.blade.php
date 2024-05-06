@props(['disabled' => false, 'type' => 'text', 'label' => null, 'id' => null, 'value' => null])
@if ($label)
  <x-forms.label class="ml-4">{{ $label }}</x-forms.label>
@endif
@if ($type == 'textarea')
  <textarea {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' =>
                    'font-normal text-blue-500 dark:text-blue-100 block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
            ]) !!}>{{ $slot }}</textarea>
@else
  <input type=="$type"
         {{ $disabled ? 'disabled' : '' }}
         {!! $attributes->merge([
             'class' =>
                 'font-normal text-blue-500 dark:text-blue-100 block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
         ]) !!} />
@endif
@error($id)
  <x-forms.errors></x-forms.errors>
@enderror
