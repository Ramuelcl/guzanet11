{{-- resources\views\components\forms\input.blade.php --}}
@props([
    'disabled' => false,
    'type' => 'text',
    'label' => null,
    'idName' => '',
    'value' => null,
    'class' =>
        'font-normal text-blue-500 dark:text-blue-100 block mt-1 w-full rounded-md form-input border-blue-400 focus:border-blue-600',
    'options' => [], // Para el tipo select
])

@if ($label && $type != 'checkbox' && $type != 'select')
  <x-forms.label class="ml-2"
                 for="{{ $idName }}">{{ $label }}</x-forms.label>
@endif

@if ($type == 'textarea')
  <textarea id="{{ $idName }}"
            name="{{ $idName }}"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge([
                'class' => $class,
            ]) !!}>{{ $value }}</textarea>
@elseif ($type == 'checkbox')
  <div class="flex items-center">
    <input id="{{ $idName }}"
           name="{{ $idName }}"
           type="checkbox"
           value="{{ $value }}"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge([
               'class' => 'form-checkbox h-4 w-4 rounded-full text-blue-600',
           ]) !!} />
    @if ($label)
      <label class="ml-2 text-sm text-blue-600 dark:text-blue-100"
             for="{{ $idName }}">{{ $label }}</label>
    @endif
  </div>
@elseif ($type == 'select')
  @if ($label)
    <x-forms.label class="ml-2"
                   for="{{ $idName }}">{{ $label }}</x-forms.label>
  @endif
  <select id="{{ $idName }}"
          name="{{ $idName }}"
          {{ $disabled ? 'disabled' : '' }}
          {!! $attributes->merge([
              'class' => $class,
          ]) !!}>
    <option value=""
            disabled>Seleccione</option>
    @foreach ($options as $key => $option)
      <option value="{{ $key }}"
              {{ $disabled ? 'disabled' : '' }}>{{ $option }}</option>
    @endforeach
  </select>
@else
  <input id="{{ $idName }}"
         name="{{ $idName }}"
         type="{{ $type }}"
         value="{{ $value }}"
         {{ $disabled ? 'disabled' : '' }}
         {!! $attributes->merge([
             'class' => $class,
         ]) !!} />
@endif

<x-forms.error name="{{ $idName }}" />
