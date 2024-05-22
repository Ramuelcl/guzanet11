<div>
  @if (count($mensajes))
    <div class="w-full rounded-lg border-2 border-green-700 bg-white p-6 shadow-lg">
      <ul class="">
        @foreach ($mensajes as $tipo => $mensaje)
          <li>{{ $tipo }}-{{ $mensaje }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
