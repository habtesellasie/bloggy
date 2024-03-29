@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea type="text" class="border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}"
        required>{{ old($name, $slot) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
