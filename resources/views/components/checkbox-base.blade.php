<div>
    <input id="{{ $id }}" type="checkbox" value="{{ $value }}" name="{{ $name }}"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">

    @if ($label)
        <label for="{{ $id }}"
            class="ms-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif
</div>
