<div>
    @if ($label)
        <label for="{{ $id }}"
            class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error($name) border-red-500 dark:border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
        placeholder="{{ $placeholder }}" @if ($required) required @endif />

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
