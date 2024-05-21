<div>
  <div class="w-full rounded-lg border-2 border-green-700 bg-white p-6 shadow-lg">
    <ul class="">
      @foreach ($mensajes as $mensaje)
        <li>{{ $mensaje }}</li>
      @endforeach
    </ul>
  </div>
</div>
