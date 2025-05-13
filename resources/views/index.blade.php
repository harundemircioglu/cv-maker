@extends('layouts.app')

@section('content')
    @auth
        <h3>{{ auth()->user()->name }}</h3>

        <form id="formLogout" action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button id="btnLogout">Logout</button>
        </form>
    @endauth
@endsection

@push('scripts')
    <script>
        $('#btnLogout').click(function() {
            $(this).prop('disabled', true);
            $('#formLogout').submit();
        });
    </script>
@endpush
