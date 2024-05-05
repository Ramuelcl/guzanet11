<!-- resources/views/livewire/admin/users/index.blade.php -->
<div>
  <x-slot name="header">
    {{ __('List Users') }}
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        @if (Session::has('success'))
          <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <div class="md:w-4/5 pr-4 pl-4">{{ Session::get('success') }}</div>
          </div>
        @endif
        <button id="name" type="button" wire:click="fncVerCrearEditarEliminar(0, 'crear')"
          class="bg-blue-500 text-gray-100 w-full rounded-lg">
          Nuevo
        </button>

        <x-forms.tw_button wire:click="fncVerCrearEditarEliminar(null, 'crear')" class="w-full"
          color="blue">{{ __('New') }}
        </x-forms.tw_button>
        <table class="table-auto w-full" wire:poll.3000ms>
          <thead>
            <tr>
              @include('includes.titulos')
              <th class="px-4 py-1 text-gray-900 dark:text-white text-center">{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fields as $field)
              <tr>
                @include('includes.campos')

                <td class="border px-4 py-1 text-center">

                  {{-- ver un registro --}}
                  <x-forms.tw_button color="gray" icon='eye' class="" name="ver"
                    ejecuta="fncVerCrearEditarEliminar($field->id, 'ver')">
                  </x-forms.tw_button>

                  {{-- editar un registro --}}
                  <x-forms.tw_button wire:click="fncVerCrearEditarEliminar($field->id, 'editar')"
                    color="green">{{ __('Edit') }}
                  </x-forms.tw_button>

                  {{-- borrar un registro --}}
                  <x-forms.tw_button wire:click="fncVerCrearEditarEliminar($field->id, 'eliminar')"
                    color="red">{{ __('Delete') }}
                  </x-forms.tw_button>
                  {{-- roles --}}
                  <x-forms.tw_button wire:click="fncRoles($field->id)" color="violet">{{ __('Role') }}
                  </x-forms.tw_button>
                  {{-- <x-forms.tw_button wire:click="fncPermisos($field->id)" color="yellow">{{ __('Permission') }}
                  </x-forms.tw_button> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $fields->links() }}
      </div>
    </div>
  </div>
</div>
