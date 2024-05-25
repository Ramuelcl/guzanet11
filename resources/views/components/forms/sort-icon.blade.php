@props(['sortDir', 'sortField', 'campo'])
<div>
  @if ($sortField == $campo)
    @if ($sortDir == 'asc')
      <x-forms.tw_icons name="arrow-circle-up" />
    @else
      <x-forms.tw_icons name="arrow-circle-down" />
    @endif
  @else
    <!-- <i class="fa-solid fa-sort ml-2"></i> -->
  @endif
</div>
