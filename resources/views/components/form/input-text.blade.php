@props(['name'])

<div class="mb-6">
    <label for="{{$name}}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{ucwords($name)}}
    </label>

    <input type="text" name="{{$name}}" id="{{$name}}" value="{{ old($name) }}"
        class="border border-gray-400 p-2 w-full" required>

    @error($name)
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>
