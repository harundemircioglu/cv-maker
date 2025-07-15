<div>
    @if ($color == 'blue')
        <button type="{{ $type }}" id="{{ $id }}" value="{{ $value }}" name="{{ $name }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ $text }}
            @if ($svg)
                {{ $svg }}
            @endif
        </button>
    @elseif ($color == 'green')
        <button type="{{ $type }}" id="{{ $id }}" value="{{ $value }}" name="{{ $name }}"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">{{ $text }}
            @if ($svg)
                {{ $svg }}
            @endif
        </button>
    @else
        <button type="{{ $type }}" id="{{ $id }}" value="{{ $value }}"
            name="{{ $name }}"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">{{ $text }}
            @if ($svg)
                {{ $svg }}
            @endif
        </button>
    @endif
</div>
