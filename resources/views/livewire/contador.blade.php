<div>
  <button class="m-2 py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500"
    wire:click="fncContador(-1)" type="button">-</button>

  {{ $contador }} <button
    class="m-2 py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500"
    wire:click="fncContador(+1)" type="button">+</button>
</div>
