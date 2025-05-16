<div>
    <form action="{{ $action }}" method="POST">
        @csrf

        @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
            @method($method)
        @endif

        {{ $slot }}
    </form>

</div>
