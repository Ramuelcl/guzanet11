@props(['disabled' => false, 'type' => 'text', 'title' => null, 'id' => null, 'value' => null])
@if ($title)
  <x-forms.label class="ml-4 text-base font-semibold">{{ $title }}</x-forms.label>
@endif
@if ($type == 'textarea')
  <textarea {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' => 'block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
            ]) !!}>{{ $slot }}</textarea>
@else
  <input type=="$type"
         {{ $disabled ? 'disabled' : '' }}
         {!! $attributes->merge([
             'class' => 'block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
         ]) !!} />
@endif
@error($id)
  <x-forms.errors></x-forms.errors>
@enderror
