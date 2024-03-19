@props(['name', 'type' => 'text'])

<x-form.label name="{{ $name }}" />

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
    class="border border-gray-200 rounded p-2 w-full" {{$attributes}}>

<x-form.error name={{ $name }} />
