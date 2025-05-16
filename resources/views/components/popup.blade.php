<div>
    <div id="{{ $id }}" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-xl shadow-lg max-w-md w-full space-y-4">
            <h2 class="text-xl font-bold text-gray-800">{{ $title }}</h2>
            <p class="text-gray-600">{{ $message }}</p>

            <div class="flex justify-end space-x-2">
                <button type="button" class="cancel-btn px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">İptal</button>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
