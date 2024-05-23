{{-- resources\views\components\forms\tw_onoff.blade.php --}}
@props(['valor', 'tipo' => 'si-no'])
@php
  switch ($tipo) {
      case 'si-no':
          $estado = $valor ? 'si' : 'no';
          break;
      case 'yes-no':
          $estado = $valor ? 'yes' : 'no';
          break;
      case 'on-off':
          $estado = $valor ? 'on' : 'off';
          break;
      case 'true-false':
          $estado = $valor ? 'true' : 'false';
          break;
      case 'ticket-x':
          $estado = $valor ? 'ok' : '-';
          break;
      default:
          $estado = $valor ? 'activo' : 'inactivo';
          break;
  }

@endphp
<div class="font-normal text-blue-900 dark:text-blue-100">
  {{ $estado }}
</div>
