@props(['name'])

@error($name)
    <p class="text-red-500 mt-1 text-xs">{{ $message }}</p>
@enderror