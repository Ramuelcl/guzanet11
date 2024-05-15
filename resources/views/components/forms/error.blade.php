@props(['name' => ''])
@error($name)
  <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
@enderror
