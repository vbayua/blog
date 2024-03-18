@props(['name', 'rows' => 5, 'cols' => 30])

<x-form.label name="{{ $name }}" />

<textarea name="{{ $name }}" rows="{{ $rows }}" cols="{{ $cols }}" id="{{ $name }}"
    class="w-full border border-black p-2" required>{{ old($name) }}</textarea>

<x-form.error name={{ $name }} />
