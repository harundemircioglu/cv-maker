<div>
    @if ($label)
        <label for="{{ $id }}"
            class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif

    <select id="{{ $id }}" name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        {{ $options }}
    </select>
</div>
