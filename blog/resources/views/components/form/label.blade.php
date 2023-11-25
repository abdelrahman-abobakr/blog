@props(['name'])

<label class="block mb-2 text-xs font-bold text-gray-700 uppercase"
    for="{{$name}}"
>
    {{ucwords($name)}}
</label>