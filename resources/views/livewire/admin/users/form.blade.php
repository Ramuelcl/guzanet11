<!-- resources/views/livewire/admin/users/form.blade.php -->
<div>
  {{-- @if ($estado == 1)
    <h1>Nuevo Usuario</h1>
  @elseif ($estado == 2)
    <h1>Editar Usuario</h1>
  @elseif ($estado == 3)
    <h1>Realmente quiere eliminar este registro ??</h1>
  @endif --}}

  <form wire:submit.prevent="{{ $accion == 1 ? 'store' : ($accion == 2 ? 'update' : 'delete') }}">
    @csrf
    @method({{ $accion == 1 ? 'GET' : ($accion == 2 ? 'POST' : 'PUT') }})
    <div>
      <label for="name">Nombre:</label>
      <input type="text" id="name" wire:model="user.name" {{ $accion == 3 ? 'disabled' : '' }}>
      @error('user.name')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" wire:model="user.email" {{ $accion == 3 ? 'disabled' : '' }}>
      @error('user.email')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <!-- Otros campos del formulario -->

    <button type="submit">{{ $accion == 1 ? 'Guardar' : ($accion == 2 ? 'Actualizar' : 'Eliminar') }}</button>
  </form>
</div>
