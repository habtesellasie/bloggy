@props(['name', 'type' => 'text'])

<x-form.field>

    <x-form.label name="{{ $name }}" />

    <input type="{{ $type }}" class="border border-gray-400 p-2 w-full" name="{{ $name }}"
        id="{{ $name }}" required value="{{ old($name) }}">

    <x-form.error name="{{ $name }}" />

</x-form.field>
